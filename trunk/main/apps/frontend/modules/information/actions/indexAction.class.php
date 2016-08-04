<?php

class indexAction extends sfAction {

    public function execute($request) {
        $this->information_category_id = $this->getRequestParameter('category', InformationCategoryPeer::CATEGORY_QXDZGG);
        if(!in_array($this->information_category_id, InformationCategoryPeer::$information_category_ids)){
            $this->information_category_id = InformationCategoryPeer::CATEGORY_QXDZGG;
        }
        
        $pager = new sfPropelPager('Information', 10);
        $c = new Criteria();
        $c->add(InformationPeer::INFORMATION_CATEGORY_ID, $this->information_category_id);
        $c->addDescendingOrderByColumn(InformationPeer::RELEASE_DATE);
        $pager->setCriteria($c);
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->setPeerMethod('doSelect');
        $pager->init();
        $this->pager = $pager;
    }

}

?>

