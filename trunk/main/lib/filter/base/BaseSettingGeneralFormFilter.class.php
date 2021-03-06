<?php

/**
 * SettingGeneral filter form base class.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSettingGeneralFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'system_email_smtp_host'     => new sfWidgetFormFilterInput(),
      'system_email_smtp_port'     => new sfWidgetFormFilterInput(),
      'system_email_smtp_use_ssl'  => new sfWidgetFormFilterInput(),
      'system_email_smtp_username' => new sfWidgetFormFilterInput(),
      'system_email_smtp_password' => new sfWidgetFormFilterInput(),
      'system_email_from_accout'   => new sfWidgetFormFilterInput(),
      'seo_title'                  => new sfWidgetFormFilterInput(),
      'seo_meta_keywords'          => new sfWidgetFormFilterInput(),
      'seo_meta_description'       => new sfWidgetFormFilterInput(),
      'statistical_code'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'system_email_smtp_host'     => new sfValidatorPass(array('required' => false)),
      'system_email_smtp_port'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'system_email_smtp_use_ssl'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'system_email_smtp_username' => new sfValidatorPass(array('required' => false)),
      'system_email_smtp_password' => new sfValidatorPass(array('required' => false)),
      'system_email_from_accout'   => new sfValidatorPass(array('required' => false)),
      'seo_title'                  => new sfValidatorPass(array('required' => false)),
      'seo_meta_keywords'          => new sfValidatorPass(array('required' => false)),
      'seo_meta_description'       => new sfValidatorPass(array('required' => false)),
      'statistical_code'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('setting_general_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SettingGeneral';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'system_email_smtp_host'     => 'Text',
      'system_email_smtp_port'     => 'Number',
      'system_email_smtp_use_ssl'  => 'Number',
      'system_email_smtp_username' => 'Text',
      'system_email_smtp_password' => 'Text',
      'system_email_from_accout'   => 'Text',
      'seo_title'                  => 'Text',
      'seo_meta_keywords'          => 'Text',
      'seo_meta_description'       => 'Text',
      'statistical_code'           => 'Text',
    );
  }
}
