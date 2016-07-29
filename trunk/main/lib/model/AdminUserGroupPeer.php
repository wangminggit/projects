<?php

/**
 * Skeleton subclass for performing query and update operations on the 'admin_user_group' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminUserGroupPeer extends BaseAdminUserGroupPeer {

    /**
     * 获取一个用户组, 用于数据迁移以及其他需要一个默认用户组的地方
     * 
     * @param int $department_type
     * @return AdminUserGroup
     */
    public static function getDefaultGroup() {
        $c = new Criteria();
        return self::doSelectOne($c);
    }

    public static function hasCanAccoutAdminItemByAdminItemName($admin_item_name) {
        $result = false;

        // 获取当前登录用户的admin_user_group
        $admin_user_group_id = Theuser::getCurrentAdminUserGroupId();
        // 获取目标模块的admin_item_id
        $c = new Criteria();
        $c->add(AdminItemPeer::MODULE, $admin_item_name);
        $admin_item = AdminItemPeer::doSelectOne($c);
        if (is_object($admin_item)) {
            // 检查当前模块和管理员用户组之间是否有关联
            $a = new Criteria();
            $a->add(AdminItemAdminUserGroupAccessEditPeer::ADMIN_ITEM_ID, $admin_item->getId());
            $a->add(AdminItemAdminUserGroupAccessEditPeer::ADMIN_USER_GROUP_ID, $admin_user_group_id);
            $obj = AdminItemAdminUserGroupAccessEditPeer::doSelectOne($a);
            if (is_object($obj)) {
                $result = true;
            }
        }

        return $result;
    }

    public static function getIdByIBShengJi() {
        $result = "";

        $c = new Criteria();
        $c->add(self::NAME, "IB省级分公司用户");
        $obj = self::doSelectOne($c);
        if (is_object($obj)) {
            $result = $obj->getId();
        }

        return $result;
    }

}

// AdminUserGroupPeer
