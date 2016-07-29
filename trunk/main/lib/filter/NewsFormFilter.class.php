<?php

/**
 * News filter form.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
class NewsFormFilter extends BaseNewsFormFilter {

    public function configure() {
        $this->widgetSchema['is_enable'] = new sfWidgetFormSelect(array('choices' => array('' => '', '1' => '启用', '2' => '禁用')));
        $this->validatorSchema['is_enable'] = new sfValidatorPass();
        
        $this->widgetSchema['is_show_homepage'] = new sfWidgetFormSelect(array('choices' => array('' => '', '1' => '是', '2' => '否')));
        $this->validatorSchema['is_show_homepage'] = new sfValidatorPass();
    }

    public function addIsEnableColumnCriteria(Criteria $criteria, $field, $value) {

        if (isset($value)) {
            switch ($value) {
                case '1':
                    $criteria->add(NewsPeer::IS_ENABLE, 1, Criteria::EQUAL);
                    break;
                case '2':
                    $criteria->add(NewsPeer::IS_ENABLE, NULL, Criteria::ISNULL);
                    break;
            }
        }
    }
    
    public function addIsShowHomepageColumnCriteria(Criteria $criteria, $field, $value) {

        if (isset($value)) {
            switch ($value) {
                case '1':
                    $criteria->add(NewsPeer::IS_SHOW_HOMEPAGE, 1, Criteria::EQUAL);
                    break;
                case '2':
                    $criteria->add(NewsPeer::IS_SHOW_HOMEPAGE, NULL, Criteria::ISNULL);
                    break;
            }
        }
    }

}
