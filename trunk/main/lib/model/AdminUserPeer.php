<?php

/**
 * Skeleton subclass for performing query and update operations on the 'admin_user' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminUserPeer extends BaseAdminUserPeer {

    public static function hasAdminAppAccess() {
        return Theuser::getCurrentAdminUser() ? true : false;
    }

    public static function retrieveByUsername($username) {
        $c = new Criteria();
        $c->add(self::USERNAME, $username);
        return self::doSelectOne($c);
    }

    public static function hasAdminModuleAccess() {
        $result = false;

        // 如果是超级管理员则跳过模块关联检查
        if(Theuser::isSuperAdminUserByCurrentAdminUser()){
            return true;
        }
        
        $admin_user = Theuser::getCurrentAdminUser();
        if ($admin_user) {
            $result = $admin_user->canAccessTheModule();
        }

        return $result;
    }

    /**
     * 检查后台用户能否访问指定的模块
     * 
     * @param string $module
     * @param int $admin_user_id
     * @return boolean
     */
    public static function hasAdminModuleAccessByAdminUserId($module, $admin_user_id) {
        $result = false;

        // 检查module是否存在
        $admin_item = AdminItemPeer::retrieveByModule($module);
        $admin_user = AdminUserPeer::retrieveByPK($admin_user_id);
        if (is_object($admin_item) && is_object($admin_user)) {
            $accessable_admin_item_ids = AdminItemPeer::getAccessableAdminItemIds();
            if (in_array($admin_item->getId(), $accessable_admin_item_ids)) {
                $result = true;
            }
        }

        return $result;
    }

    public static function getItemsByDepartmentId($department_id) {
        $c = new Criteria();
        $c->add(self::DEPARTMENT_ID, $department_id);
        return self::doSelect($c);
    }

    /**
     * 根据昵称查询所有的管理员用户id
     * 
     * @param type $nickname
     * @return type
     */
    public static function getAdminUserIdsByNickname($nickname) {
        $result = array();
        $c = new Criteria();
        $c->add(self::NICKNAME, $nickname);
        $admin_users = self::doSelect($c);
        if (count($admin_users) > 0) {
            foreach ($admin_users as $admin_user) {
                $result[] = $admin_user->getId();
            }
        }
        return $result;
    }

}

// AdminUserPeer
