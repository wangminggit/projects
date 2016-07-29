<?php

/**
 * AdminItem form base class.
 *
 * @method AdminItem getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAdminItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                                      => new sfWidgetFormInputHidden(),
      'admin_category_id'                       => new sfWidgetFormPropelChoice(array('model' => 'AdminCategory', 'add_empty' => true)),
      'name'                                    => new sfWidgetFormInputText(),
      'url'                                     => new sfWidgetFormInputText(),
      'image'                                   => new sfWidgetFormInputText(),
      'module'                                  => new sfWidgetFormInputText(),
      'is_enabled'                              => new sfWidgetFormInputText(),
      'position'                                => new sfWidgetFormInputText(),
      'is_show_message'                         => new sfWidgetFormInputText(),
      'get_message_action'                      => new sfWidgetFormInputText(),
      'admin_item_admin_user_group_access_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'AdminUserGroup')),
    ));

    $this->setValidators(array(
      'id'                                      => new sfValidatorPropelChoice(array('model' => 'AdminItem', 'column' => 'id', 'required' => false)),
      'admin_category_id'                       => new sfValidatorPropelChoice(array('model' => 'AdminCategory', 'column' => 'id', 'required' => false)),
      'name'                                    => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'url'                                     => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'image'                                   => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'module'                                  => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'is_enabled'                              => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'position'                                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'is_show_message'                         => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'get_message_action'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'admin_item_admin_user_group_access_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'AdminUserGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('admin_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminItem';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['admin_item_admin_user_group_access_list']))
    {
      $values = array();
      foreach ($this->object->getAdminItemAdminUserGroupAccesss() as $obj)
      {
        $values[] = $obj->getAdminUserGroupId();
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
    $c->add(AdminItemAdminUserGroupAccessPeer::ADMIN_ITEM_ID, $this->object->getPrimaryKey());
    AdminItemAdminUserGroupAccessPeer::doDelete($c, $con);

    $values = $this->getValue('admin_item_admin_user_group_access_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new AdminItemAdminUserGroupAccess();
        $obj->setAdminItemId($this->object->getPrimaryKey());
        $obj->setAdminUserGroupId($value);
        $obj->save();
      }
    }
  }

}
