<?php

require_once dirname(__FILE__) . '/../lib/admin_user_groupGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/admin_user_groupGeneratorHelper.class.php';

/**
 * admin_user_group actions.
 *
 * @package    s.sakura.com.cn
 * @subpackage admin_user_group
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class admin_user_groupActions extends autoAdmin_user_groupActions {

    public function preExecute() {
        $this->configuration = new admin_user_groupGeneratorConfiguration();

        if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName()))) {
            $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
        }

        $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));
        
        // 检查访问的用户组，如果是超级管理员则跳转到列表页面
        $this->hasAccessAdminUserGroup();
        
        $this->helper = new admin_user_groupGeneratorHelper();
    }
    
    private function hasAccessAdminUserGroup(){
        $result = true;
        
        $admin_user_group = AdminUserGroupPeer::retrieveByPK($this->getRequestParameter('id'));
        if(is_object($admin_user_group) && $admin_user_group->getIsSuperAdmin() == 1){
            $result = false;
        }
        
        if(!$result){
            $this->redirect('@admin_user_group');
        }
    }

}
