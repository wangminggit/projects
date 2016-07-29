<?php

/**
 * Log form base class.
 *
 * @method Log getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'log_event_id'             => new sfWidgetFormPropelChoice(array('model' => 'LogEvent', 'add_empty' => true)),
      'app_id'                   => new sfWidgetFormPropelChoice(array('model' => 'App', 'add_empty' => true)),
      'description'              => new sfWidgetFormInputText(),
      'parameters'               => new sfWidgetFormTextarea(),
      'ip'                       => new sfWidgetFormInputText(),
      'object_id'                => new sfWidgetFormInputText(),
      'created_by_admin_user_id' => new sfWidgetFormPropelChoice(array('model' => 'AdminUser', 'add_empty' => true)),
      'created_at'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'Log', 'column' => 'id', 'required' => false)),
      'log_event_id'             => new sfValidatorPropelChoice(array('model' => 'LogEvent', 'column' => 'id', 'required' => false)),
      'app_id'                   => new sfValidatorPropelChoice(array('model' => 'App', 'column' => 'id', 'required' => false)),
      'description'              => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'parameters'               => new sfValidatorString(array('required' => false)),
      'ip'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'object_id'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_by_admin_user_id' => new sfValidatorPropelChoice(array('model' => 'AdminUser', 'column' => 'id', 'required' => false)),
      'created_at'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Log';
  }


}
