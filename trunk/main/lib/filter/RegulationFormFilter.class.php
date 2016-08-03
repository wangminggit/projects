<?php

/**
 * Regulation filter form.
 *
 * @package    huiju.feinong
 * @subpackage filter
 * @author     Your name here
 */
class RegulationFormFilter extends BaseRegulationFormFilter {

    public function configure() {
        $this->widgetSchema['release_date'] = new sfWidgetFormInputText(array(), array('readonly' => 'readonly'));
        $this->validatorSchema['release_date'] = new sfValidatorPass();

        $this->widgetSchema['is_enable'] = new sfWidgetFormSelect(array('choices' => array('' => '', '1' => '启用', '2' => '禁用')));
        $this->validatorSchema['is_enable'] = new sfValidatorPass();
    }

    public function addIsEnableColumnCriteria(Criteria $criteria, $field, $value) {

        if (isset($value)) {
            switch ($value) {
                case '1':
                    $criteria->add(RegulationPeer::IS_ENABLE, 1, Criteria::EQUAL);
                    break;
                case '2':
                    $criteria->add(RegulationPeer::IS_ENABLE, NULL, Criteria::ISNULL);
                    break;
            }
        }
    }

    public function addReleaseDateColumnCriteria(Criteria $criteria, $field, $value) {
        $criteria->add(RegulationPeer::RELEASE_DATE, trim($value));
    }

}
