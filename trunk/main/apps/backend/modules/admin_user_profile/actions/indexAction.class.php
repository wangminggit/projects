<?php

class indexAction extends sfAction {

    public function execute($request) {
        // 验证权限，只有登录过后的用户才可以访问这里
        $this->forward404Unless(Theuser::getCurrentAdminUser());

        $this->admin_user = Theuser::getCurrentAdminUser();
        $this->form = new AdminUserProfileForm();

        if ($request->isMethod(sfRequest::POST)) {
            $this->doPost($request);
        }
    }

    private function doPost($request) {
        $this->form->bind($request->getParameter('admin_user_profile'));
        if ($this->form->isValid()) {
            // 验证表单传递过来的admin_user_id和当前登录的admin_user是否一致
            $form_data = $this->form->getValues();
            if ($form_data['admin_user_id'] == Theuser::getCurrentAdminUserIntId()) {
                $this->_doPost($form_data);
            }
            $this->result_success = '内容保存成功。';
        } else {
            $this->result_error = '有错误，内容保存失败。';
        }
    }

    private function _doPost($form_data) {
        $obj = AdminUserPeer::retrieveByPK($form_data['admin_user_id']);
        $obj->setName($form_data['name']);
        $obj->setEmail($form_data['email']);
        if (isset($form_data['change_password']) && $form_data['change_password'] == 1) {
            $obj->setPassword(md5($form_data['password']));
        }
        $obj->save();
    }

}

?>
