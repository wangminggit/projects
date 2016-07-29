<?php



/**
 * Skeleton subclass for performing query and update operations on the 'city' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class CityPeer extends BaseCityPeer {

    /**
     * 按照名称和省份获得city object,如果不存在就新建一个
     * 
     * @param type $name
     * @param type $province
     * @return \City
     */
    public static function tryGetAndCreate($name, $province){
        $o = self::retrieveByNameAndProvince($name, $province);   
        if(!$o){
            $o = new City();
            $o->setProvinceId($province->getId());
            $o->setName($name);
            $o->save();
        }else{
        }
        return $o;
    }
    
    public static function retrieveByNameAndProvince($name, $province){
        $c = new Criteria();
        $c->add(self::PROVINCE_ID, $province->getId());
        $c->add(self::NAME, $name);
        return self::doSelectOne($c);
    }
    
    public static function getCitysByProvinceId($province_id){
        $c = new Criteria();
        $c->add(self::PROVINCE_ID, $province_id);
        return self::doSelect($c);
    }
    
} // CityPeer
