<?php

/**
 * Aboutus filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAboutusFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'aboutus_category_id'      => new sfWidgetFormPropelChoice(array('model' => 'AboutusCategory', 'add_empty' => true)),
      'created_by_admin_user_id' => new sfWidgetFormPropelChoice(array('model' => 'AdminUser', 'add_empty' => true)),
      'title'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'release_date'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'image'                    => new sfWidgetFormFilterInput(),
      'summary'                  => new sfWidgetFormFilterInput(),
      'body'                     => new sfWidgetFormFilterInput(),
      'is_enable'                => new sfWidgetFormFilterInput(),
      'position'                 => new sfWidgetFormFilterInput(),
      'page_view'                => new sfWidgetFormFilterInput(),
      'created_at'               => new sfWidgetFormFilterInput(),
      'updated_at'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'aboutus_category_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AboutusCategory', 'column' => 'id')),
      'created_by_admin_user_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'AdminUser', 'column' => 'id')),
      'title'                    => new sfValidatorPass(array('required' => false)),
      'release_date'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'image'                    => new sfValidatorPass(array('required' => false)),
      'summary'                  => new sfValidatorPass(array('required' => false)),
      'body'                     => new sfValidatorPass(array('required' => false)),
      'is_enable'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'position'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'page_view'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_at'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('aboutus_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Aboutus';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'aboutus_category_id'      => 'ForeignKey',
      'created_by_admin_user_id' => 'ForeignKey',
      'title'                    => 'Text',
      'release_date'             => 'Date',
      'image'                    => 'Text',
      'summary'                  => 'Text',
      'body'                     => 'Text',
      'is_enable'                => 'Number',
      'position'                 => 'Number',
      'page_view'                => 'Number',
      'created_at'               => 'Number',
      'updated_at'               => 'Number',
    );
  }
}
