<?php

/**
 * AdminUserGroup filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAdminUserGroupFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'is_super_admin'                          => new sfWidgetFormFilterInput(),
      'is_fixed'                                => new sfWidgetFormFilterInput(),
      'created_at'                              => new sfWidgetFormFilterInput(),
      'updated_at'                              => new sfWidgetFormFilterInput(),
      'admin_item_admin_user_group_access_list' => new sfWidgetFormPropelChoice(array('model' => 'AdminItem', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                                    => new sfValidatorPass(array('required' => false)),
      'is_super_admin'                          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_fixed'                                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'                              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'                              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'admin_item_admin_user_group_access_list' => new sfValidatorPropelChoice(array('model' => 'AdminItem', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('admin_user_group_filters[%s]');

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

    $criteria->addJoin(AdminItemAdminUserGroupAccessPeer::ADMIN_USER_GROUP_ID, AdminUserGroupPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(AdminItemAdminUserGroupAccessPeer::ADMIN_ITEM_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(AdminItemAdminUserGroupAccessPeer::ADMIN_ITEM_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'AdminUserGroup';
  }

  public function getFields()
  {
    return array(
      'id'                                      => 'Number',
      'name'                                    => 'Text',
      'is_super_admin'                          => 'Number',
      'is_fixed'                                => 'Number',
      'created_at'                              => 'Number',
      'updated_at'                              => 'Number',
      'admin_item_admin_user_group_access_list' => 'ManyKey',
    );
  }
}
