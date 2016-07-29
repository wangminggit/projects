<?php

/**
 * Skeleton subclass for performing query and update operations on the 'admin_item' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminItemPeer extends BaseAdminItemPeer {

    const MODEL_USER_APPLICATION_ADMIN_ITEM_ID = 26;        #会员申请审核admin_item_id

    public static function getCurrentAdminItem() {
        $current_module = sfContext::getInstance()->getModuleName();
        $c = new Criteria();
        $c->add(self::MODULE, $current_module);
        return self::doSelectOne($c);
    }

    public static function getAccessableAdminItemsCriteria() {
        $c = new Criteria();

        // 如果是超级管理员则跳过模块关联检查
        if (Theuser::isSuperAdminUserByCurrentAdminUser()) {
            
        } else {
            // Join
            $c->addJoin(AdminItemAdminUserGroupAccessPeer::ADMIN_ITEM_ID, AdminItemPeer::ID);
            $c->addJoin(AdminItemAdminUserGroupAccessPeer::ADMIN_USER_GROUP_ID, AdminUserGroupPeer::ID);
            // 注意只join view字段，如果2个字段都join会少数据
            $c->addJoin(AdminUserPeer::ADMIN_USER_GROUP_ID, AdminUserGroupPeer::ID);
            $c->addJoin(AdminItemPeer::ADMIN_CATEGORY_ID, AdminCategoryPeer::ID);

            // 当前用户
            $c->add(AdminUserPeer::ID, Theuser::getCurrentAdminUserIntId());
        }

        // 启用的后台模块
        $c->add(AdminItemPeer::IS_ENABLED, 1);

        // 排序
        $c->addAscendingOrderByColumn(AdminItemPeer::POSITION);

        $c->setDistinct();

        return $c;
    }

    /**
     * 获得可以访问的Admin模块，注意这里只是获得可访问的模块列表，还未涉及模块内的Edit/View判断
     * 
     * @return array
     */
    public static function getAccessableAdminItems() {
        $c = self::getAccessableAdminItemsCriteria();
        return self::doSelect($c);
    }

    public static function getAccessableAdminItemIds() {
        $result = array();
        $admin_items = self::getAccessableAdminItems();
        foreach ($admin_items as $admin_item) {
            $result[] = $admin_item->getId();
        }
        return $result;
    }

    public static function retrieveByModule($module) {
        $c = new Criteria();
        $c->add(self::MODULE, $module);
        return self::doSelectOne($c);
    }

    public static function hasMessage($admin_category_id) {
        $result = false;

        $c = new Criteria();
        $c->add(self::ADMIN_CATEGORY_ID, $admin_category_id);
        $c->add(self::IS_ENABLED, 1);
        $c->add(self::IS_SHOW_MESSAGE, 1);
        $objs = self::doSelect($c);
        if (count($objs) > 0) {
            foreach ($objs as $obj) {
                $module = U::FormatString($obj->getModule());
                eval('$message_total = ' . $module . 'Peer::' . $obj->getGetMessageAction() . '();');
                if (is_numeric($message_total) && $message_total > 0) {
                    return true;
                }
            }
        }

        return $result;
    }

    public static function hasMessageByUrl($url) {
        $result = false;

        $c = new Criteria();
        $c->add(self::URL, $url);
        $c->add(self::IS_SHOW_MESSAGE, 1);
        $obj = self::doSelectOne($c);
        if (is_object($obj)) {
            $module = U::FormatString($obj->getModule());
            eval('$message_total = ' . $module . 'Peer::' . $obj->getGetMessageAction() . '();');
            $result = (is_numeric($message_total) && $message_total > 0) ? true : false;
        }

        return $result;
    }

    public static function getMessageNumByUrl($url) {
        $result = 0;

        $c = new Criteria();
        $c->add(self::URL, $url);
        $c->add(self::IS_SHOW_MESSAGE, 1);
        $obj = self::doSelectOne($c);
        if (is_object($obj)) {
            $module = U::FormatString($obj->getModule());
            eval('$message_total = ' . $module . 'Peer::' . $obj->getGetMessageAction() . '();');
            $result = is_numeric($message_total) ? $message_total : 0;
        }

        return $result;
    }

}

// AdminItemPeer
