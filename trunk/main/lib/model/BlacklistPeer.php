<?php

/**
 * Skeleton subclass for performing query and update operations on the 'blacklist' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class BlacklistPeer extends BaseBlacklistPeer {

    public static function retrieveByIP($ip) {
        $c = new Criteria();
        $c->add(self::IP, $ip);
        return self::doSelectOne($c);
    }

    public static function checkSourceIp() {
        $ip = sfContext::getInstance()->getRequest()->getHttpHeader('addr', 'remote');
        $obj = self::retrieveByIP($ip);
        if (is_object($obj)) {
            die("Error.");
        }
    }

}

// BlacklistPeer
