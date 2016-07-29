<?php

/**
 * AdminUser filter form.
 *
 * @package    s.shangzhi.cpieredu
 * @subpackage filter
 * @author     Your name here
 */
class AdminUserFormFilter extends BaseAdminUserFormFilter {

    public function configure() {
        $this->widgetSchema['is_enabled'] = new sfWidgetFormSelect(array('choices' => array('' => '', '1' => '启用', '2' => '禁用')));
        $this->validatorSchema['is_enabled'] = new sfValidatorPass();
    }

    public function addIsEnabledColumnCriteria(Criteria $criteria, $field, $value) {

        if (isset($value)) {
            switch ($value) {
                case '1':
                    $criteria->add(AdminUserPeer::IS_ENABLED, 1, Criteria::EQUAL);
                    break;
                case '2':
                    $criteria->add(AdminUserPeer::IS_ENABLED, NULL, Criteria::ISNULL);
                    break;
            }
        }
    }

}
