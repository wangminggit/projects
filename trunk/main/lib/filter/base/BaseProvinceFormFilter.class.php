<?php

/**
 * Province filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseProvinceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(),
      'name_short' => new sfWidgetFormFilterInput(),
      'capital'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'name_short' => new sfValidatorPass(array('required' => false)),
      'capital'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('province_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Province';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'name_short' => 'Text',
      'capital'    => 'Text',
    );
  }
}
