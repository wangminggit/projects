<?php

/**
 * Skeleton subclass for performing query and update operations on the 'information' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class InformationPeer extends BaseInformationPeer {

    public static function retrieveByTitleAndInformationCategoryId($title, $information_category_id) {
        $c = new Criteria();
        $c->add(self::TITLE, $title);
        $c->add(self::INFORMATION_CATEGORY_ID, $information_category_id);
        return self::doSelectOne($c);
    }

    public static function retrieveByPKAndEnable($id) {
        $c = new Criteria();
        $c->add(self::ID, $id);
        $c->add(self::IS_ENABLE, 1);
        return self::doSelectOne($c);
    }

    public static function retrieveByPKAndEnableAndInformationCategoryId($id, $information_category_id) {
        $c = new Criteria();
        $c->add(self::ID, $id);
        $c->add(self::INFORMATION_CATEGORY_ID, $information_category_id);
        $c->add(self::IS_ENABLE, 1);
        return self::doSelectOne($c);
    }

    public static function getItemByLimit($information_category_id, $limit = 8) {
        $c = new Criteria();
        $c->add(self::IS_ENABLE, 1);
        $c->add(self::INFORMATION_CATEGORY_ID, $information_category_id);
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

    public static function getFirstItemByInformationCategoryId($information_category_id) {
        $c = new Criteria();
        $c->add(InformationPeer::INFORMATION_CATEGORY_ID, $information_category_id);
        $c->addDescendingOrderByColumn(self::RELEASE_DATE);
        return self::doSelectOne($c);
    }

    public static function getOtherItemByInformationCategoryId($information_category_id) {
        $c = new Criteria();
        $c->add(InformationPeer::INFORMATION_CATEGORY_ID, $information_category_id);
        $c->addDescendingOrderByColumn(self::ID);
        $c->setOffset(1);
        $c->setLimit(3);
        return self::doSelect($c);
    }

}

// InformationPeer
