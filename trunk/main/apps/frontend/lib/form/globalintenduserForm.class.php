<?php

class globalintenduserForm extends BaseForm {

    public function configure() {
        
        $this->setWidgets(array(
            'name' => new sfWidgetFormInput(array('label' => '真实姓名：'), array("class" => "name_input", "maxlength" => "10")),
            'phone' => new sfWidgetFormInput(array('label' => '手机号码：'), array("class" => "phone_input", "maxlength" => "11" )),
        ));

        $this->widgetSchema->setNameFormat('globalintenduser[%s]');

        $this->setValidators(array(
            'name' => new sfValidatorString(array('required' => true, 'max_length' => 10)),
            'phone' => new sfValidatorAnd(array(new sfValidatorString(array('required' => true, 'min_length' => 11, 'max_length' => 11)), new myValidatorMobile())),
        ));
    }
}