<?php

/**
 * Skeleton subclass for performing query and update operations on the 'information_category' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class InformationCategoryPeer extends BaseInformationCategoryPeer {

    const CATEGORY_QXDZGG = 1;      #青西大宗公告
    const CATEGORY_QXDZDT = 2;      #青西大宗动态
    const CATEGORY_HYDT = 3;      #会员动态
    const CATEGORY_HEDT = 4;      #行业动态

    public static $information_category_ids = array(
        self::CATEGORY_QXDZGG,
        self::CATEGORY_QXDZDT,
        self::CATEGORY_HYDT,
        self::CATEGORY_HEDT,
    );

    public static function getItems() {
        $c = new Criteria();
        return self::doSelect($c);
    }

}

// InformationCategoryPeer
