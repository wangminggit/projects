<?php

class UserApplicationHelper {

    /**
     * 返回错误处理方式
     * 
     * @param type $message
     */
    public static function errorMsg($message = '当前编辑内容错误') {
        $current_module = sfContext::getInstance()->getModuleName();
        sfContext::getInstance()->getUser()->setFlash('error', $message);
        sfContext::getInstance()->getController()->redirect('@' . $current_module);
        exit;
    }

    /**
     * 验证用户是否有权限编辑当前内容
     * 
     * $module  对应的是需要验证的模块名称
     * $obj     对应验证模块中需要验证的一个对象
     * $action  对应验证模块中当前执行的动作
     */
    public static function hasCanEditCurrentContent($module, $obj, $action) {
        // 如果是超级管理员则跳过
        if (Theuser::isSuperAdminUserByCurrentAdminUser()) {
            return;
        }

        if (is_object($obj)) {
            eval('self::_hasCanEdit' . $module . '($obj, $action);');
        } else {
            self::errorMsg('当前编辑内容错误');
        }
    }

    /**
     * 验证用户当前访问的用户申请是否属于“会员申请(营业部)”
     * 
     * @param type $obj
     * @param type $action
     * @return type
     */
    private static function _hasCanEditUserApplicationByDepartment($obj, $action) {
        if ($obj->getType() == UserApplicationPeer::TYPE_CUSTOMER_MANAGER && $obj->getCreatedByAdminUserId() == Theuser::getCurrentAdminUserIntId()) {
            // 营业部入会申请不允许执行“删除”操作
            $actions = array(
                'delete',
            );
            if(in_array($action, $actions)){
                self::errorMsg('无权限进行此操作');
            }
            return;
        } else {
            self::errorMsg('访问内容出错');
        }
    }

    /**
     * 验证用户当前访问的用户申请是否属于“会员申请(95521)”
     * 
     * @param type $obj
     * @param type $action
     * @return type
     */
    private static function _hasCanEditUserApplicationByCustomerService($obj, $action) {
        if ($obj->getType() == UserApplicationPeer::TYPE_95521 && $obj->getCreatedByDepartmentId() == Theuser::getCurrentAdminUserDepartmentId()) {
            // 95521入会申请不允许执行“删除”操作
            $actions = array(
                'delete',
            );
            if(in_array($action, $actions)){
                self::errorMsg('无权限进行此操作');
            }
            return;
        } else {
            self::errorMsg('访问内容出错');
        }
    }

    /**
     * 验证用户是否有权限访问在对应的 Action 中访问会员申请审核
     * 
     * @param type $obj
     * @param type $action
     * @return type
     */
    private static function _hasCanEditUserApplication($obj, $action) {
        if ($obj->getStatus() != UserApplicationPeer::STATUS_TODO) {
            // 如果当前申请已经不是”待处理“状态，则意为着该条申请已经被处理过
            // 那么非管理员的用户则无法访问 delete 对应 Action，只能查看 view
            $actions = array(
                'delete',
            );
            if(in_array($action, $actions)){
                self::errorMsg('无权限进行此操作');
            }
            
            // 如果是查看操作，被部门只能看到属于自己审核的内容
            if($action == "view" && $obj->getDepartmentId() != Theuser::getCurrentAdminUserDepartmentId()){
                self::errorMsg('无权限查看此内容');
            }
            return;
        } 
    }

}

?>
