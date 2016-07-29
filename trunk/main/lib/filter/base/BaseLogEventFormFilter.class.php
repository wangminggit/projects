<?php

/**
 * LogEvent filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseLogEventFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'action'         => new sfWidgetFormFilterInput(),
      'display_action' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'action'         => new sfValidatorPass(array('required' => false)),
      'display_action' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('log_event_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LogEvent';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'action'         => 'Text',
      'display_action' => 'Text',
    );
  }
}
