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
      'title'                    => new sfWidgetFormInputText(),
      'image'                    => new sfWidgetFormInputText(),
      'summary'                  => new sfWidgetFormTextarea(),
      'body'                     => new sfWidgetFormTextarea(),
      'is_enable'                => new sfWidgetFormInputText(),
      'is_show_homepage'         => new sfWidgetFormInputText(),
      'position'                 => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormInputText(),
      'updated_at'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorPropelChoice(array('model' => 'News', 'column' => 'id', 'required' => false)),
      'created_by_admin_user_id' => new sfValidatorPropelChoice(array('model' => 'AdminUser', 'column' => 'id', 'required' => false)),
      'title'                    => new sfValidatorString(array('max_length' => 255)),
      'image'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'summary'                  => new sfValidatorString(array('required' => false)),
      'body'                     => new sfValidatorString(array('required' => false)),
      'is_enable'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'is_show_homepage'         => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'position'                 => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
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
