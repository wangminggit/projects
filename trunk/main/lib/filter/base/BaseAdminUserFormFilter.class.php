<?php

/**
 * AdminUser filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAdminUserFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'admin_user_group_id' => new sfWidgetFormPropelChoice(array('model' => 'AdminUserGroup', 'add_empty' => true)),
      'username'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'                => new sfWidgetFormFilterInput(),
      'email'               => new sfWidgetFormFilterInput(),
      'phone_mobile'        => new sfWidgetFormFilterInput(),
      'nickname'            => new sfWidgetFormFilterInput(),
      'is_enabled'          => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterInput(),
      'updated_at'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'admin_user_group_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AdminUserGroup', 'column' => 'id')),
      'username'            => new sfValidatorPass(array('required' => false)),
      'password'            => new sfValidatorPass(array('required' => false)),
      'name'                => new sfValidatorPass(array('required' => false)),
      'email'               => new sfValidatorPass(array('required' => false)),
      'phone_mobile'        => new sfValidatorPass(array('required' => false)),
      'nickname'            => new sfValidatorPass(array('required' => false)),
      'is_enabled'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('admin_user_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'AdminUser';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'admin_user_group_id' => 'ForeignKey',
      'username'            => 'Text',
      'password'            => 'Text',
      'name'                => 'Text',
      'email'               => 'Text',
      'phone_mobile'        => 'Text',
      'nickname'            => 'Text',
      'is_enabled'          => 'Number',
      'created_at'          => 'Number',
      'updated_at'          => 'Number',
    );
  }
}
