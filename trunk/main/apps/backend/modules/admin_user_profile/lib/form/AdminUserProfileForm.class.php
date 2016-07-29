<?php

class AdminUserProfileForm extends BaseForm {

    public function configure() {
        $this->disableCSRFProtection();
        
        $current_admin_user = Theuser::getCurrentAdminUser();
        
        $this->widgetSchema['name'] = new sfWidgetFormInputText(array('default' => $current_admin_user->getName()));
        $this->widgetSchema['email'] = new sfWidgetFormInputText(array('default' => $current_admin_user->getEmail()));
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array('always_render_empty' => false));
        $this->widgetSchema['password_confirm'] = new sfWidgetFormInputPassword(array('always_render_empty' => false));
        $this->widgetSchema['change_password'] = new sfWidgetFormInputCheckbox(array('value_attribute_value' => 1, 'label' => '修改密码'));
        $this->widgetSchema['admin_user_id'] = new sfWidgetFormInputHidden(array('default' => $current_admin_user->getId()));

        $this->validatorSchema['name'] = new sfValidatorString(array('required' => true));
        $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true));
        $this->validatorSchema['password'] = new sfValidatorPass();
        $this->validatorSchema['password_confirm'] = new sfValidatorPass();
        $this->validatorSchema['change_password'] = new sfValidatorPass();
        $this->validatorSchema['admin_user_id'] = new sfValidatorPass();

        if (isset($_POST['admin_user_profile']['change_password'])) {
            $this->validatorSchema['password'] = new sfValidatorAnd(array(new sfValidatorString(array('required' => true)), new myValiadatorStrongPassword(array("password_confirm" => @$_POST['admin_user_profile']['password_confirm']))));
            $this->validatorSchema['password_confirm'] = new sfValidatorString(array('required' => true));
        }
        
        $this->widgetSchema->setNameFormat('admin_user_profile[%s]');
        
    }

}
