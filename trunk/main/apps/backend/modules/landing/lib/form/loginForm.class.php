<?php

class loginForm extends BaseForm {

    public function configure() {
        
        $this->setWidgets(array(
            'username' => new sfWidgetFormInput(array('label' => '用户名：')),
            'password' => new sfWidgetFormInput(array('type' => 'password', 'label' => '密&#12288码：')),
        ));

        $this->setValidators(array(
            'username' => new sfValidatorString(),
            'password' => new sfValidatorString(),
        ));

        // 检查是否需要开启验证码功能
        if (LogPeer::isEnableCaptcha(2)) {
//            var_dump(LogPeer::isEnableCaptcha());die;
            $this->widgetSchema['captcha'] = new sfWidgetCaptchaGD();
            $this->validatorSchema['captcha'] = new sfCaptchaGDValidator(array('length' => 4));
        }

        $this->validatorSchema->setPostValidator(new guardValidatorUser());

        $this->widgetSchema->setNameFormat('signin[%s]');
    }

}
