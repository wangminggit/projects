<?php

class oneoffupdateadminuserdataTask extends sfBaseTask {

    protected function configure() {
        $this->addOptions(array(
            new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
            new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
                // add your own options here
        ));

        $this->namespace = 'oneoff';
        $this->name = 'update-admin-user-data';
        $this->briefDescription = '';
        $this->detailedDescription = <<<EOF
  [php symfony oneoff:update-admin-user-data|INFO]
EOF;
    }

    protected function execute($arguments = array(), $options = array()) {
        // initialize the database connection
        $databaseManager = new sfDatabaseManager($this->configuration);
        $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

        sfContext::createInstance(sfProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true));

        // add your code here
        set_time_limit(0);
        
        // 设置要导入的excel文件路径
        $file_path = 'C:\projects\s.gtjaqh.member\trunk\main\web\admin_user_data.xlsx';
        
        if(is_file($file_path)){
            $objPHPExcel = PHPExcel_IOFactory::load($file_path);
            $curSheet =$objPHPExcel->getActiveSheet();
            $sheetData = $curSheet->toArray(null,false,false,false);
            
            foreach($sheetData as $_sheetData){
                $this->data[] = $_sheetData;
            }
        }
        
        // 根据excel更新admin_user数据
        if(isset($this->data) && is_array($this->data) && count($this->data) > 0){
            
        }
        
        echo "\r\nDone";
    }

}
