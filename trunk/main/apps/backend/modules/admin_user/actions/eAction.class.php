<?php

class eAction extends sfAction {

    public function execute($request) {

        $this->setLayout(false);

        //Export the output in Excel 
        $this->getResponse()->setContentType('application/msexcel');
        $c = $this->buildCriteria();
        $this->admin_users = AdminUserPeer::doSelect($c);
    }

    private function buildCriteria() {
        $filters = $this->getUser()->getAttribute('admin_user.filters', array(), 'admin_module');

        $c = new Criteria();

        if (isset($filters['admin_user_group_id']) && $filters['admin_user_group_id'] != "") {
            $c->add(AdminUserPeer::ADMIN_USER_GROUP_ID, $filters['admin_user_group_id']);
        }
        
        if (isset($filters['department_id']) && $filters['department_id'] != "") {
            $c->add(AdminUserPeer::DEPARTMENT_ID, $filters['department_id']);
        }

        if (isset($filters['username']['text']) && $filters['username']['text'] != "") {
            $c->add(AdminUserPeer::USERNAME, '%' . $filters['username']['text'] . '%', Criteria::LIKE);
        }

        if (isset($filters['name']['text']) && $filters['name']['text'] != "") {
            $c->add(AdminUserPeer::NAME, '%' . $filters['name']['text'] . '%', Criteria::LIKE);
        }

        if (isset($filters['email']['text']) && $filters['email']['text'] != "") {
            $c->add(AdminUserPeer::EMAIL, '%' . $filters['email']['text'] . '%', Criteria::LIKE);
        }

        if (isset($filters['is_enabled']) && $filters['is_enabled'] != "") {
            $c->add(AdminUserPeer::IS_ENABLED, $filters['is_enabled']);
        }

        $c->setDistinct();
        $c->addDescendingOrderByColumn(AdminUserPeer::ID);

        return $c;
    }

}

?>
