<?php

/**
 * Blacklist form base class.
 *
 * @method Blacklist getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseBlacklistForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'IP'         => new sfWidgetFormInputText(),
      'reason'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormInputText(),
      'updated_at' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Blacklist', 'column' => 'id', 'required' => false)),
      'IP'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'reason'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'updated_at' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blacklist[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Blacklist';
  }


}
