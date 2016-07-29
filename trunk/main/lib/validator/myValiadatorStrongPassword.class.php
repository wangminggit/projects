<?php

class myValiadatorStrongPassword extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->addMessage('invalid_strong_password', '密码必须是强密码，长度最少8位，且必须包含数字、小写字母，大写字母，特殊字符（@#$%&）。可使用"生成密码"功能生成强密码');
        $this->addMessage('invalid_password_confirm', '密码不一致');
        $this->addOption("password_confirm");
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($value) {
        $clean = ($value);
        
        //检查密码是否为强密码
//        $match_1 = preg_match("/[0-9]{1,}/", $value);
//        $match_2 = preg_match("/[a-z]{1,}/", $value);
//        $match_3 = preg_match("/[A-Z]{1,}/", $value);
//        $match_4 = preg_match("/[@#$%&]{1,}/", $value);
//        if (!$match_1 || !$match_2 || !$match_3 || !$match_4) {
//            throw new sfValidatorError($this, 'invalid_strong_password', array('value' => $value));
//        }
        
        //检查密码是否一致
        if($this->hasOption("password_confirm") && $value !== $this->getOption("password_confirm")){
            throw new sfValidatorError($this, 'invalid_password_confirm', array('value' => $value));
        }
        
        return $clean;
    }

}

?>