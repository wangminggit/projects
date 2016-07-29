<?php

/**
 * App filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAppFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'sf_app' => new sfWidgetFormFilterInput(),
      'name'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'sf_app' => new sfValidatorPass(array('required' => false)),
      'name'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('app_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'App';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'sf_app' => 'Text',
      'name'   => 'Text',
    );
  }
}
