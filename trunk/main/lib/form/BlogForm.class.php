<?php

/**
 * Blog form.
 *
 * @package    huiju.feinong
 * @subpackage form
 * @author     Your name here
 */
class BlogForm extends BaseBlogForm {

    public function configure() {
        $this->widgetSchema['is_enable'] = new myOwnWidgetFormInputCheckbox(array('value_attribute_value' => 1));
        $this->validatorSchema['is_enable'] = new sfValidatorPass();
    }

}
