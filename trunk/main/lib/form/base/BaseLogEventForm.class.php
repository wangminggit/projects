<?php

/**
 * LogEvent form base class.
 *
 * @method LogEvent getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLogEventForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'action'         => new sfWidgetFormInputText(),
      'display_action' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'LogEvent', 'column' => 'id', 'required' => false)),
      'action'         => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'display_action' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogEvent';
  }


}
