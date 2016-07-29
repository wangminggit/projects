<?php

class loginAction extends sfAction {

    public function execute($request) {
        $this->form = new loginForm();
        $this->setLayout('layout_login');
        if ($request->isMethod(sfRequest::POST)) {
            $this->dopost($request);
        }
    }

    private function dopost($request) {
        $this->form->bind($request->getParameter('signin'));
        if ($this->form->isValid()) {
            $admin_user = AdminUserPeer::retrieveByUsername($this->form->getValue('username'));
            $_SESSION['valid_admin_user'] = $admin_user->getId();
            
            // 记录日志
            LogPeer::log1($admin_user);
            
            $this->redirect('/admin.php');
        }else{
            // 记录日志
            LogPeer::log2($_POST['signin']['username']);
        }
    }

}

?>
