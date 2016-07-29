<?php

class eAction extends sfAction {

    public function execute($request) {
        $this->setLayout(false);
        
        //Export the output in Excel 
        $this->getResponse()->setContentType('application/msexcel');
        $c = $this->buildCriteria();
        $this->logs = LogPeer::doSelect($c);
    }
    
    private function buildCriteria() {
        $c = new Criteria();
        $c->add(LogPeer::LOG_EVENT_ID, LogEventPeer::$admin_user_login_log_event_ids, Criteria::IN);
        $c->addDescendingOrderByColumn(LogPeer::ID);
        
        $filters = $this->getUser()->getAttribute('report_admin_user_login_list.filters', array(), 'admin_module');

        if (isset($filters['log_event_id']) && $filters['log_event_id']) {
            $c->add(LogPeer::LOG_EVENT_ID, $filters['log_event_id']);
        }

        if (isset($filters['admin_user_id']) && $filters['admin_user_id']) {
            $c->add(LogPeer::OBJECT_ID, $filters['admin_user_id']);
        }
        
        $crit = array();
        if (isset($filters['datefrom']) && $filters['datefrom']) {
            $date_from = strtotime($filters['datefrom'] . ' 00:00:00');
            $crit[] = $c->getNewCriterion(LogPeer::CREATED_AT, $date_from, Criteria::GREATER_EQUAL);
        }

        if (isset($filters['dateto']) && $filters['dateto']) {
            $date_to = strtotime($filters['dateto'] . ' 23:59:59');
            $crit[] = $c->getNewCriterion(LogPeer::CREATED_AT, $date_to, Criteria::LESS_EQUAL);
        }
        if (count($crit) > 0) {
            if (isset($crit[1])) {
                $crit[0]->addAnd($crit[1]);
            }
            $c->add($crit[0]);
        }
        
        $c->setDistinct();
        return $c;
    }

}

?>