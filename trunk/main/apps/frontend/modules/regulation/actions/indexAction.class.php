<?php

class indexAction extends sfAction {

    public function execute($request) {
        $this->regulation_category_id = $this->getRequestParameter('category', RegulationCategoryPeer::CATEGORY_GPLC);
        if(!in_array($this->regulation_category_id, RegulationCategoryPeer::$regulation_category_ids)){
            $this->regulation_category_id = RegulationCategoryPeer::CATEGORY_GPLC;
        }
        
        $pager = new sfPropelPager('Regulation', 10);
        $c = new Criteria();
        $c->add(RegulationPeer::REGULATION_CATEGORY_ID, $this->regulation_category_id);
        $c->addDescendingOrderByColumn(RegulationPeer::RELEASE_DATE);
        $pager->setCriteria($c);
        $pager->setPage($this->getRequestParameter('page', 1));
        $pager->setPeerMethod('doSelect');
        $pager->init();
        $this->pager = $pager;
    }

}

?>

