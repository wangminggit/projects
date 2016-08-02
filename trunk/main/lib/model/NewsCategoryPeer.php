<?php

/**
 * Skeleton subclass for performing query and update operations on the 'news_category' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class NewsCategoryPeer extends BaseNewsCategoryPeer {

    const CATEGORY_JRTT = 1;      #青西大宗公告
    const CATEGORY_CJYW = 2;      #青西大宗动态
    const CATEGORY_CJZX = 3;      #会员动态
    const CATEGORY_ZCFG = 4;      #行业动态

    public static $news_category_ids = array(
        self::CATEGORY_JRTT,
        self::CATEGORY_CJYW,
        self::CATEGORY_CJZX,
        self::CATEGORY_ZCFG,
    );

    public static function getItems() {
        $c = new Criteria();
        return self::doSelect($c);
    }

}

// NewsCategoryPeer
