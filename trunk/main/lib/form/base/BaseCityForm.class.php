<?php

/**
 * City form base class.
 *
 * @method City getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCityForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'province_id' => new sfWidgetFormPropelChoice(array('model' => 'Province', 'add_empty' => true)),
      'name'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'City', 'column' => 'id', 'required' => false)),
      'province_id' => new sfValidatorPropelChoice(array('model' => 'Province', 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('city[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'City';
  }


}
