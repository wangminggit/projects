<?php

class indexAction extends sfAction {

    public function execute($request) {
        $this->redirect('/index.php/landing/home');
    }

}
