<?php

class myInvestorNumberByUserValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->addMessage('invalid_error', '资产帐号已经存在于会员数据中');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($value) {
        $clean = ($value);

        // 检查资产帐号是否已经存在与会员数据中
        $user = UserPeer::retrieveByInvestorNumber($value);
        if(is_object($user)){
            UserApplicationHelper::errorMsg("资产帐号验证错误，当前提交的资产帐号【" . $value . "】已经存在于会员列表中。");
        }

        return $clean;
    }

}

?>