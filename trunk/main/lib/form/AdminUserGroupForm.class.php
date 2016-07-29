<?php

/**
 * AdminUserGroup form.
 *
 * @package    s.sakura.com.cn
 * @subpackage form
 * @author     Your name here
 */
class AdminUserGroupForm extends BaseAdminUserGroupForm {

    public function configure() {
        $this->widgetSchema['admin_item_admin_user_group_access_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
    }

}
