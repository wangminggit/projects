<?php

class oneoffdatamigrationTask extends sfBaseTask {

    protected function configure() {
        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
                // add your own options here
        ));

        $this->namespace = 'oneoff';
        $this->name = 'data-migration';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
  [php symfony oneoff:data-migration|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

        sfContext::createInstance(sfProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true));

        // diable propel cache
        Propel::disableInstancePooling();

        // add your code here
        set_time_limit(0);
        $start_time = time();
        MyDB::connectdb();

        echo "\r\n===== trade goods =====\r\n";
        system('symfony api:reader-tradegoods');

        $legacy_tables = array(
            1 => 'gtqh_buss_dapt',
            2 => 'gtqh_sys_users', // 后台用户
            9 => 'jh_apply_member', // 会员申请
//                  'jh_apply_member_failed', // 会员申请批量导入失败记录 不用管 
//                  'jh_buss_dept',  // 不用管 
            10 => 'jh_cust_product', // 产品基类
            4 => 'jh_customer', // 用户
            3 => 'jh_customermanager', // 客户经理
//                  'jh_empl_mesg', // 员工短信订阅, 不用管
            6 => 'jh_emplo_keywords', // 后台用户关键词记忆
//                  'jh_goldidea_letter', // 不用管
            11 => 'jh_infor_report', // 产品实体 研报
            8 => 'jh_keywd_sub', // 用户关键词订阅
            5 => 'jh_keywords', // 关键词
            12 => 'jh_latent_customer', // 潜在客户
            17 => 'jh_login_record', // 登陆日志
            7 => 'jh_opinion_feedback',
            13 => 'jh_pro_detail', // 产品订阅
//                  'jh_pro_grade', // 产品评分, 不用管
            14 => 'jh_pro_unsub', // 产品退订
//            15 => 'jh_product_smslog', // 产品实体 短信记录
//            16 => 'jh_timer_smslog', // 产品定时短信
//                  'jh_user_encrypt',  // 不用管 
        );
        ksort($legacy_tables);
        foreach ($legacy_tables as $legacy_table) {
            echo "\n===== $legacy_table =====\n";
            eval('$this->do_' . $legacy_table . '();');
        }

        // 非登陆日志全部删除，以排除hook误加入的log
        echo "\n===== delete junk log =====\n";
        $c = new Criteria();
        $c->add(LogPeer::LOG_EVENT_ID, 2, Criteria::NOT_EQUAL);
        $os = LogPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        // 重建部门权限表
        echo "\r\n===== system:adminitemdepartmenttypeaccess-reset =====\r\n";
        system('symfony system:adminitemdepartmenttypeaccess-reset');

        echo "\nDone. Time consuming: " . (time() - $start_time) . "sec\n";
    }

    private function resetAutoIncrement($table) {
        mysql_query('ALTER TABLE `' . $table . '` ENGINE=InnoDB, AUTO_INCREMENT=1');
    }

    private function do_jh_login_record() {
        // delete
        $c = new Criteria();
        $os = LogPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(LogPeer::TABLE_NAME);

        // create
        $log_event = LogEventPeer::retrieveByPK(2);

        $c = new Criteria();
        $c->add(LegacyJhLoginRecordPeer::EXPLAIN, '用户登录');
        $c->add(LegacyJhLoginRecordPeer::STATE, 1);
        $stmt = LegacyJhLoginRecordPeer::doSelectStmt($c);
        $cls = LegacyJhLoginRecordPeer::getOMClass(false);
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $o = new $cls();
            $o->hydrate($row);

            $user = UserPeer::retrieveByInvestorNumber($o->getLoginid());

            /* @var $o LegacyJhLoginRecord */
            $log = new Log();
            $log->setLogEvent($log_event);
            $log->setApp(AppPeer::retrieveBySfApp('user'));
            $log->setDescription('用户登录成功');
            $log->setIp($o->getIp());
            if ($user) {
                $log->setObjectId($user->getId());
                $log->setUser($user);
            }
            $log->setCreatedAt(self::myStrtotime($o->getLogintime()));
            $log->save();
            echo '.';
            flush();
        }
    }

    private function do_jh_timer_smslog() {
        // create
        $c = new Criteria();
        $stmt = LegacyJhTimerSmslogPeer::doSelectStmt($c);
        $cls = LegacyJhTimerSmslogPeer::getOMClass(false);
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $o = new $cls();
            $o->hydrate($row);
            $mapping = array(
                'ID' => '',
                'PRO_ID' => '',
                'EMPLEEYID' => '',
                'DEPT_NO' => '',
                'CONTENT' => '',
                'SENDTIME' => '',
                'STATE' => '',
                'ADDTIME' => '',
                'TYPE' => '',
            );

            /* @var $o LegacyJhProductSmslog */
            $c = new Criteria();
            $c->add(LegacyJhProductSmslogPeer::PRO_ID, $o->getProId());
            $c->add(LegacyJhProductSmslogPeer::LOGINID, $o->getEmpleeyid());
            $c->add(LegacyJhProductSmslogPeer::OPEN_DEPT, $o->getDeptNo());
            $c->add(LegacyJhProductSmslogPeer::EXPLAIN, $o->getContent());
            $c->add(LegacyJhProductSmslogPeer::ADDTIME, $o->getSendtime(), Criteria::GREATER_EQUAL);
            $legacy_jh_product_sms_log = LegacyJhProductSmslogPeer::doSelectOne($c);

            if ($legacy_jh_product_sms_log) {
                $product_instance_sms = ProductInstanceSmsPeer::retrieveByLegacyId($legacy_jh_product_sms_log->getId());
            } else {
                echo("\n" . 'misisng matched LegacyJhProductSmslogPeer LegacyJhTimerSmslog, id:' . $o->getId() . "\n");
            }

            // 如果是定时的
            if ($product_instance_sms) {
                if (!is_null(self::myStrtotime($o->getSendtime()))) {
                    $product_instance_sms->setScheduleAt(self::myStrtotime($o->getSendtime()));
                }

                if (!is_null(self::myStrtotime($o->getAddtime()))) {
                    $product_instance_sms->setCreatedAt(self::myStrtotime($o->getAddtime()));
                }

                // 如果没有发出去
                if ($o->getState() != 2) {
                    $product_instance_sms->setSendAt(null);
                }
                $product_instance_sms->save();
            }

            echo '.';
            flush();
        }

        // 修复update_at
        foreach (ProductInstanceSmsPeer::doSelect(new Criteria()) as $product_instance_sms) {
            $updated_at_pool = array();
            $updated_at_pool[] = $product_instance_sms->getCreatedAt();
            $updated_at_pool[] = $product_instance_sms->getSendAt();
            rsort($updated_at_pool);
            $product_instance_sms->setUpdatedAt($updated_at_pool[0]);
            $product_instance_sms->save();
            echo '.';
            flush();
        }
    }

    private function do_jh_product_smslog() {
        // delete
        $c = new Criteria();
        $os = ProductInstanceSmsPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(ProductInstanceSmsPeer::TABLE_NAME);
        $this->resetAutoIncrement(ProductInstanceSmsMobilePeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $stmt = LegacyJhProductSmslogPeer::doSelectStmt($c);
        $cls = LegacyJhProductSmslogPeer::getOMClass(false);
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $o = new $cls();
            $o->hydrate($row);
            $mapping = array(
                'ID' => 'legacy_id',
//            'PRO_ID' => '',
//            'LOGINID' => '',
                'IP' => 'source_ip',
//            'MOBILE' => 'mobile',
//            'PRO_TYPE' => '',
//            'PRO_NAME' => '',
//                'EXPLAIN' => '',
//            'OPEN_DEPT' => '',
//            'ADDTIME' => '',
                'MESSAGEID' => 'message_id',
//            'STATE' => '',
            );

            /* @var $o LegacyJhProductSmslog */
            $n = new ProductInstanceSms();
            foreach ($mapping as $k => $v) {
                eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
            }
            if ($o->getMobile()) {
                $product = ProductPeer::retrieveByLegacyId($o->getProId());
                $admin_user = AdminUserPeer::retrieveByUsername($o->getLoginid());
                $n->setProduct($product);
                $n->setDepartmentRelatedByDepartmentId($product->getDepartmentRelatedByDepartmentId());
                $n->setAdminUser($admin_user);
                $admin_user_department = $admin_user->getDepartment();
                $n->setDepartmentRelatedByCreatedByDepartmentId($admin_user_department);
                $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
                $n->setSendAt(self::myStrtotime($o->getAddtime()));
                $n->setBody(trim($o->getExplain()));
                $n->setStatus(ProductInstanceSmsPeer::STATUS_SEND);

                if ($o->getIp() == '定时短信') {
                    $n->setSourceIp(null);
                    $n->setIsScheduled(1);
                }

                // 如果找到老的记录则不新建
                $o_exsting = $this->do_jh_product_smslog_try_get_old($n);
                $n = $o_exsting ? $o_exsting : $n;

                $updated_at_pool = array();
                $updated_at_pool[] = $n->getCreatedAt();
                $updated_at_pool[] = $n->getSendAt();
                rsort($updated_at_pool);
                $n->setUpdatedAt($updated_at_pool[0]);

                $n->save();

                $n->saveToMobileJson($o->getMobile());
            }

            echo '.';
            flush();
        }
    }

    private function do_jh_product_smslog_try_get_old($n) {
        /* @var $n ProductInstanceSms　 */
        $c = new Criteria();

        $c->add(ProductInstanceSmsPeer::SOURCE_IP, $n->getSourceIp());
        $c->add(ProductInstanceSmsPeer::BODY, $n->getBody());
        $c->add(ProductInstanceSmsPeer::MESSAGE_ID, $n->getMessageId());
        $c->add(ProductInstanceSmsPeer::PRODUCT_ID, $n->getProductId());
        $c->add(ProductInstanceSmsPeer::CREATED_BY_DEPARTMENT_ID, $n->getCreatedByDepartmentId());
        $c->add(ProductInstanceSmsPeer::CREATED_BY_ADMIN_USER_ID, $n->getCreatedByAdminUserId());
        $c->addDescendingOrderByColumn(ProductInstanceSmsPeer::ID);
        $c1 = $c->getNewCriterion(ProductInstanceSmsPeer::CREATED_AT, $n->getCreatedAt() - 600, Criteria::GREATER_EQUAL);
        $c2 = $c->getNewCriterion(ProductInstanceSmsPeer::CREATED_AT, $n->getCreatedAt(), Criteria::LESS_EQUAL);
        $c1->addAnd($c2);

        $c->add($c1);

        return ProductInstanceSmsPeer::doSelectOne($c);
    }

    private function do_jh_pro_unsub() {
        // delete
        $c = new Criteria();
        $c->add(ProductUserSubscriptionPeer::IS_UNSUBSCRIPTION, 1);
        $os = ProductUserSubscriptionPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        // create
        $c = new Criteria();
        $c->add(LegacyJhProUnsubPeer::STYPE, 1); // 只选择已经生效的
        $os = LegacyJhProUnsubPeer::doSelect($c);

        $mapping = array(
            'ID' => 'legacy_id',
//            'PRO_ID' => '',
//            'INVESTORID' => '',
//            'STYPE' => '',
//            'UNSU_TYPE' => '',
//            'ADDTIME' => '',
//            'EMPLEEYID' => '',
        );

        /* @var $o LegacyJhCustProduct */
        foreach ($os as $o) {
            $n = new ProductUserSubscription();
            foreach ($mapping as $k => $v) {
                eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
            }

            if (UserPeer::retrieveByInvestorNumber($o->getInvestorid())) {
                $product = ProductPeer::retrieveByLegacyId($o->getProId());
                $user = UserPeer::retrieveByInvestorNumber($o->getInvestorid());
                if ($product && $user) {
                    $n->setProduct($product);
                    $n->setDepartmentId($user->getDepartmentId());
                    $n->setUserRelatedByUserId(UserPeer::retrieveByInvestorNumber($o->getInvestorid()));
                    $n->setAdminUserRelatedByUnsubscribedByAdminUserId(AdminUserPeer::retrieveByUsername($o->getEmpleeyid()));
                    $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
                    $n->setIsUnsubscription(1);
                    $n->setUnsubscribeAt($n->getCreatedAt());
                    $n->setLegacyTable('jh_pro_unsub');
                    $n->save();
                }
            }

            echo '.';
            flush();
        }
    }

    private function do_jh_pro_detail() {
        // delete
        $c = new Criteria();
        $c->add(ProductUserSubscriptionPeer::IS_UNSUBSCRIPTION, null, Criteria::ISNULL);
        $os = ProductUserSubscriptionPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(ProductUserSubscriptionPeer::TABLE_NAME);


        // create
        $c = new Criteria();
        $c->add(LegacyJhProDetailPeer::ISNO, 1); // 只选择已经生效的
        $os = LegacyJhProDetailPeer::doSelect($c);

        $mapping = array(
            'ID' => 'legacy_id',
//            'PRO_ID'=>'',
//            'INVESTORID'=>'',
//            'ISNO'=>'',
//            'UNSU_TYPE'=>'',
//            'EMPLEEYID'=>'',
//            'ADDTIME'=>'',
//            'AUDITTIME'=>'',
//            'CONFIRMOR'=>'',
//            'CONFIRMTIM'=>'',
        );

        $conn = Propel::getConnection(ProductUserSubscriptionPeer::DATABASE_NAME);
        $conn->beginTransaction();
        try {
            /* @var $o LegacyJhCustProduct */
            foreach ($os as $o) {
                $n = new ProductUserSubscription();
                foreach ($mapping as $k => $v) {
                    eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
                }
                $product = ProductPeer::retrieveByLegacyId($o->getProId());
                $user = UserPeer::retrieveByInvestorNumber($o->getInvestorid());
                if ($product && $user) {
                    $n->setUserRelatedByUserId($user);
                    $n->setAdminUserRelatedByCreatedByAdminUserId(AdminUserPeer::retrieveByUsername($o->getEmpleeyid()));
                    $n->setProduct($product);
                    $n->setDepartmentId($user->getDepartmentId());
                    $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
                    $n->setLegacyTable('jh_pro_detail');
                    $n->save();
                }
                echo '.';
                flush();
            }

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            throw $e;
        }

        // 如果产品实体是 默认订阅，默认订阅（不可退订） 而用户又没有退订记录，则帮他订阅
        $this->do_jh_pro_detail_fix();
    }

    private function do_jh_pro_detail_fix() {
        $c = new Criteria();
        $products = ProductPeer::doSelect($c);


        /* @var $product Product */
        foreach ($products as $product) {
            switch ($product->getProductSubscriptionRuleId()) {
                case ProductSubscriptionRulePeer::RULE_SUBSCRIPTION_CANNOT_UNSUBSCRIBE:
                case ProductSubscriptionRulePeer::RULE_SUBSCRIPTION_CAN_UNSUBSCRIBE:
                    // 软件类产品不可订阅
                    if (!in_array($product->getProductTypeId(), array(ProductTypePeer::TYPE_SOFTWARE))) {
                        $this->do_jh_pro_detail_fix_sub($product);
                    }
                    break;
            }
        }
    }

    private function do_jh_pro_detail_fix_sub($product) {
        $users = UserPeer::doSelect(new Criteria());

        $conn = Propel::getConnection(ProductUserSubscriptionPeer::DATABASE_NAME);
        $conn->beginTransaction();
        try {
            foreach ($users as $user) {
                /* @var $product Product */
                /* @var $user User */
                // 查询退订
                $c = new Criteria();
                $c->add(LegacyJhProUnsubPeer::PRO_ID, $product->getLegacyId());
                $c->add(LegacyJhProUnsubPeer::STYPE, 1);
                $c->add(LegacyJhProUnsubPeer::INVESTORID, $user->getInvestorNumber());
                $number_of_unsub = LegacyJhProUnsubPeer::doCount($c);

                if ($number_of_unsub > 0) {
                    // 如果有退订，不用补 nothing
                } else {
                    // 如果没有退订过，则要补订
                    // 如果订阅过 不过补
                    $c = new Criteria();
                    $c->add(ProductUserSubscriptionPeer::USER_ID, $user->getId());
                    $c->add(ProductUserSubscriptionPeer::PRODUCT_ID, $product->getId());
                    $c->add(ProductUserSubscriptionPeer::EXPIRED_AT, null, Criteria::ISNULL);
                    if (ProductUserSubscriptionPeer::doCount($c) == 0) {
                        // 如果没有订阅过 则要补
                        $n = new ProductUserSubscription();
                        $n->setUserRelatedByUserId($user);
                        $n->setDepartmentId($user->getDepartmentId());
                        $n->setProduct($product);
                        $n->setLegacyIsFix(1);
                        $n->save();
                    }
                }
                echo '.';
                flush();
            }
            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            throw $e;
        }
    }

    private function do_jh_latent_customer() {
        // delete
        $c = new Criteria();
        $os = ProductVisitorSubscriptionPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(ProductVisitorSubscriptionPeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $os = LegacyJhLatentCustomerPeer::doSelect($c);

        $mapping = array(
            'ID' => 'legacy_id',
            'MOBILE' => 'mobile',
//            'PROID'=>'',
//            'UNSU_TYPE'=>'',
//            'MANAGERNO'=>'',
//            'DEPT_NO'=>'',
//            'ADDTIME'=>'',
        );

        /* @var $o LegacyJhCustProduct */
        foreach ($os as $o) {
            $n = new ProductVisitorSubscription();
            foreach ($mapping as $k => $v) {
                eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
            }
            $n->setAdminUserRelatedByCreatedByAdminUserId(AdminUserPeer::retrieveByUsername($o->getManagerno()));
            $n->setProduct(ProductPeer::retrieveByLegacyId($o->getProId()));
            $n->setDepartment(DepartmentPeer::retrieveByLegacyId($o->getDeptNo()));

            $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
            $n->setUpdatedAt(($n->getCreatedAt()));

            // 超管创建永久有效，给非超管数据设立有效期
            if ($o->getUnsuType() != 4) {
                $n->setExpiredAt($n->getCreatedAt() + 3600 * 24 * 31);
            }

            $n->save();
            echo '.';
            flush();
        }
    }

    private function do_jh_infor_report() {
        // delete
        $c = new Criteria();
        $os = ProductInstanceReportPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(ProductInstanceReportPeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $os = LegacyJhInforReportPeer::doSelect($c);

        $mapping = array(
            'ID' => 'legacy_id',
//            'PRO_ID' => '',
            'IR_NAME' => 'title',
//            'IR_AUTHOR' => '',
//            'RANKING' => '', // 等级，重复了，忽略
//            'IR_TYPE' => '', // 忽略
            'IR_PTNAME' => 'legacy_attachment',
//            'ISNO' => '', // 是否显示 忽略
//            'STARTTIME' => '', // 忽略
//            'ENDTIME' => '', // 忽略
//            'ADDTIME' => '',
//            'KEY_WORD' => '', // 关键词
//            'SYS_DEPT' => '', // 部门
        );

        /* @var $o LegacyJhCustProduct */
        foreach ($os as $o) {
            $n = new ProductInstanceReport();
            foreach ($mapping as $k => $v) {
                eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
            }
            $product = ProductPeer::retrieveByLegacyId($o->getProId());
            $n->setProduct($product);
            $n->setDepartmentRelatedByDepartmentId($product->getDepartmentRelatedByDepartmentId());
            $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
            $n->save();

            // keywords - get from product instance
            $o_keywords = $o->getKeyWord();
            if (!is_null($o_keywords)) {
                $this->do_jh_infor_report_keyword($o_keywords, $n);
            } else {
                // keywords - get from product instance
                $o_product = LegacyJhCustProductPeer::retrieveByProId($o->getProId());
                if ($o_product) {
                    $this->do_jh_infor_report_keyword($o_product->getKeyWord(), $n);
                }
                flush();
            }
            echo '.';
            flush();
        }
    }

    private function do_jh_infor_report_keyword($keywords, $product_instance_report) {
        $parts = explode(',', $keywords);
        foreach ($parts as $part) {
            if (trim($part) != '') {
                $keyword = KeywordPeer::tryGetAndCreate(trim($part));
                ProductInstanceReportKeywordXrefPeer::tryGetAndCreate($keyword, $product_instance_report);
            }
        }
    }

    private function do_jh_cust_product() {
        // delete
        $c = new Criteria();
        $os = ProductPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(ProductPeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $os = LegacyJhCustProductPeer::doSelect($c);

        $mapping = array(
//            'ID' => '',  // 产品编号, 老版本自动生成的，新版本无需
            'PRO_ID' => 'legacy_id', // 产品ID
//            'PRO_TYPE' => '', // 产品类型
            'PRO_NAME' => 'name',
//            'PRO_FORM' => '',
//            'PRO_EXPLAIN' => 'description', // 产品说明
//            'MENU1' => '', // 前端区块
//            'DEPTID' => '', // 创建部门
//            'CREAT_DEPT' => '', // 创建部门名称, 忽略, 已经有创建部门了
//            'LEVELS' => '', // 级别
//            'RANKING' => '', // 级别 数字， 忽略，已经有级别了
            'RULES' => 'product_subscription_rule_id',
//            'RULES_NUM' => '', // 有数据，未找到, 忽略
//            'SUBS_TYPE' => '',  // 订阅方式, 只需要管 标准 非标准化 ，但是 type 咨询 已经是非标了,所以忽略
//            'SUCC_TYPE' => '', // 成功方式 忽略
//            'ISNO' => '',   // 是否生效 忽略
//            'STARTTIME' => '', // 忽略
//            'ENTTIME' => '', // 忽略
//            'ADDTIME' => '',
//            'EXPERIENCE' => '', // 是否可体验 忽略
//            'MENUSEQ' => '',  // 排序 忽略
//            'KEY_WORD' => '',  // 产品关键词 忽略，产品基类 不再设置关键词
            'PRO_STATE' => 'status',
//            'PRO_ANNEX' => '',  // 产品附件 只有一条有数据 忽略
//            'PRO_ANNEX_NAME' => '', // 产品附件全路径名  只有一条有数据 忽略
//            'OPEN_TYPE' => '', // 全部公开，有限可见
//            'OPEN_DEPT' => '', // 有限可见部门
//            'RELEASE_NO' => '',  // 产品发布人编号 忽略
//            'PRO_T_SHAPE' => '', // 报告分类 忽略
//            'PRO_DISCOUNT' => '', // 产品折扣 忽略
//            'OUT_ACCOUNT' => '', // 无数据 忽略
//            'PRO_CODE' => '', // 无说明 忽略
        );

        /* @var $o LegacyJhCustProduct */
        foreach ($os as $o) {
            // 只保存新版product type有的类型，按照product type name查询
            if (ProductTypePeer::retrieveByName($o->getProForm())) {
                $n = new Product();
                foreach ($mapping as $k => $v) {
                    eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
                }

                $n->setProductInternalCategory(ProductInternalCategoryPeer::tryGetAndCreate($o->getProType()));
                $n->setProductType(ProductTypePeer::retrieveByName($o->getProForm()));
                $n->setDescription(strip_tags($o->getProExplain()));

                // 如果是软件产品，默认放到第一个分类
                if ($n->getProductTypeId() == ProductTypePeer::TYPE_SOFTWARE) {
                    $n->setProductSoftwareCategoryId(1);
                }

                $o_menu1 = $o->getMenu1();
                $o_menu1 = $o_menu1 == '智能投资工具<br/><font style="font-size: 11px;">（银卡及以上交易系统使用请详询您开户营业部）</font>' ? '智能投资工具' : $o_menu1;
                $product_section = ProductSectionPeer::retrieveByName($o_menu1);
                if (!$product_section) {
                    throw new Exception('不匹配的product section ' . $o_menu1);
                }
                $n->setProductSection($product_section);

                $n->setDepartmentRelatedByDepartmentId(DepartmentPeer::retrieveByLegacyId($o->getDeptid()));
                $n->setUserLevel(UserLevelPeer::retrieveByName($o->getLevels()));

                // 报告产品小分类
                if ($n->getProductTypeId() == ProductTypePeer::TYPE_REPORT) {
                    $n->setProductReportCategoryId(1); // 目前legacy此项无数据，所有归为晨报
                }

                // 有限可见度
                if ($o->getOpenDept() != '') {
                    $n->setIsLimitedVisibility(1);
                }

                // 小状态转到成is online字段
                if (in_array($n->getStatus(), array(1, 5, 6))) {
                    $n->setIsOnline(1);
                }

                $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
                $n->save();

                // 有限可见度 详细部门
                if ($n->getIsLimitedVisibility()) {
                    $parts = explode(',', $o->getOpenDept());
                    foreach ($parts as $part) {
                        $department = DepartmentPeer::retrieveByLegacyId($part);
                        if ($department) {
                            ProductUserVisibilityByDepartmentPeer:: tryGetAndCreate($n, $department);
                        }
                    }
                }

                // 规则默认
                if ($n->getProductSubscriptionRuleId() == ProductSubscriptionRulePeer::RULE_SUBSCRIPTION_TEMPORARY) {
                    $o_pro_code = $o->getProCode();
                    $o_pro_code_parts = explode(',', $o_pro_code);
                    foreach ($o_pro_code_parts as $o_pro_code_part) {
                        if (TradeGoodsPeer::retrieveByCode($o_pro_code_part)) {
                            $n_xref = new ProductTradeGoodsXref();
                            $n_xref->setProduct($n);
                            $n_xref->setTradeGoods(TradeGoodsPeer::retrieveByCode($o_pro_code_part));
                            $n_xref->save();
                        }
                    }
                }
            }
            echo '.';
            flush();
        }
    }

    private function do_jh_apply_member() {
        // delete
        $c = new Criteria();
        $os = UserApplicationPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(UserApplicationPeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $os = LegacyJhApplyMemberPeer::doSelect($c);

        $mapping = array(
            'ID' => 'legacy_id',
            'INVESTORID' => 'investor_number',
            'IDENTITYCARD' => 'customer_identity_card_number',
            'MEMBER_STATUS' => 'member_status',
//            'RESERVE_NAME' => '',
//            'ADDTIME' => '',
            'MOBILE' => 'customer_phone_mobile',
            'APPLYIP' => 'source_ip',
//            'APPLY_NUM' => '',
//            'DEPT_NO' => '',
//            'DEPT_HEAD' => '',
//            'DISTRIBUT_TIME' => '',
//            'MANAGER_NO' => '',
//            'RANKS' => '',
//            'HANDLE_TIME' => '',
            'EXAMINE_STATE' => 'final_audit_status',
//            'EXAMINE_TIME' => '',
//            'EXAMINE_NO' => '',
            'APPLY_TYPE' => 'type',
            'CUST_NAME' => 'customer_name',
            'EMAIL' => 'customer_email',
        );

        foreach ($os as $o) {
            $n = new UserApplication();
            foreach ($mapping as $k => $v) {
                eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
            }
            $n->setUserLevel(UserLevelPeer::retrieveByName($o->getRanks()));

            if (AdminUserPeer::retrieveByUsername($o->getExamineNo())) {
                $n->setFinalAuditByAdminUserId(AdminUserPeer::retrieveByUsername($o->getExamineNo())->getId());
            }

            if (AdminUserPeer::retrieveByUsername($o->getApplyNum())) {
                $admin_user = AdminUserPeer::retrieveByUsername($o->getApplyNum());
                $n->setCreatedByAdminUserId($admin_user->getId());
                $n->setDepartmentRelatedByCreatedByDepartmentId($admin_user->getDepartment());
            }

            $n->setCustomerManager(CustomerManagerPeer::retrieveByManagerNumber($o->getManagerno()));
            $n->setDepartmentRelatedByDepartmentId(DepartmentPeer::retrieveByLegacyId($o->getDeptNo()));
            if (AdminUserPeer::retrieveByUsername($o->getDeptHead())) {
                $n->setDepartmentAuditByAdminUserId(AdminUserPeer::retrieveByUsername($o->getDeptHead())->getId());
            }

            // 修补数据 营业部审核时间
            if (!is_null(self::myStrtotime($o->getDistributTime()))) {
                $n->setDepartmentAuditAt(self::myStrtotime($o->getDistributTime()));
            } else {
                // 如果legacy department处理时间未空，而明明分配过客户经理，我们给deprtment审核补一个时间
                if ($n->getCustomerManager()) {
                    $n->setDepartmentAuditAt(self::myStrtotime($o->getAddtime()));
                }
            }

            // 修补数据 营业部审核状态，如果有客户经理，就认为department审核已通过
            if ($n->getCustomerManager()) {
                $n->setDepartmentAuditStatus(UserApplicationPeer::DEPARTMENT_AUDIT_STATUS_PASS);
            }

            // 修补数据 超管审核时间
            if (!is_null(self::myStrtotime($o->getExamineTime()))) {
                $n->setFinalAuditAt(self::myStrtotime($o->getExamineTime()));
            } else {
                // 如果legacy 超管处理时间未空，而明明已经通过，我们给超管审核补一个时间
                if ($n->getFinalAuditStatus() == UserApplicationPeer::FINAL_AUDIT_STATUS_PASS) {
                    $n->setFinalAuditAt(self::myStrtotime($o->getAddtime()));
                }
            }

            $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
            $n->setLegacyTable('jh_apply_member');

            $updated_at_pool = array();
            $updated_at_pool[] = $n->getDepartmentAuditAt();
            $updated_at_pool[] = $n->getFinalAuditAt();
            $updated_at_pool[] = $n->getCreatedAt();
            rsort($updated_at_pool);
            $n->setUpdatedAt($updated_at_pool[0]);

            // 按照数据 生成营业部审核状态
            if (is_null($n->getDepartmentAuditAt())) {
                $n->setDepartmentAuditStatus(null);
            } else {
                if (is_null($n->getCustomerManagerId())) {
                    $n->setDepartmentAuditStatus(UserApplicationPeer::DEPARTMENT_AUDIT_STATUS_REJECT);
                } else {
                    $n->setDepartmentAuditStatus(UserApplicationPeer::DEPARTMENT_AUDIT_STATUS_PASS);
                }
            }

            // 按照数据，更新总状态
            // 已通过 = 如果超管通过了 
            if ($n->getFinalAuditStatus() == UserApplicationPeer::FINAL_AUDIT_STATUS_PASS) {
                $n->setStatus(UserApplicationPeer::STATUS_PASS);
            }

            // 未通过 = 如果营业部未通过，或者 超管 未通过 
            if ($n->getDepartmentAuditStatus() == UserApplicationPeer::DEPARTMENT_AUDIT_STATUS_REJECT || $n->getFinalAuditStatus() == UserApplicationPeer::FINAL_AUDIT_STATUS_REJECT) {
                $n->setStatus(UserApplicationPeer::STATUS_REJECT);
            }

            // 处理中 = 如果营业部通过了 超管未处理 
            if ($n->getDepartmentAuditStatus() == UserApplicationPeer::DEPARTMENT_AUDIT_STATUS_PASS && $n->getFinalAuditStatus() == UserApplicationPeer::FINAL_AUDIT_STATUS_TODO) {
                $n->setStatus(UserApplicationPeer::STATUS_PROCESSING);
            }

            // 待处理 = 如果2级status都是null,那么这里也是null 
            if ($n->getDepartmentAuditStatus() == UserApplicationPeer::DEPARTMENT_AUDIT_STATUS_TODO && $n->getFinalAuditStatus() == UserApplicationPeer::FINAL_AUDIT_STATUS_TODO) {
                $n->setStatus(UserApplicationPeer::STATUS_TODO);
            }

            // 老数据非1的映射到null (未入会)
            if ($n->getMemberStatus() != 1) {
                $n->setMemberStatus(null);
            }

            $n->save();
            echo '.';
            flush();
        }

        // 关联application和user
        /* @var $user User */
        foreach (UserPeer::doSelect(new Criteria()) as $user) {
            $c = new Criteria();
            $c->add(UserApplicationPeer::INVESTOR_NUMBER, $user->getInvestorNumber());
            $c->add(UserApplicationPeer::STATUS, UserApplicationPeer::STATUS_PASS);
            $c->addDescendingOrderByColumn(UserApplicationPeer::CREATED_AT);
            $matched_application = UserApplicationPeer::doSelectOne($c);
            if ($matched_application) {
                $user->setUserApplication($matched_application);
                $user->save();
            }
        }
    }

    private function do_jh_keywd_sub() {
        // delete
        $c = new Criteria();
        $os = UserKeywordSubscriptionPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(UserKeywordSubscriptionPeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $os = LegacyJhKeywdSubPeer::doSelect($c);

        foreach ($os as $o) {
            if (KeywordPeer::retrieveByLegacyId($o->getKeyId()) && UserPeer::retrieveByInvestorNumber($o->getInvestorid())) {
                $n = new UserKeywordSubscription();
                $n->setKeyword(KeywordPeer::retrieveByLegacyId($o->getKeyId()));
                $n->setUser(UserPeer::retrieveByInvestorNumber($o->getInvestorid()));
                $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
                $n->save();
            }
            echo '.';
            flush();
        }
    }

    private function do_jh_opinion_feedback() {
        // delete
        $c = new Criteria();
        $os = AdminUserFeedbackPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(AdminUserFeedbackPeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $os = LegacyJhOpinionFeedbackPeer::doSelect($c);

        $mapping = array(
//            'ID' => '',
            'TITLE' => 'title',
            'CONTENT' => 'body',
//            'COMMENTER' => '',
            'IP' => 'ip',
//            'REPLY' => '',
//            'REPLYTIME' => '',
//            'STATE' => '',
//            'REPLYTITLE' => '',
            'REPLYCONTENT' => 'reply_body',
//            'ADDTIME' => '',
        );

        foreach ($os as $o) {
            $n = new AdminUserFeedback();
            foreach ($mapping as $k => $v) {
                eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
            }
            $n->setCreatedByAdminUserId(AdminUserPeer::retrieveByUsername($o->getCommenter())->getId());
            $n->setRepliedByAdminUserId(AdminUserPeer::retrieveByUsername($o->getReply())->getId());
            $n->setRepliedByAdminUserAt(self::myStrtotime($o->getReplyTime()));
            $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
            if (self::myStrtotime($o->getReplyTime()) > 0) {
                $n->setUpdatedAt(self::myStrtotime($o->getReplyTime()));
            } else {
                $n->setUpdatedAt(self::myStrtotime($o->getAddtime()));
            }
            $n->save();
            echo '.';
            flush();
        }
    }

    private function do_jh_emplo_keywords() {
        // create
        $c = new Criteria();
        $os = LegacyJhEmploKeywordsPeer::doSelect($c);

        foreach ($os as $o) {
            $parts = explode(',', $o->getKeyword());
            foreach ($parts as $part) {
                $keyword = KeywordPeer::retrieveByName($part);
                if ($keyword) {
                    $n = new AdminUserKeywordXref();
                    $n->setAdminUser(AdminUserPeer::retrieveByUsername($o->getEmploId()));
                    $n->setKeyword($keyword);
                    $n->save();
                }
            }
        }
        echo '.';
        flush();
    }

    private function do_jh_keywords() {
        // delete
        $c = new Criteria();
        $os = KeywordPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(KeywordPeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $os = LegacyJhKeywordsPeer::doSelect($c);

        $mapping = array(
            'ID' => 'legacy_id',
            'KEYWORD' => 'name',
//            'ADDTIME'=>'',
        );

        foreach ($os as $o) {
            $n = new Keyword();
            foreach ($mapping as $k => $v) {
                eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
            }
            $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
            $n->save();
            echo '.';
            flush();
        }
    }

    private function do_gtqh_sys_users() {
        // delete admin user
        $c = new Criteria();
        $os = AdminUserPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(AdminUserPeer::TABLE_NAME);

        // delete admin user group
        $c = new Criteria();
        $os = AdminUserGroupPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(AdminUserGroupPeer::TABLE_NAME);

        // insert admin user group
        $n = new AdminUserGroup();
        $n->setName('默认用户组');
        $n->save();

        // admin_item_admin_user_group_access
        $admin_items = AdminItemPeer::doSelect(new Criteria());
        foreach ($admin_items as $admin_item) {
            $xref = new AdminItemAdminUserGroupAccess();
            $xref->setAdminItem($admin_item);
            $xref->setAdminUserGroup($n);
            $xref->save();
        }

        // insert super admin user
        $n = new AdminUser();
        $n->setUsername('admin');
        $n->setName('超级管理员');
        $n->setEmail('admin@email.local');
        $n->setPassword(md5('password')); // 默认密码 password
        $n->setAdminUserGroup(AdminUserGroupPeer::getDefaultGroup());
        $n->setDepartment(DepartmentPeer::getSuperAdminDepartment());
        $n->save();

        // create
        $c = new Criteria();
        $os = LegacyGtqhSysUsersPeer::doSelect($c);

        $mapping = array(
            'FUID' => 'legacy_id',
//            'EMPLO_ID' => 'employee_number',
            'FU_NAME' => 'name',
//          'FU_DEPTID'=>'',
//          'USER_TYPE'=>'',
            'MOBILE' => 'phone_mobile',
            'EMAIL' => 'email',
//            'ISNO' => '',
//          'REMARK'=>'',
//          'ADDTIME'=>'',
        );

        foreach ($os as $o) {
            if (in_array($o->getUserType(), array(1, 2))) { // 目前只导入 type=1&2 的后台用户
                $n = new AdminUser();
                foreach ($mapping as $k => $v) {
                    eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
                }
                $n->setDepartment(DepartmentPeer::retrieveByLegacyId($o->getFuDeptid()));
                // 按照部门类型获取一个预先建立好的该部门类型的默认admin user group
                if ($n->getDepartment()) {
                    $n->setAdminUserGroup(AdminUserGroupPeer::getDefaultGroup());
                }
                $n->setUsername($o->getEmploId());
                $n->setPassword(self::do_gtqh_sys_users_get_password($n->getUsername()));
                $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
                $n->save();
            }
            echo '.';
            flush();
        }
    }

    private function do_jh_customermanager() {
        // delete
        $c = new Criteria();
        $os = CustomerManagerPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(CustomerManagerPeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $os = LegacyJhCustomermanagerPeer::doSelect($c);

        $mapping = array(
            'MANAGERNAME' => 'name',
            'MANAGERMOBILE' => 'phone',
            'MANAGERNO' => 'manager_number',
//            'MANAGERPHONE' => '',
//            'ADDTIME' => '',
            'EMAIL' => 'email',
//            'ISDEPARTMENT' => '',
//            'EMPLO_ID' => '',
        );

        foreach ($os as $o) {
            $n = new CustomerManager();
            foreach ($mapping as $k => $v) {
                eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
            }
            $n->setDepartment(DepartmentPeer::retrieveByLegacyId($o->GetIsdepartment()));
            $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
            $n->save();
            echo '.';
            flush();
        }
    }

    private function do_jh_customer() {
        // delete
        $c = new Criteria();
        $os = UserPeer::doSelect($c);
        foreach ($os as $o) {
            $o->delete();
        }

        $this->resetAutoIncrement(UserPeer::TABLE_NAME);

        // create
        $c = new Criteria();
        $os = LegacyJhCustomerPeer::doSelect($c);

        $mapping = array(
            'INVESTORID' => 'investor_number', // 资产账号
//            'ISDEPARTMENT' => '',
            'USERNAME' => 'name', // 客户姓名
//            'DAILYEQUITY' => '',
//            'PASSWORD' => 'password', // 初始密码
            'MOBILE' => 'mobile', // 手机号
            'IDENTITYCARD' => 'identity_card_number', // 身份证号码
//            'EVERDEALDORMANT' => 'is_ever_deal_dormant', // 是否休眠
//            'EVERDEALASTOCK' => '',
//            'EVERDEALNATIONALDEBT' => '',
//            'EVERDEALCUPRUM' => '',
//            'EVERDEALDCREW' => '',
//            'EVERDEALBEANS' => '',
//            'MANAGERNO' => '', // 客户经理编号
            'NICKNAME' => 'nickname', // 客户昵称
            'EMAIL' => 'email', // 客户邮箱
//            'RANKS' => '',
//            'EVERDEALINITIATION' => '',
//            'ISSUB' => 'is_subscription', // 是否订阅
//            'BUSSDPETADR' => '',
//            'BUSSDPETATEL' => '',
//            'ADDTIME' => '', // 添加时间
            'RANKING' => 'user_level_id', // 等级说明:1,普通;2,银卡;3,金卡;4,钻卡
//            'DEPT_NO' => '', // 营业部编号*************
//            'CU_TYPE' => '', // 等级状态,1客户升级,2客户经理升级,3客户经理降级,4升级审核成功,5降级审核成功,6审核失败
//            'CU_RANKS' => 'rank', // 操作级别
//            'EXPLAIN' => '', // 内部备注
//            'OLDMOBILE' => '', // 原来手机号码
//            'MOBILESTATE' => '', // 手机号码状态:1未读,2已读
//            'UPDATETIME' => '', // 修改时间
//            'TRADE_PROCODE' => '', // 交易品种
        );

        foreach ($os as $o) {
            $n = new User();
            foreach ($mapping as $k => $v) {
                eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
            }
            $n->setCustomerManager(CustomerManagerPeer::retrieveByManagerNumber($o->getManagerno()));
            $n->setDepartment(DepartmentPeer::retrieveByLegacyId($o->getDeptNo()));
            $n->setPassword(md5($o->getPassword())); //  md5密码 legacy是明文
            $n->setCreatedAt(self::myStrtotime($o->getAddtime()));
            if (self::myStrtotime($o->getUpdatetime()) != 0) {
                $n->setUpdatedAt(self::myStrtotime($o->getUpdatetime()));
            } else {
                $n->setUpdatedAt(self::myStrtotime($o->getAddtime()));
            }
            $n->save();
            echo '.';
            flush();
        }
    }

    private function do_gtqh_buss_dapt() {
        // delete
        $c = new Criteria();
        $c->add(DepartmentPeer::IS_FIXED, null, Criteria::ISNULL);
        DepartmentPeer::doDelete($c);

        // create
        $c = new Criteria();
        $os = LegacyGtqhBussDaptPeer::doSelect($c);

        $mapping = array(
            'DP_ID' => 'legacy_id',
            'DEPT_NAME' => 'legacy_name',
            'DEPT_PHONE' => 'phone_landline',
            'DEPT_ADDRESS' => 'address',
//            'DEPT_TYPE'=>'',  // 3 = 职能， 2 = IB营业部， 1 = 期货营业部
//            'PROVINCE_NAME'=>'',
//            'CITY_NAME'=>'',
//            'DEPT_HEAD_ID'=>'',
            'DEPT_CODE' => 'legacy_code',
            'DEPT_DIRECTOR' => 'director',
            'DEPT_MOBILE' => 'phone_mobile',
            'DEPT_EMAIL' => 'email',
//            'ADDTIME'=>'',
        );

        $dept_types = array(
            3 => 1, // 职能
            2 => 3, // IB营业部
            1 => 4, // 期货营业部
            5 => 7, // 总管理部
        );

        /* @var $o LegacyGtqhBussDapt */
        foreach ($os as $o) {
            if (isset($dept_types[$o->getDeptType()])) {
                $n = new Department();
                foreach ($mapping as $k => $v) {
                    eval('$n->set' . Utils::fieldToPropelFomat($v) . '($o->get' . Utils::fieldToPropelFomat($k) . '());');
                }
                $n->setDepartmentTypeId($dept_types[$o->getDeptType()]);

                $o_province_name = $o->getProvinceName();
                if (isset($o_province_name)) {
                    $n->setProvince(ProvincePeer::tryGetAndCreate($o->getProvinceName()));
                }

                $o_city_name = $o->getCityName();
                if (isset($o_city_name)) {
                    $n->setCity(CityPeer::tryGetAndCreate($o->getCityName(), $n->getProvince()));
                }

                $n->save();

                // 如果是职能部门则用legacy name做name
                if ($n->getDepartmentTypeId() == 1) {
                    $n->setName($n->getLegacyName());
                    $n->save();
                }
            }
            echo '.';
            flush();
        }

        // API
        $api_os = ApiCaller::call_2();

        foreach ($api_os as $api_o) {
            $api_o->depcode;
            $api_o->depname;
            $api_o->depkind;
            $api_o->branchcode;
            $api_o->branchname;

            if ($api_o->depkind == '期货营业部' && !in_array($api_o->branchcode, array('1000', '1001'))) {
                // 期货营业部，无需记录省级
                // API depcode => legacy depcode
                $depart_api_legacy = array(
                    '1007' => '003',
                    '1010' => '004',
                    '8201' => '002',
                    '1003' => '005',
                    '8202' => '006',
                    '1009' => '009',
                    '1011' => '010',
                    '1012' => '007',
                    '8203' => '008',
                    '1015' => '011',
                    '1016' => '012',
                    '1017' => '013',
                );
                if (isset($depart_api_legacy[$api_o->depcode])) {
                    $n = DepartmentPeer::retrieveByLegacyCode($depart_api_legacy[$api_o->depcode]);
                    $n->setCode($api_o->depcode);
                    $n->setName($api_o->depname);
                } else {
                    $n = new Department();
                    $n->setCode($api_o->depcode);
                    $n->setName($api_o->depname);
                    $n->setDepartmentTypeId(4);
                }
                $n->save();
            }

            if ($api_o->depkind == 'IB营业部') {

                $depart_api_legacy = array(
                    '100' => '3104',
                    '101' => '3101',
                    '102' => '1302',
                    '105' => '1104',
                    '111' => '3501',
                    '115' => '8078',
                    '117' => '2102',
                    '118' => '1401',
                    '120' => '2302',
                    '123' => '2203',
                    '124' => '3202',
                    '128' => '3301',
                    '129' => '3401',
                    '130' => '2105',
                    '131' => '1501',
                    '132' => '3305',
                    '135' => '3503',
                    '136' => '3602',
                    '137' => '3604',
                    '138' => '3504',
                    '139' => '3302',
                    '144' => '1205',
                    '145' => '3109',
                    '152' => '8088',
                    '153' => '3103',
                    '156' => '3108',
                    '157' => '3102',
                    '160' => '3203',
                    '161' => '2303',
                    '162' => '1101',
                    '164' => '3106',
                    '165' => '1102',
                    '166' => '8056',
                    '173' => '3601',
                    '175' => '3608',
                    '180' => '2304',
                    '181' => '2301',
                    '182' => '3119',
                    '183' => '8077',
                    '184' => '8079',
                    '185' => '8002',
                    '186' => '8001',
                    '188' => '3308',
                    '190' => '3607',
                    '196' => '3113',
                    '198' => '8028',
                    '200' => '8027',
                    '201' => '8030',
                    '202' => '3609',
                    '203' => '8029',
                    '204' => '2101',
                    '206' => '3505',
                    '210' => '3105',
                    '215' => '3114',
                    '223' => '3402',
                    '224' => '3111',
                    '226' => '8045',
                    '227' => '8052',
                    '228' => '1106',
                    '229' => '1107',
                    '232' => '8055',
                    '235' => '8054',
                    '239' => '2201',
                    '240' => '1105',
                    '243' => '8053',
                    '245' => '3115',
                    '248' => '3306',
                    '249' => '3304',
                    '250' => '3120',
                    '251' => '3307',
                    '252' => '1402',
                    '256' => '8037',
                    '257' => '8036',
                    '258' => '3110',
                    '266' => '8004',
                    '268' => '2204',
                    '270' => '3116',
                    '272' => '3107',
                    '275' => '8065',
                    '276' => '8057',
                    '279' => '8067',
                    '280' => '3309',
                    '103' => '4204',
                    '106' => '5108',
                    '107' => '5201',
                    '108' => '6102',
                    '109' => '3703',
                    '110' => '3704',
                    '112' => '8031',
                    '113' => '4101',
                    '114' => '4501',
                    '116' => '4404',
                    '119' => '5301',
                    '121' => '4402',
                    '122' => '4602',
                    '125' => '8081',
                    '126' => '5101',
                    '127' => '4301',
                    '133' => '4303',
                    '134' => '6201',
                    '140' => '4211',
                    '141' => '5103',
                    '142' => '3702',
                    '143' => '4208',
                    '146' => '4412',
                    '147' => '4408',
                    '148' => '4415',
                    '149' => '4409',
                    '150' => '4409',
                    '151' => '4413',
                    '154' => '5102',
                    '155' => '4304',
                    '158' => '4401',
                    '159' => '4418',
                    '167' => '5110',
                    '168' => '8040',
                    '170' => '4421',
                    '171' => '4419',
                    '172' => '4417',
                    '174' => '8071',
                    '176' => '3705',
                    '178' => '4202',
                    '179' => '4201',
                    '187' => '4405',
                    '189' => '8016',
                    '191' => '3706',
                    '192' => '4414',
                    '193' => '4406',
                    '194' => '6401',
                    '195' => '5107',
                    '199' => '5105',
                    '205' => '8091',
                    '208' => '4302',
                    '209' => '8063',
                    '211' => '8006',
                    '212' => '4103',
                    '213' => '4420',
                    '214' => '8072',
                    '216' => '4410',
                    '217' => '8035',
                    '218' => '8074',
                    '219' => '8068',
                    '220' => '4411',
                    '221' => '8085',
                    '222' => '8073',
                    '225' => '3701',
                    '230' => '8062',
                    '231' => '8005',
                    '233' => '8042',
                    '234' => '8041',
                    '236' => '8012',
                    '237' => '4403',
                    '238' => '4423',
                    '241' => '8044',
                    '242' => '8087',
                    '246' => '4502',
                    '247' => '4422',
                    '253' => '4209',
                    '254' => '8013',
                    '255' => '8043',
                    '259' => '8032',
                    '260' => '8022',
                    '261' => '8023',
                    '262' => '8025',
                    '263' => '8026',
                    '264' => '8015',
                    '265' => '8009',
                    '267' => '8018',
                    '271' => '8049',
                    '273' => '8046',
                    '274' => '8076',
                    '278' => '8084',
                    '149' => '4416',
                    '177' => '8050',
                    '269' => '8003',
                    '277' => '3204',
                );

                $depart_api_legacy = array_flip($depart_api_legacy);

                // 省级IB
                if (isset($api_o->branchcode) && isset($api_o->branchname)) {
                    $p_level = DepartmentPeer::tryGetAndCreate($api_o->branchcode, $api_o->branchname, DepartmentTypePeer::TYPE_IB_SHENG_JI);
                }

                // IB 营业部
                if (isset($depart_api_legacy[$api_o->depcode])) {
                    $n = DepartmentPeer::retrieveByLegacyCode($depart_api_legacy[$api_o->depcode]);
                    $n->setCode($api_o->depcode);
                    $n->setName($api_o->depname);
                    $n->setDepartmentTypeId(3);
                } else {
                    $n = new Department();
                    $n->setCode($api_o->depcode);
                    $n->setName($api_o->depname);
                    $n->setDepartmentTypeId(3);
                }

                // 挂省级object为parent
                $n->setParentId($p_level->getId());

                $n->save();
            }
        }

        // API - set delete mark
        $c = new Criteria();
        $c->add(DepartmentPeer::DEPARTMENT_TYPE_ID, array(DepartmentTypePeer::TYPE_IB_SHENG_JI, DepartmentTypePeer::TYPE_IB_YING_YE, DepartmentTypePeer::TYPE_QI_HUO_YING_YE), Criteria::IN);
        $ns = DepartmentPeer::doSelect($c);
        foreach ($ns as $n) {
            if ($n->getCode() == '') {
                $n->setIsApiDeleted(1);
                $n->save();
            }
        }
    }

    /**
     * 按照用户名获取预设的老密码
     * 
     * @todo  等对方提供密码导出的excel文件
     * 
     * @param type $value
     */
    public static function do_gtqh_sys_users_get_password($username) {
        return md5('password');
    }

    public static function booleanToOurs($value) {
        return $value == 1 ? 1 : null;
    }

    public static function myStrtotime($value) {
        if (!is_null($value)) {
            return strtotime($value);
        } else {
            return null;
        }
    }

}
