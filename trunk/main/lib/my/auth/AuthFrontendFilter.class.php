<?php

class AuthFrontendFilter extends sfFilter {

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
        }

        // Execute next filter
        $filterChain->execute();
    }

}