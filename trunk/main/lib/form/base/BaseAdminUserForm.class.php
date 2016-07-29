<?php

/**
 * AdminUser form base class.
 *
 * @method AdminUser getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAdminUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'admin_user_group_id' => new sfWidgetFormPropelChoice(array('model' => 'AdminUserGroup', 'add_empty' => true)),
      'username'            => new sfWidgetFormInputText(),
      'password'            => new sfWidgetFormInputText(),
      'name'                => new sfWidgetFormInputText(),
      'email'               => new sfWidgetFormInputText(),
      'phone_mobile'        => new sfWidgetFormInputText(),
      'nickname'            => new sfWidgetFormInputText(),
      'is_enabled'          => new sfWidgetFormInputText(),
      'created_at'          => new sfWidgetFormInputText(),
      'updated_at'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'AdminUser', 'column' => 'id', 'required' => false)),
      'admin_user_group_id' => new sfValidatorPropelChoice(array('model' => 'AdminUserGroup', 'column' => 'id', 'required' => false)),
      'username'            => new sfValidatorString(array('max_length' => 255)),
      'password'            => new sfValidatorString(array('max_length' => 255)),
      'name'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone_mobile'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nickname'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_enabled'          => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'created_at'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'updated_at'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'AdminUser', 'column' => array('username')))
    );

    $this->widgetSchema->setNameFormat('admin_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminUser';
  }


}
