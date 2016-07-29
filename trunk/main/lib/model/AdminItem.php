<?php

/**
 * Skeleton subclass for representing a row from the 'admin_item' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminItem extends BaseAdminItem {

    public function __toString() {
        $admin_category = AdminCategoryPeer::retrieveByPK($this->getAdminCategoryId());
        if (is_object($admin_category)) {
            return $admin_category->getName() . " - " . $this->getName();
        }
        return $this->getName();
    }

}

// AdminItem
