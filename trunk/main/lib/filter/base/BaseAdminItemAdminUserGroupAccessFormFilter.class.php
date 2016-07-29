<?php

/**
 * AdminItemAdminUserGroupAccess filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAdminItemAdminUserGroupAccessFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'created_at'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('admin_item_admin_user_group_access_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminItemAdminUserGroupAccess';
  }

  public function getFields()
  {
    return array(
      'admin_item_id'       => 'ForeignKey',
      'admin_user_group_id' => 'ForeignKey',
      'created_at'          => 'Number',
    );
  }
}
