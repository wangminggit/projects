<?php

class FilterForm extends sfForm {

    public function configure() {
        $this->setWidgets(array(
            'datefrom' => new sfWidgetFormInputText(array('label' => '开始时间'), array('class' => 'standard_date')),
            'dateto' => new sfWidgetFormInputText(array('label' => '结束时间'), array('class' => 'standard_date')),
            'log_event_id' => new sfWidgetFormSelect(array('label' => '事件类型', 'choices' => array('' => '', '1' => '登录成功', '2' => '登录失败', '3' => '注销成功')), array('class' => 'standard_date')),
            'admin_user_id' => new sfWidgetFormSelect(array('label' => '后台用户', 'choices' => self::buildAdminUsers()), array('class' => 'standard_date')),
        ));

        $this->widgetSchema->setFormFormatterName('list');

        $sf_user = sfContext::getInstance()->getUser();
        $filters = $sf_user->getAttribute('report_admin_user_login_list.filters', array(), 'admin_module');
        $defaults = array(
            'datefrom' => isset($filters['datefrom']) ? $filters['datefrom'] : '',
            'dateto' => isset($filters['dateto']) ? $filters['dateto'] : '',
            'log_event_id' => isset($filters['log_event_id']) ? $filters['log_event_id'] : '',
            'admin_user_id' => isset($filters['admin_user_id']) ? $filters['admin_user_id'] : '',
        );
        $this->setDefaults($defaults);
    }

    private function buildAdminUsers() {
        $maps = array(
            '' => ''
        );

        $admin_users = AdminUserPeer::doSelect(new Criteria());
        if (count($admin_users) > 0) {
            foreach ($admin_users as $admin_user) {
                $maps[$admin_user->getId()] = $admin_user->getName();
            }
        }

        return $maps;
    }

}
