<?php

class myInvestorNumberByRegisterValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->addMessage('invalid_error', '资产帐号可能已经存在于会员中，或正在申请中');
        $this->addMessage('invalid_error_1', '资产帐号错误');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($value) {
        $clean = ($value);

        // 检查资产帐号是否已经存在与会员数据中
        $check_result = UserPeer::checkInvestorNumberByUserApplication($value);
        
        if(is_array($check_result) && isset($check_result['status'])){
            
            switch ($check_result['status']) {
                case UserPeer::CHECK_INVESTOR_NUMBER_FAILURE:
                    throw new sfValidatorError($this, 'invalid_error_1', array('value' => $value));
                case UserPeer::CHECK_INVESTOR_NUMBER_ERROR_1:
                    throw new sfValidatorError($this, 'invalid_error', array('value' => $value));
                case UserPeer::CHECK_INVESTOR_NUMBER_ERROR_2:
                    throw new sfValidatorError($this, 'invalid_error', array('value' => $value));
                default:
                    break;
            }
        }

        return $clean;
    }

}

?>