<?php



/**
 * Skeleton subclass for performing query and update operations on the 'aboutus' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AboutusPeer extends BaseAboutusPeer {
    public static function retrieveByTitleAndAboutusCategoryId($title,$aboutus_category_id){
        $c=new Criteria();
        $c->add(self::TITLE,$title);
        $c->add(self::ABOUTUS_CATEGORY_ID,$aboutus_category_id);
        return self::doSelectOne($c);
    }
     public static function retrieveByPKAndEnable($id) {
        $c = new Criteria();
        $c->add(self::ID, $id);
        $c->add(self::IS_ENABLE, 1);
        return self::doSelectOne($c);
    }

    public static function retrieveByPKAndEnableAndAboutusCategoryId($id, $aboutus_category_id) {
        $c = new Criteria();
        $c->add(self::ID, $id);
        $c->add(self::ABOUTUS_CATEGORY_ID, $aboutus_category_id);
        $c->add(self::IS_ENABLE, 1);
        return self::doSelectOne($c);
    }

    public static function getItemByLimit($aboutus_category_id, $limit = 8) {
        $c = new Criteria();
        $c->add(self::IS_ENABLE, 1);
        $c->add(self::ABOUTUS_CATEGORY_ID, $aboutus_category_id);
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

    public static function getHotNews($limit = 10) {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::PAGE_VIEW);
        $c->setLimit($limit);
        return self::doSelect($c);
    }

    public static function getFirstItemByAboutusCategoryId($aboutus_category_id) {
        $c = new Criteria();
        $c->add(AboutusPeer::ABOUTUS_CATEGORY_ID, $aboutus_category_id);
        $c->addDescendingOrderByColumn(self::RELEASE_DATE);
        return self::doSelectOne($c);
    }

    public static function getOtherItemByAboutusCategoryId($aboutus_category_id) {
        $c = new Criteria();
        $c->add(AboutusPeer::ABOUTUS_CATEGORY_ID, $aboutus_category_id);
        $c->addDescendingOrderByColumn(self::ID);
        $c->setOffset(1);
        $c->setLimit(3);
        return self::doSelect($c);
    }
} // AboutusPeer
