<?php

class myInvestorNumberByEventValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        $this->addMessage('invalid_error', '该资产帐号没有对应会员数据');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($value) {
        $clean = ($value);

        // 检查资产帐号是否存在与会员数据中
        $user = UserPeer::retrieveByInvestorNumber($value);
        if (!$user) {
            UserApplicationHelper::errorMsg("资产帐号验证错误，当前提交的资产帐号【" . $value . "】没有对应会员数据。");
        }

        return $clean;
    }

}

?>