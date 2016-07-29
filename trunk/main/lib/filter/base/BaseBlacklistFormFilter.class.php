<?php

/**
 * Blacklist filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseBlacklistFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'IP'         => new sfWidgetFormFilterInput(),
      'reason'     => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterInput(),
      'updated_at' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'IP'         => new sfValidatorPass(array('required' => false)),
      'reason'     => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('blacklist_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Blacklist';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'IP'         => 'Text',
      'reason'     => 'Text',
      'created_at' => 'Number',
      'updated_at' => 'Number',
    );
  }
}
