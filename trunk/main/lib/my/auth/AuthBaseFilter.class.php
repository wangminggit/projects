<?php

class AuthBaseFilter extends sfFilter {

    /**
     * Execute filter
     *
     * @param sfFilterChain $filterChain
     */
    public function execute($filterChain) {
        // Execute this filter only once
        if ($this->isFirstCall()) {
            // if session is started, try clean session   
            if(session_id()){
                ShareSessionHelper::sessionCleanerTry();
            }
        }

        // Execute next filter
        $filterChain->execute();
    }

}