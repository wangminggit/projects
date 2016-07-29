<?php

/**
 * News filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseNewsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_by_admin_user_id' => new sfWidgetFormPropelChoice(array('model' => 'AdminUser', 'add_empty' => true)),
      'title'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'image'                    => new sfWidgetFormFilterInput(),
      'summary'                  => new sfWidgetFormFilterInput(),
      'body'                     => new sfWidgetFormFilterInput(),
      'is_enable'                => new sfWidgetFormFilterInput(),
      'is_show_homepage'         => new sfWidgetFormFilterInput(),
      'position'                 => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterInput(),
      'updated_at'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'created_by_admin_user_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AdminUser', 'column' => 'id')),
      'title'                    => new sfValidatorPass(array('required' => false)),
      'image'                    => new sfValidatorPass(array('required' => false)),
      'summary'                  => new sfValidatorPass(array('required' => false)),
      'body'                     => new sfValidatorPass(array('required' => false)),
      'is_enable'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_show_homepage'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'position'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('news_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'News';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'created_by_admin_user_id' => 'ForeignKey',
      'title'                    => 'Text',
      'image'                    => 'Text',
      'summary'                  => 'Text',
      'body'                     => 'Text',
      'is_enable'                => 'Number',
      'is_show_homepage'         => 'Number',
      'position'                 => 'Number',
      'created_at'               => 'Number',
      'updated_at'               => 'Number',
    );
  }
}
