<?php

class indexAction extends sfAction {

    public function execute($request) {
        $pager = new sfPropelPager('Aboutus', 10);
        $c = new Criteria();
        $c->add(AboutusPeer::ABOUTUS_CATEGORY_ID, $this->aboutus_category_id=1);
        $c->addDescendingOrderByColumn(AboutusPeer::RELEASE_DATE);
        $pager->setCriteria($c);
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->setPeerMethod('doSelect');
        $pager->init();
        $this->pager = $pager;
    }

}

?>
