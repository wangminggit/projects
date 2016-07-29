<?php

/**
 * Util functions for propel
 *
 * @author Administrator
 */
class TcPropelHelper {
    
    /**
     * in claim.CLAIM_STATUS_ID
     * out getClaimStatusId
     */
    public static function modifiedColumnNameToGetName($in){
        $out = '';
        
        $in_parts = explode('.', $in);
        $in_main = $in_parts[1];
        $in_main_parts = explode('_', $in_main);
        foreach($in_main_parts as $in_main_part){
            $out .= ucfirst(strtolower($in_main_part));
        }
        
        return $out;
    }
    
    
    /**
     * in claim.CLAIM_STATUS_ID
     * out claim_status_id
     */    
    public static function modifiedColumnNameToNoTableModifiedColumnName($in){
        $out = '';
        
        $in_parts = explode('.', $in);
        $out = $in_parts[1];
        
        return strtolower($out);        
    }
    
    
    /**
     * in claim.CLAIM_STATUS_ID
     * out claim
     */    
    public static function modifiedColumnNameToTableName($in){
        $out = '';
        
        $in_parts = explode('.', $in);
        $out = $in_parts[0];
        
        return strtolower($out);        
    }
    
}

?>
