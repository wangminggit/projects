<?php

/**
 * Blog filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseBlogFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'title'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'summary'    => new sfWidgetFormFilterInput(),
      'body'       => new sfWidgetFormFilterInput(),
      'pageview'   => new sfWidgetFormFilterInput(),
      'is_enable'  => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterInput(),
      'updated_at' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'title'      => new sfValidatorPass(array('required' => false)),
      'summary'    => new sfValidatorPass(array('required' => false)),
      'body'       => new sfValidatorPass(array('required' => false)),
      'pageview'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_enable'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('blog_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Blog';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'title'      => 'Text',
      'summary'    => 'Text',
      'body'       => 'Text',
      'pageview'   => 'Number',
      'is_enable'  => 'Number',
      'created_at' => 'Number',
      'updated_at' => 'Number',
    );
  }
}
