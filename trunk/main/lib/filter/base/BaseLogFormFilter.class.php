<?php

/**
 * Log filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'log_event_id'             => new sfWidgetFormPropelChoice(array('model' => 'LogEvent', 'add_empty' => true)),
      'app_id'                   => new sfWidgetFormPropelChoice(array('model' => 'App', 'add_empty' => true)),
      'description'              => new sfWidgetFormFilterInput(),
      'parameters'               => new sfWidgetFormFilterInput(),
      'ip'                       => new sfWidgetFormFilterInput(),
      'object_id'                => new sfWidgetFormFilterInput(),
      'created_by_admin_user_id' => new sfWidgetFormPropelChoice(array('model' => 'AdminUser', 'add_empty' => true)),
      'created_at'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'log_event_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'LogEvent', 'column' => 'id')),
      'app_id'                   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'App', 'column' => 'id')),
      'description'              => new sfValidatorPass(array('required' => false)),
      'parameters'               => new sfValidatorPass(array('required' => false)),
      'ip'                       => new sfValidatorPass(array('required' => false)),
      'object_id'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_by_admin_user_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AdminUser', 'column' => 'id')),
      'created_at'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('log_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Log';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'log_event_id'             => 'ForeignKey',
      'app_id'                   => 'ForeignKey',
      'description'              => 'Text',
      'parameters'               => 'Text',
      'ip'                       => 'Text',
      'object_id'                => 'Number',
      'created_by_admin_user_id' => 'ForeignKey',
      'created_at'               => 'Number',
    );
  }
}
