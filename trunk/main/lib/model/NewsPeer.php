<?php

/**
 * Skeleton subclass for performing query and update operations on the 'news' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class NewsPeer extends BaseNewsPeer {

    public static function getShowHomepageItem() {
        $c = new Criteria();
        $c->add(self::IS_SHOW_HOMEPAGE, 1);
        $c->addDescendingOrderByColumn(self::ID);
        return self::doSelectOne($c);
    }

    public static function getItemByLimit($limit = 8) {
        $c = new Criteria();
        $c->add(self::IS_SHOW_HOMEPAGE, NULL, Criteria::ISNULL);
        $c->add(self::IS_ENABLE, 1);
        $c->setLimit($limit);
        $c->addDescendingOrderByColumn(self::ID);
        return self::doSelect($c);
    }

    public static function getCorrelationItems() {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::ID);
        $c->setLimit(5);
        return self::doSelect($c);
    }

}

// NewsPeer
