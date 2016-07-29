<?php

/**
 * Skeleton subclass for performing query and update operations on the 'province' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class ProvincePeer extends BaseProvincePeer {

    const JIANGSU_ID = 7;          #江苏省id

    
    /**
     * 按照名字获得省份，如果不存在就新建一个
     * 
     * @param type $name
     * @return \Province
     */
    public static function tryGetAndCreate($name){
        $o = self::retrieveByName($name);   
        if(!$o){
            $o = new Province();
            $o->setName($name);
            $o->save();
        }
        return $o;
    }
    
    public static function retrieveByName($name){
        $c = new Criteria();
        $c->add(self::NAME, $name);
        return self::doSelectOne($c);
    }
    
}

// ProvincePeer
