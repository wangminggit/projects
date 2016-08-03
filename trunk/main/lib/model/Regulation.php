<?php

/**
 * Skeleton subclass for representing a row from the 'regulation' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Regulation extends BaseRegulation {

    public function getImagePath() {
        $filename = "/uploads/regulation/" . $this->getId() . "/image/" . $this->getImage();
        return $filename;
    }

    public function getImageBasePath() {
        return sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'regulation' . DIRECTORY_SEPARATOR . $this->getId() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR;
    }

    public function getImageRelativePath() {
        $result = "";

        if ($this->getImage()) {
            $basepath = $this->getImageBasePath();
            if (file_exists($basepath . $this->getImage())) {
                $result = '/uploads/regulation/' . $this->getId() . '/image/' . $this->getImage();
            } else {
                $result = '/images/common/noimage/100.png';
            }
        } else {
            $result = '/images/common/noimage/100.png';
        }

        return $result;
    }

    public function deleteImage() {
        $dest_base_path = $this->getImageBasePath();
        // make some resized codpy
        $file = $dest_base_path . $this->getImage();
        if (file_exists($file)) {
            @unlink($file);
        }
        $this->setImage(NULL);
        $this->save();
    }

    public function getIsEnableTxt() {
        $result = "<span style='color:green'>启用</span>";

        if ($this->getIsEnable() === NULL) {
            $result = "<span style='color:red'>禁用</span>";
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
        
    }

    private function hookBeforeCreate() {
        $this->setCreatedByAdminUserId(Theuser::getCurrentAdminUserIntId());
    }

    public function hookAfterCreate() {
        $this->setPosition($this->getId());
        $this->save();

        $this->logCreate();
    }

    private function hookAfterUpdate($before_o, $modified_columns) {
        if (count($modified_columns) > 0) {
            $this->logUpdate();
        }
    }

    private function hookBeforeDelete() {
        $path = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'regulation' . DIRECTORY_SEPARATOR . $this->getId() . DIRECTORY_SEPARATOR;
        UtilsFile::deleteDirectory($path);
    }

    private function hookAfterDelete() {
        $this->logDelete();
    }

    private function logCreate() {
        
    }

    private function logUpdate() {
        
    }

    private function logDelete() {
        
    }

    public function getTitleTxt($length = null) {
        if (is_null($length)) {
            return $this->getTitle();
        } else {
            return Utils::substr_word($this->getTitle(), $length);
        }
    }

    public function getNextItem() {
        $c = new Criteria();
        $c->add(RegulationPeer::ID, $this->getId(), Criteria::LESS_THAN);
        $c->addDescendingOrderByColumn(RegulationPeer::ID);
        $c->setLimit(1);
        return RegulationPeer::doSelectOne($c);
    }

}

// Regulation
