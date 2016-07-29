<?php

/**
 * AdminUser form.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage form
 * @author     Your name here
 */
class AdminUserForm extends BaseAdminUserForm {

    public function configure() {
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array('always_render_empty' => false));
        $this->widgetSchema['password_confirm'] = new sfWidgetFormInputPassword(array('always_render_empty' => false));
        $this->widgetSchema['change_password'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => 1, 'label' => '修改密码'));
        $this->widgetSchema['is_enabled'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => 1, 'label' => '修改密码'));

        $this->validatorSchema['password'] = new sfValidatorPass();
        $this->validatorSchema['password_confirm'] = new sfValidatorPass();
        $this->validatorSchema['change_password'] = new sfValidatorPass();
        $this->validatorSchema['is_enabled'] = new sfValidatorPass();
        $this->validatorSchema['admin_user_group_id'] = new sfValidatorPropelChoice(array('model' => 'AdminUserGroup', 'column' => 'id', 'required' => true));
        $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true));
        $this->validatorSchema['name'] = new sfValidatorString(array('required' => true));

        if (isset($_POST['admin_user']['change_password']) || $this->isNew()) {
            $this->validatorSchema['password'] = new sfValidatorAnd(array(new sfValidatorString(array('required' => true)), new myValiadatorStrongPassword(array("password_confirm" => @$_POST['admin_user']['password_confirm']))));
            $this->validatorSchema['password_confirm'] = new sfValidatorString(array('required' => true));
        }
        $this->widgetSchema['password']->setAttribute('value', @$_POST['admin_user']['password']);
        $this->widgetSchema['password_confirm']->setAttribute('value', @$_POST['admin_user']['password_confirm']);
    }

    public function bind(array $taintedValues = null, array $taintedFiles = null) {
        $taintedValues['password'] = @$_POST['admin_user']['password'];
        $taintedValues['password_confirm'] = @$_POST['admin_user']['password_confirm'];
        parent::bind($taintedValues, $taintedFiles);
    }

    public function doSave($con = null) {
        $this_obj = $this->getObject();
        if (isset($this->values['change_password']) && $this->values['change_password']) {
            $this->values['password'] = md5(@$_POST['admin_user']['password']);
        } else {
            $this->values['password'] = $this->getObject()->getPassword();
        }
        parent::doSave($con);
    }

}
