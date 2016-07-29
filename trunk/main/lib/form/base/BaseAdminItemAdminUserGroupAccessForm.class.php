<?php

/**
 * AdminItemAdminUserGroupAccess form base class.
 *
 * @method AdminItemAdminUserGroupAccess getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAdminItemAdminUserGroupAccessForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'admin_item_id'       => new sfWidgetFormInputHidden(),
      'admin_user_group_id' => new sfWidgetFormInputHidden(),
      'created_at'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'admin_item_id'       => new sfValidatorPropelChoice(array('model' => 'AdminItem', 'column' => 'id', 'required' => false)),
      'admin_user_group_id' => new sfValidatorPropelChoice(array('model' => 'AdminUserGroup', 'column' => 'id', 'required' => false)),
      'created_at'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('admin_item_admin_user_group_access[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminItemAdminUserGroupAccess';
  }


}
