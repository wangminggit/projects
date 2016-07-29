<?php

class myValidatorMobile extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->addMessage('invalid_error_1', '手机号码必须是数字');
        $this->addMessage('invalid_error_2', '手机号码应为11位');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($value) {
        $clean = ($value);
        
        if($value != ""){
            // 是否为数字
            if(!is_numeric($value)){
                throw new sfValidatorError($this, 'invalid_error_1', array('value' => $value));
            }
            // 是否为11位
            if(strlen($value) != 11){
                throw new sfValidatorError($this, 'invalid_error_2', array('value' => $value));
            }
        }
        
        return $clean;
    }

}

?>