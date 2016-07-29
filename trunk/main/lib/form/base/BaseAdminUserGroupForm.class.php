<?php

/**
 * AdminUserGroup form base class.
 *
 * @method AdminUserGroup getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAdminUserGroupForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                      => new sfWidgetFormInputHidden(),
      'name'                                    => new sfWidgetFormInputText(),
      'is_super_admin'                          => new sfWidgetFormInputText(),
      'is_fixed'                                => new sfWidgetFormInputText(),
      'created_at'                              => new sfWidgetFormInputText(),
      'updated_at'                              => new sfWidgetFormInputText(),
      'admin_item_admin_user_group_access_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'AdminItem')),
    ));

    $this->setValidators(array(
      'id'                                      => new sfValidatorPropelChoice(array('model' => 'AdminUserGroup', 'column' => 'id', 'required' => false)),
      'name'                                    => new sfValidatorString(array('max_length' => 255)),
      'is_super_admin'                          => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'is_fixed'                                => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'created_at'                              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'updated_at'                              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'admin_item_admin_user_group_access_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'AdminItem', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('admin_user_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminUserGroup';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['admin_item_admin_user_group_access_list']))
    {
      $values = array();
      foreach ($this->object->getAdminItemAdminUserGroupAccesss() as $obj)
      {
        $values[] = $obj->getAdminItemId();
      }

      $this->setDefault('admin_item_admin_user_group_access_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveAdminItemAdminUserGroupAccessList($con);
  }

  public function saveAdminItemAdminUserGroupAccessList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['admin_item_admin_user_group_access_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(AdminItemAdminUserGroupAccessPeer::ADMIN_USER_GROUP_ID, $this->object->getPrimaryKey());
    AdminItemAdminUserGroupAccessPeer::doDelete($c, $con);

    $values = $this->getValue('admin_item_admin_user_group_access_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new AdminItemAdminUserGroupAccess();
        $obj->setAdminUserGroupId($this->object->getPrimaryKey());
        $obj->setAdminItemId($value);
        $obj->save();
      }
    }
  }

}
