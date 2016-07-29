<?php

/**
 * Skeleton subclass for performing query and update operations on the 'log' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class LogPeer extends BaseLogPeer {

    public static function isEnableCaptcha($limit = 3) {
        $result = false;
        $ip = sfContext::getInstance()->getRequest()->getHttpHeader('addr', 'remote');

        // 同IP 如果最新一次登录是成功的，则不启用验证码。如果最新三次登录都失败，则启用验证码
        $start_time = strtotime(date("Y-m-d", time()) . "00:00:00");
        $end_time = strtotime(date("Y-m-d", time()) . "23:59:59");

        $c = new Criteria();
        $c->add(LogPeer::IP, $ip);
        $c->add(LogPeer::LOG_EVENT_ID, LogEventPeer::$admin_user_login_log_event_ids, Criteria::IN);      #$admin_user_login_log_event_ids  后台登录成功，失败，注销成功的log_event事件
        $c_1 = $c->getNewCriterion(LogPeer::CREATED_AT, $start_time, Criteria::GREATER_EQUAL);
        $c_2 = $c->getNewCriterion(LogPeer::CREATED_AT, $end_time, Criteria::LESS_THAN);
        $c_1->addAnd($c_2);
        $c->addAnd($c_1);
        $c->addDescendingOrderByColumn(LogPeer::ID);
        $c->setLimit($limit);
        $logs = LogPeer::doSelect($c);

        $log_success_total = 0;
        foreach ($logs as $log) {
            if ($log->getLogEventId() == 1) {
                $log_success_total++;
            }
        }
        
        if($log_success_total == 0 && count($logs) == $limit){
            $result = true;
        }

        return $result;
    }

    /**
     * 写log的主入口函数
     * 
     * @param LogEvent $log_event
     * @param string $description
     * @param type $object
     * @param type $parameters
     */
    public static function log($log_event, $description, $object, $parameters = "") {
        // for avoid duplicate log
        static $last_log_fingerprint;

        // if is from cmd script, for example oneoff, don't log it
        $module = sfContext::getInstance()->getModuleName();
        if (empty($module)) {
            return;
        }

        // $log_event can be log event object(old format) or log event id(new format)
        // test & convert to log event object if needed
        if (is_numeric($log_event)) {
            $log_event = LogEventPeer::retrieveByPK($log_event);
        }

        // create log object
        $log = new Log();
        $log->setLogEvent($log_event);
        $log->setApp(AppPeer::getByCurrentSfApp());
        $log->setDescription($description);
        $log->setParameters($parameters);
        $log->setIp(UtilsNet::fetch_alt_ip());
        $log->setAdminUser(Theuser::getCurrentAdminUser());

        // related object
        if ($object && Utils::isObjectFunction($object, 'getPrimaryKey')) {
            $log->setObjectId($object->getPrimaryKey());
        }

        // avoid duplicate log, ignore this log if same as last log
        $log_fingerprint = md5(serialize($log->toArray()));
        if ($last_log_fingerprint !== $log_fingerprint) {
            $log->save();
            $last_log_fingerprint = $log_fingerprint;
        }

        return $log;
    }

    /**
     * 后台用户登录成功日志
     * 
     * @param type $tmp_admin_user
     */
    public static function log1($tmp_admin_user) {
        $description = '登录成功, 登录名/员工编号 [' . $tmp_admin_user->getUsername() . '], 姓名 [' . $tmp_admin_user->getName() . ']';
        $log = LogPeer::log(1, $description, $tmp_admin_user);
        $log->save();
    }

    /**
     * 后台用户登录失败日志
     * 
     * @param type $username
     */
    public static function log2($username = '未知') {
        $description = "后台用户登录失败，登录名：" . $username;
        $log = LogPeer::log(2, $description, null);
        $log->save();
    }

    /**
     * 后台用户注销成功日志
     * 
     * @param type $tmp_admin_user
     */
    public static function log3($tmp_admin_user) {
        $description = '注销成功, 登录名/员工编号 [' . $tmp_admin_user->getUsername() . '], 姓名 [' . $tmp_admin_user->getName() . ']';
        $log = LogPeer::log(3, $description, $tmp_admin_user);
        $log->save();
    }

}

// LogPeer
