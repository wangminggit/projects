<?php

/**
 * Skeleton subclass for representing a row from the 'admin_user_group' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AdminUserGroup extends BaseAdminUserGroup {

    public function __toString() {
        return $this->getName();
    }

    /**
     * Get TcInUseChecker Obj
     * 
     * @return obj TcInUseChecker
     */
    public function getIsInUseChecker() {
        $fks = array(
            '后台用户' => 'AdminUserPeer::ADMIN_USER_GROUP_ID',
        );

        if (!$in_use_checker) {
            $in_use_checker = new TcInUseChecker($this, $fks);
            $in_use_checker->check();
        }
        return $in_use_checker;
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
        if ($this->getIsSuperAdmin() == 1 || $this->getIsFixed() == 1) {
            header('HTTP/1.1 403 Error');
            echo '<h1>Error</h1>';
            exit;
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

}

// AdminUserGroup
