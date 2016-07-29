<?php

class indexAction extends sfAction {

    public function execute($request) {
        $this->redirect('/admin.php/report_admin_user_login/list');
        
    }

}

?>
