<?php

class myValidatorUserNickname extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->addMessage('invalid_error', '客户昵称首字符不能为数字');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($value) {
        $clean = ($value);
        
        // 检查客户昵称是否合规
        if($value != ""){
            $regex_nickname = '/^[0-9]{1}/i';
            if(preg_match($regex_nickname, $value)){
                throw new sfValidatorError($this, 'invalid_error', array('value' => $value));
            }
        }
        
        return $clean;
    }

}

?>