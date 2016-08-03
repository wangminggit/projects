<?php

/**
 * Skeleton subclass for performing query and update operations on the 'regulation_category' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class RegulationCategoryPeer extends BaseRegulationCategoryPeer {

    const CATEGORY_GPLC = 1;      #挂牌流程
    const CATEGORY_SGLC = 2;      #申购流程
    const CATEGORY_JSLC = 3;      #交收流程
    const CATEGORY_TGLC = 4;      #托管流程
    const CATEGORY_BCXZ = 5;      #补充细则

    public static $regulation_category_ids = array(
        self::CATEGORY_GPLC,
        self::CATEGORY_SGLC,
        self::CATEGORY_JSLC,
        self::CATEGORY_TGLC,
        self::CATEGORY_BCXZ,
    );

    public static function getItems() {
        $c = new Criteria();
        return self::doSelect($c);
    }

}

// RegulationCategoryPeer
