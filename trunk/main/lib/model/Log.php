<?php

/**
 * Skeleton subclass for representing a row from the 'log' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Log extends BaseLog {

    public function getLogeventTxt() {
        $result = "";

        $log_event = LogEventPeer::retrieveByPK($this->getLogEventId());
        if (is_object($log_event)) {
            $result = $log_event->getDisplayAction();
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
            
        }
    }

    private function hookAfterUpdate($before_o, $modified_columns) {
        if (!UtilsSymfony::isFromTask()) {
            if (count($modified_columns) > 0) {
                
            }
        }
    }

    private function hookBeforeDelete() {
        if (!UtilsSymfony::isFromTask()) {
            
        }
    }

    private function hookAfterDelete() {
        if (!UtilsSymfony::isFromTask()) {
            
        }
    }

}

// Log
