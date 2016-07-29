<?php

/**
 * Skeleton subclass for representing a row from the 'admin_user' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminUser extends BaseAdminUser {

    public function __toString() {
        return $this->getUsername();
    }

    public function checkPassword($password) {
        return md5($password) == $this->getPassword();
    }
    
    /**
     * 判断当前后台用户是否是超级管理员，我们从部门类型判断
     * 
     * @return bool
     */
    public function isSuperAdminUser() {
        $result = false;
        
        if($this->getAdminUserGroup()->getIsSuperAdmin() == 1){
            $result = true;
        }
        
        return $result;
    }

    public function canAccessTheModule() {
        $result = false;

        $access_modules = array(
            'landing',
            'sfAdminDash',
            'admin_user_profile',
            'admin_user_message',
            '_', // debug module
        );
        
        if (in_array(sfContext::getInstance()->getModuleName(), $access_modules)) {
            return true;
        }

        $admin_item = AdminItemPeer::getCurrentAdminItem();
        $accessable_admin_item_ids = AdminItemPeer::getAccessableAdminItemIds();
        if (in_array($admin_item->getId(), $accessable_admin_item_ids)) {
            $result = true;
        }

        return $result;
    }

    public function getDepartmentTxt() {
        $result = "";

        return $result;
    }

    public function getAdminUserGroupTxt() {
        $result = "";

        $admin_user_group = AdminUserGroupPeer::retrieveByPK($this->getAdminUserGroupId());
        if (is_object($admin_user_group)) {
            $result = $admin_user_group->getName();
        }

        return $result;
    }

    public function getSubDepartmentIds() {
        $result = array();
        
        // 验证当前后台用户是 IB省级分公司用户
        if ($this->getDepartment()->getDepartmentTypeId() == DepartmentTypePeer::TYPE_IB_SHENG_JI) {
            $result = array(
                $this->getDepartmentId()
            );
            
            $c = new Criteria();
            $c->add(DepartmentPeer::PARENT_ID, $this->getDepartmentId());
            $objs = DepartmentPeer::doSelect($c);
            foreach($objs as $obj){
                array_push($result, $obj->getId());
            }
        }
        
        return $result;
    }

    public function save(PropelPDO $con = null) {
        $isInsert = $this->isNew();

        if (!$isInsert) {
            $modified_columns = $this->getModifiedColumns();
            $before_o = $this->getPeer()->retrieveByPK($this->getId());
            $this->hookBeforeUpdate();
        } else {
            $this->hookBeforeCreate();
        }

        parent::save($con);

        if (!$isInsert) {
            $this->_changes = tcObjectComparer::getChanges($before_o, $this, $modified_columns);
        }

        if ($isInsert) {
            $this->hookAfterCreate();
        } else {
            $this->hookAfterUpdate($before_o, $modified_columns);
        }
    }

    public function delete(PropelPDO $con = null) {
        $this->hookBeforeDelete();

        parent::delete($con);

        $this->hookAfterDelete();
    }

    private function hookBeforeUpdate() {
        if (!UtilsSymfony::isFromTask()) {
            
        }
    }

    private function hookBeforeCreate() {
        if (!UtilsSymfony::isFromTask()) {
            
        }
    }

    public function hookAfterCreate() {
        if (!UtilsSymfony::isFromTask()) {
            $this->logCreate();
        }
    }

    private function hookAfterUpdate($before_o, $modified_columns) {
        if (!UtilsSymfony::isFromTask()) {
            if (count($modified_columns) > 0) {
                $this->logUpdate();
            }
        }
    }

    private function hookBeforeDelete() {
        if (!UtilsSymfony::isFromTask()) {
            // 自己不能删除自己
            if($this->getId() == Theuser::getCurrentAdminUserIntId()){
                UserApplicationHelper::errorMsg();
            }
            
        }
    }

    private function hookAfterDelete() {
        if (!UtilsSymfony::isFromTask()) {
            $this->logDelete();
        }
    }

    private function logCreate() {
        
    }

    private function logUpdate() {
        
    }

    private function logDelete() {
        
    }
    
    public function getIsEnabledTxt() {
        return $this->getIsEnabled() == 1 ? "启用" : "禁用";
    }
}

// AdminUser
