<?php

/**
 * Compare one object's before and after status by propel modified columns
 * return result in array, for detailed log
 *
 * @uses $changes = tcObjectComparer::getChanges($before_o, $after_o, $modified_columns);
 * 
 */
class TcObjectComparer {
    
    private $before_o;
    private $after_o;
    private $modified_columns = array();
    private $changes = array();
    private $change_result_glue;
    
    public function __construct($before_o, $after_o, $modified_columns, $change_result_glue = ' ') {
        $this->before_o = $before_o;
        $this->after_o = $after_o;
        $this->modified_columns = $modified_columns;
        $this->change_result_glue = $change_result_glue;
    }
    
    public function buildChanges(){
        foreach($this->modified_columns as $modified_column){
            $this->changes[$modified_column] = $this->_buildChange($modified_column);
        }
        return $this->changes;
    }
    
    private function _buildChange($modified_column){
        $get_name = TcPropelHelper::modifiedColumnNameToGetName($modified_column);
        $table = TcPropelHelper::modifiedColumnNameToTableName($modified_column);
        $column = TcPropelHelper::modifiedColumnNameToNoTableModifiedColumnName($modified_column);
        
        eval('$old_value = $this->before_o->get'.$get_name.'();');
        eval('$new_value = $this->after_o->get'.$get_name.'();');
        
        list($column_txt, $old_value_txt) = $this->_toTxt($this->before_o, $get_name, $column, $old_value);
        list($column_txt, $new_value_txt) = $this->_toTxt($this->after_o, $get_name, $column, $new_value);
        
        $tc_object_comparer_logger = new TcObjectComparerLogger($column, $column_txt, $table, $old_value, $new_value, $old_value_txt, $new_value_txt, $this->change_result_glue);
       
        return $tc_object_comparer_logger;
    }
    
    /**
     * try to call $object->_toTxtAbcAbc() to get converted display name for some columns
     * 
     * @return string 
     */
    private function _toTxt($object, $get_name, $column, $value){
        if(is_callable(array(get_class($object),'_toTxt'.$get_name))){
            eval('list($column, $value) = $object->_toTxt'.$get_name.'();');
        }
        return array($column, $value);
    } 
    
    /**
     * fast way to get changes
     * 
     * @return array
     */
    public static function getChanges($before_o, $after_o, $modified_columns, $change_result_glue = ' '){
        $tc_object_comparer = new tcObjectComparer($before_o, $after_o, $modified_columns, $change_result_glue);
        return $tc_object_comparer->buildChanges();
    }
}

?>
