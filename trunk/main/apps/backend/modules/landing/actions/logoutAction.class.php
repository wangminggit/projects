<?php

class logoutAction extends sfAction {

    public function execute($request) {
        // 记录日志
        LogPeer::log3(Theuser::getCurrentAdminUser());
        
        session_unset();
        session_destroy();
        session_regenerate_id();

        header('location: /admin.php');
        exit;
    }

}
