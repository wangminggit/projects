<?php

class AuthBackendFilter extends sfFilter {

    /**
     * Execute filter
     *
     * @param sfFilterChain $filterChain
     */
    public function execute($filterChain) {
        // Execute this filter only once
        if ($this->isFirstCall()) {
            // 检查来源IP是否存在于黑名单中
            BlacklistPeer::checkSourceIp();
            
            if ($this->accessWithoutLogin()) {
                
            } else if (AdminUserPeer::hasAdminAppAccess() && AdminUserPeer::hasAdminModuleAccess()) {
                $tmp = sfContext::getInstance();
                $user = $tmp->getUser();
                $user->setAuthenticated(true);
                $user->addCredentials('admin');
                $user->setCulture('zh-cn');
                if (!AdminUserPeer::hasAdminModuleAccess()) {
                    header('Location: /admin.php');
                    exit;
                }
            } else {
                header('Location: /admin.php/landing/login');
                exit;
            }
        }

        // Execute next filter
        $filterChain->execute();
    }

    private function accessWithoutLogin() {
        $result = false;

        $module = $this->getContext()->getModuleName();
        $action = $this->getContext()->getActionName();
        $ignores = array(
            array(
                'module' => 'landing',
                'action' => 'login',
            ),
            array(
                'module' => 'landing',
                'action' => 'logout',
            ),
            array(
                'module' => 'sfCaptchaGD',
                'action' => 'GetImage',
            )
        );

        foreach ($ignores as $ignore) {
            if ($ignore['module'] == $module && $ignore['action'] == $action) {
                $result = true;
            }
        }

        return $result;
    }

}
