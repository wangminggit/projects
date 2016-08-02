<?php

/**
 * News form base class.
 *
 * @method News getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseNewsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'created_by_admin_user_id' => new sfWidgetFormPropelChoice(array('model' => 'AdminUser', 'add_empty' => true)),
      'news_category_id'         => new sfWidgetFormInputText(),
      'title'                    => new sfWidgetFormInputText(),
      'release_date'             => new sfWidgetFormDate(),
      'image'                    => new sfWidgetFormInputText(),
      'summary'                  => new sfWidgetFormTextarea(),
      'body'                     => new sfWidgetFormTextarea(),
      'page_view'                => new sfWidgetFormInputText(),
      'is_enable'                => new sfWidgetFormInputText(),
      'position'                 => new sfWidgetFormInputText(),
      'seo_keywords'             => new sfWidgetFormTextarea(),
      'seo_description'          => new sfWidgetFormTextarea(),
      'created_at'               => new sfWidgetFormInputText(),
      'updated_at'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'News', 'column' => 'id', 'required' => false)),
      'created_by_admin_user_id' => new sfValidatorPropelChoice(array('model' => 'AdminUser', 'column' => 'id', 'required' => false)),
      'news_category_id'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'title'                    => new sfValidatorString(array('max_length' => 255)),
      'release_date'             => new sfValidatorDate(array('required' => false)),
      'image'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'summary'                  => new sfValidatorString(array('required' => false)),
      'body'                     => new sfValidatorString(array('required' => false)),
      'page_view'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'is_enable'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'position'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'seo_keywords'             => new sfValidatorString(array('required' => false)),
      'seo_description'          => new sfValidatorString(array('required' => false)),
      'created_at'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'updated_at'               => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'News';
  }


}
