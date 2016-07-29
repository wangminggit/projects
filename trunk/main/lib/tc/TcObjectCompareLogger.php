<?php

/**
 *  sub class of tcObjectComparer, for cell level record
 * 
 */
class TcObjectComparerLogger {
    
    private $column;
    private $column_txt;
    private $table;
    private $old_value;
    private $new_value;
    private $old_value_txt;
    private $new_value_txt;
    private $change_result_glue;
    
    public function __construct($column, $column_txt, $table, $old_value, $new_value, $old_value_txt, $new_value_txt,$change_result_glue) {
        $this->column = $column;
        $this->column_txt = $column_txt;
        
        $this->table = $table;
        
        $this->old_value = $old_value;
        $this->new_value = $new_value;
        
        $this->old_value_txt = $old_value_txt;
        $this->new_value_txt = $new_value_txt;
        $this->change_result_glue = $change_result_glue;
        
    }

    public function getColumn(){
        return $this->column;
    }
    
    public function getColumnTxt(){
        return $this->column_txt;
    }
    
    public function getTable(){
        return $this->table;
    }
    
    public function getOldValue(){
        return $this->$old_value;
    }
    
    public function getNewValue(){
        return $this->new_value;
    }    
    
    public function getOldValueTxt(){
        return $this->old_value_txt;
    } 
    
    public function getNewValueTxt(){
        return $this->new_value_txt;
    }
    
    public function __toString(){
        return $this->change_result_glue.$this->getColumnTxt().' ['.$this->getOldValueTxt().'] > ['.$this->getNewValueTxt().']'.$this->change_result_glue;
    }
    
}

?>
