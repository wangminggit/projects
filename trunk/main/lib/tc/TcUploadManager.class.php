<?php

/**
 * 
 */
class TcUploadManager{
           
    /**
     * Get folder hashing path, design for 256*256=65536 folders as containers
     * 
     * @param type $key
     * @return string of 2 levels folder path
     */
    public static function HashingPath($key, $is_url=false) {
        $hash_str = md5($key);
        $level = 2;
        $hash_dir = array();
        for ($i = 0; $i < $level; $i++) {
            $hash_dir[] = substr($hash_str, $i, 2);
        }
        
        return $is_url ? implode('/', $hash_dir) : implode(DIRECTORY_SEPARATOR, $hash_dir);;
    }
    
   
}
?>
