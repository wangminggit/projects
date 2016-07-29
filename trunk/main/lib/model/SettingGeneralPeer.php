<?php

/**
 * Skeleton subclass for performing query and update operations on the 'setting_general' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class SettingGeneralPeer extends BaseSettingGeneralPeer {

    public static function getSetting() {
        return self::retrieveByPK(1);
    }
    
    public static function getSystemEmailSmtpUseSslStatus(){
        $obj = self::getSetting();
        return $obj->getSystemEmailSmtpUseSsl() == 1 ? "ssl" : "";
    }
    
    public static function getPresetMessages(){
        $obj = self::getSetting();
        return is_object($obj) ? $obj->getSmsTpl1() : "";
    }
    
    public static function getGlobalSeoTitle(){
        $obj = self::getSetting();
        return is_object($obj) ? $obj->getSeoTitle() : "";
    }
    
    public static function getGlobalSeoKeywords(){
        $obj = self::getSetting();
        return is_object($obj) ? $obj->getSeoMetaKeywords() : "";
    }
    
    public static function getGlobalSeoDescription(){
        $obj = self::getSetting();
        return is_object($obj) ? $obj->getSeoMetaDescription() : "";
    }
    
    public static function getStatisticalCode(){
        $obj = self::getSetting();
        return is_object($obj) ? $obj->getStatisticalCode(ESC_RAW) : "";
    }
    
    public static function hasStatisticalCode(){
        $result = false;
        
        if(self::getStatisticalCode() != ""){
            $result = true;
        }
        
        return $result;
    }

}

// SettingGeneralPeer
