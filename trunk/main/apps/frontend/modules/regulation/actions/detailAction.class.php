<?php

class detailAction extends sfAction {

    public function execute($request) {
        $this->regulation = RegulationPeer::retrieveByPK($this->getRequestParameter('id'));
        $this->forward404Unless($this->regulation);

        // 更新浏览数
        $this->regulation->setPageView($this->regulation->getPageView() + 1);
        $this->regulation->save();


        $this->regulation_category_id = $this->getRequestParameter('category', RegulationCategoryPeer::CATEGORY_GPLC);
        if (!in_array($this->regulation_category_id, RegulationCategoryPeer::$regulation_category_ids)) {
            $this->regulation_category_id = RegulationCategoryPeer::CATEGORY_GPLC;
        }
    }

}

?>
