<?php

class ImportUserPoint {

    private $result = null;
    private $result_comment = '';
    private $data;
    private $user;
    public static $data_header = array(
        1 => 'investor_number',
        2 => 'description',
        3 => 'change_value',
    );

    public function load($data) {
        // to array
        $data = unserialize($data);

        // check raw data from db
        $this->preCheckData($data);
        if ($this->hasError()) {
            return false;
        }

        // assign header
        $data = array_combine(self::$data_header, $data);

        // clean up
        $this->data = $this->tidyData($data);
    }

    public function run() {
        MyDB::connectdb();
        if ($this->hasError()) {
            return false;
        }

        $this->checkUser();
        if ($this->hasError()) {
            return false;
        }

        $this->checkValue();
        if ($this->hasError()) {
            return false;
        }

        $this->importData();
    }

    public function getResult() {
        return $this->result;
    }

    public function getResultComment() {
        return $this->result_comment;
    }

    private function hasError() {
        return ($this->result == UserPointImportRowPeer::RESULT_ERROR);
    }

    private function preCheckData($data) {
        if (count($data) != count(self::$data_header)) {
            $this->result = UserPointImportRowPeer::RESULT_ERROR;
            $this->result_comment = '数据列数量错误, 需要[' . count(self::$data_header) . '] 找到[' . count($data) . ']';
        }
    }

    private function checkUser() {
        $investor_number = $this->data['investor_number'];

        $c = new Criteria();
        $c->add(UserPeer::INVESTOR_NUMBER, $investor_number);
        $this->user = UserPeer::doSelectOne($c);
        // 检查资产帐号是否存在
        if (!is_object($this->user)) {
            $this->result = UserPointImportRowPeer::RESULT_ERROR;
            $this->result_comment = '资产帐号 [' . $investor_number . '] 不存在';
        }
        // 检查资产帐号是否已经初始化商城积分
        if (is_object($this->user)) {
            if ($this->user->getHasPointInit() != 1) {
                $this->result = UserPointImportRowPeer::RESULT_ERROR;
                $this->result_comment = '资产帐号 [' . $investor_number . '] 未初始化商城积分';
            } else {
                $data = ApiCaller::call_7($this->user->getInvestorNumber());
                if (count($data) === 0) {
                    $this->result = UserPointImportRowPeer::RESULT_ERROR;
                    $this->result_comment = '资产帐号 [' . $investor_number . '] 未初始化商城积分';
                }
            }
        }
        if ($this->hasError()) {
            return false;
        }
    }

    private function checkValue() {
        $data = $this->data['change_value'];

        if (!is_numeric($data)) {
            $this->result = UserPointImportRowPeer::RESULT_ERROR;
            $this->result_comment = '本次变更积分 [' . $data . '] 需为数字';
            return false;
        }
    }

    /**
     * Trim key value, and lowercase key
     *
     */
    private static function tidyData($data) {
        $keys = array_keys($data);
        $values = array_values($data);

        foreach ($keys as &$key) {
            $key = trim($key);
        }

        foreach ($values as &$value) {
            $value = trim($value);
        }

        $data = array_combine($keys, $values);

        return $data;
    }

    private function importData() {
        if ($this->hasError()) {
            return false;
        }

        // process
        $this->UpdateUserPointTransactionItem();
        if ($this->hasError()) {
            return false;
        }

        $this->result = UserPointImportRowPeer::RESULT_SUCCESS;
    }

    private function UpdateUserPointTransactionItem() {
        // 调用API更新对应资产帐号积分
        ApiCaller::call_8($this->data['investor_number'], ApiCaller::CALL_8_ORDER_TYPE_RWD, $this->data['change_value'], $this->data['description'], $this->data['change_value']);
    }

}
