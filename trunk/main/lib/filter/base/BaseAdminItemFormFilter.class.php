<?php

/**
 * AdminItem filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAdminItemFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'admin_category_id'                       => new sfWidgetFormPropelChoice(array('model' => 'AdminCategory', 'add_empty' => true)),
      'name'                                    => new sfWidgetFormFilterInput(),
      'url'                                     => new sfWidgetFormFilterInput(),
      'image'                                   => new sfWidgetFormFilterInput(),
      'module'                                  => new sfWidgetFormFilterInput(),
      'is_enabled'                              => new sfWidgetFormFilterInput(),
      'position'                                => new sfWidgetFormFilterInput(),
      'is_show_message'                         => new sfWidgetFormFilterInput(),
      'get_message_action'                      => new sfWidgetFormFilterInput(),
      'admin_item_admin_user_group_access_list' => new sfWidgetFormPropelChoice(array('model' => 'AdminUserGroup', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'admin_category_id'                       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AdminCategory', 'column' => 'id')),
      'name'                                    => new sfValidatorPass(array('required' => false)),
      'url'                                     => new sfValidatorPass(array('required' => false)),
      'image'                                   => new sfValidatorPass(array('required' => false)),
      'module'                                  => new sfValidatorPass(array('required' => false)),
      'is_enabled'                              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'position'                                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_show_message'                         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'get_message_action'                      => new sfValidatorPass(array('required' => false)),
      'admin_item_admin_user_group_access_list' => new sfValidatorPropelChoice(array('model' => 'AdminUserGroup', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('admin_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addAdminItemAdminUserGroupAccessListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(AdminItemAdminUserGroupAccessPeer::ADMIN_ITEM_ID, AdminItemPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(AdminItemAdminUserGroupAccessPeer::ADMIN_USER_GROUP_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(AdminItemAdminUserGroupAccessPeer::ADMIN_USER_GROUP_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'AdminItem';
  }

  public function getFields()
  {
    return array(
      'id'                                      => 'Number',
      'admin_category_id'                       => 'ForeignKey',
      'name'                                    => 'Text',
      'url'                                     => 'Text',
      'image'                                   => 'Text',
      'module'                                  => 'Text',
      'is_enabled'                              => 'Number',
      'position'                                => 'Number',
      'is_show_message'                         => 'Number',
      'get_message_action'                      => 'Text',
      'admin_item_admin_user_group_access_list' => 'ManyKey',
    );
  }
}
