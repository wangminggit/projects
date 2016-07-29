<?php

/**
 * Description of myGeneratorHelper
 *
 * @author Administrator
 */
abstract class myModelGeneratorHelper extends sfModelGeneratorHelper {

    public function linkToNew($params) {
        // 权限
        return parent::linkToNew($params);
    }

    public function linkToEdit($object, $params) {
        // 权限
        return parent::linkToEdit($object, $params);
    }

    public function linkToDelete($object, $params) {
        // 权限
        return parent::linkToDelete($object, $params);
    }

    public function linkToList($params) {
        // 权限
        return parent::linkToList($params);
    }

    public function linkToSave($object, $params) {
        // 权限
        return parent::linkToSave($object, $params);
    }

    public function linkToSaveAndAdd($object, $params) {
        // 权限
        return parent::linkToSaveAndAdd($object, $params);
    }

}

?>
