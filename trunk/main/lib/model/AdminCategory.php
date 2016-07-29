<?php

/**
 * Skeleton subclass for representing a row from the 'admin_category' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminCategory extends BaseAdminCategory {

    public function __toString() {
        return $this->getName();
    }

    /**
     * 获得可以访问的Admin模块，注意这里只是获得可访问的模块列表，还未涉及模块内的Edit/View判断
     * 
     * @return array
     */    
    public function getEnabledHasAccessItems() {
        $c = AdminItemPeer::getAccessableAdminItemsCriteria();
        $c->add(AdminItemPeer::ADMIN_CATEGORY_ID, $this->id);
        $result = AdminItemPeer::doSelect($c);
        return $result;
    }

}

// AdminCategory
