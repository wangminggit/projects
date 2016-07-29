<?php

class ajaxgetnewpasswordAction extends sfAction {

    public function execute($request) {
        if ($request->isMethod(sfRequest::POST)) {
            // 密码字符集，可任意添加你需要的字符
            $chars_1_num = rand(1, 5);
            $chars_2_num = rand(1, (8 - $chars_1_num - 2));
            $chars_3_num = rand(1, (8 - $chars_1_num - $chars_2_num - 1));
            $chars_4_num = 8 - $chars_1_num - $chars_2_num - $chars_3_num;
            
            $chars_1 = 'abcdefghijklmnopqrstuvwxyz';
            $chars_2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $chars_3 = '0123456789';
            $chars_4 = '@#$%&';

            $chars = array();
            
            for ($i = 0; $i < $chars_1_num; $i++) {
                array_push($chars, $chars_1[mt_rand(0, strlen($chars_1) - 1)]);
            }
            for ($j = 0; $j < $chars_2_num; $j++) {
                array_push($chars, $chars_2[mt_rand(0, strlen($chars_2) - 1)]);
            }
            for ($f = 0; $f < $chars_3_num; $f++) {
                array_push($chars, $chars_3[mt_rand(0, strlen($chars_3) - 1)]);
            }
            for ($g = 0; $g < $chars_4_num; $g++) {
                array_push($chars, $chars_4[mt_rand(0, strlen($chars_4) - 1)]);
            }
            
            shuffle($chars);
            $this->new_password = "";
            
            foreach($chars as $char){
                $this->new_password .= $char;
            }
        }
    }

}

?>
