<?php

/**
 * Skeleton subclass for performing query and update operations on the 'app' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class AppPeer extends BaseAppPeer {

    public static function retrieveBySfApp($sf_app) {
        // cache for this object tables as we know they are only a few entrys there, safe to cache
        static $cache;

        // fill all in first request during one php call
        if (count($cache) == 0) {
            $objs = self::doSelect(new Criteria());
            foreach ($objs as $obj) {
                $cache[$obj->getSfApp()] = $obj;
            }
        }

        // return 
        return $cache[$sf_app];
    }

    public static function getByCurrentSfApp() {
        $sf_app = sfContext::getInstance()->getConfiguration()->getApplication();
        return self::retrieveBySfApp($sf_app);
    }
    
    /**
     * 返回当前的admin app module名称
     * 
     * @return string
     */
    public static function getCurrentAdminModuleName() {
        $result = null;
        if (UtilsSymfony::isFromAdmin()) {
            $result = sfContext::getInstance()->getModuleName();
            // 有时候拿不到，则尝试这个
            $result = is_null($result) ? sfContext::getInstance()->getRequest()->getParameter('module') : $result;
        }
        return $result;
    }

    public static function errorNoAppAccess() {
        header('HTTP/1.1 403 Forbidden');
        echo 'no access';
        exit;
    }

}

// AppPeer
