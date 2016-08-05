<?php

/**
 * Skeleton subclass for performing query and update operations on the 'aboutus_category' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AboutusCategoryPeer extends BaseAboutusCategoryPeer {

    const CATEGORY_GYQXDZ = 1;      #关于青西大宗
    const CATEGORY_FLSM = 2;      #法律声明
    const CATEGORY_LXWM = 3;      #联系我们
    const CATEGORY_CPYC = 4;      #诚聘英才

    public static $aboutus_category_ids = array(
        self::CATEGORY_GYQXDZ,
        self::CATEGORY_FLSM,
        self::CATEGORY_LXWM,
        self::CATEGORY_CPYC,
    );

    public static function getItems() {
        $c = new Criteria();
        return self::doSelect($c);
    }

}

// AboutusCategoryPeer
