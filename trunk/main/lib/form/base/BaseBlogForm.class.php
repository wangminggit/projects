<?php

/**
 * Blog form base class.
 *
 * @method Blog getObject() Returns the current form's model object
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseBlogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'title'      => new sfWidgetFormInputText(),
      'summary'    => new sfWidgetFormInputText(),
      'body'       => new sfWidgetFormTextarea(),
      'pageview'   => new sfWidgetFormInputText(),
      'is_enable'  => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormInputText(),
      'updated_at' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Blog', 'column' => 'id', 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 255)),
      'summary'    => new sfValidatorString(array('max_length' => 500, 'required' => false)),
      'body'       => new sfValidatorString(array('required' => false)),
      'pageview'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'is_enable'  => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
      'created_at' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'updated_at' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('blog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Blog';
  }


}
