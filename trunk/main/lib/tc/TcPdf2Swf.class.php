<?php

class TcPdf2Swf{
    
    /**
     * 转换PDF为SWF格式
     * 
     * @param string $pdf_file_path 要转换的PDF完全路径，包含全文件名
     * @param string $swf_file_path 要保存的SWF完全路径，包含全文件名(可选建议留空，如果留空则保存到原PDF路径下，文件名为 pdf文件名.pdf.swf)
     * 
     * @return string
     */
    public static function pdf2swf($pdf_file_path, $swf_file_path=null){
        // 如果找不到源文件则抛出异常
        if(!file_exists($pdf_file_path)){
            throw new Exception('pdf_file_path not found on'.$pdf_file_path);
        }
        
        // 路径
        $pdf_file_name = basename($pdf_file_path);
        $pdf_file_base_path = dirname($pdf_file_path);
        if(is_null($swf_file_path)){
            $swf_file_path = $pdf_file_base_path.DIRECTORY_SEPARATOR.$pdf_file_name.'.swf';
        }
        
        // 尝试删除要新建的目标文件
        @unlink($swf_file_path);
        
        // 尝试新建需要的目录
        @mkdir(dirname($swf_file_path), 0777, true);
        
        // Windows
        if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
            $cmd  = sfConfig::get('sf_root_dir').'\lib\3rd\pdf2swf\windows\pdf2swf.exe'.' "'.$pdf_file_path.'" -o "'.$swf_file_path.'" -f -T 9 -t -s storeallcharacters -s linknameurl';
        } else {
        // Linux    
            $cmd = '/usr/bin/pdf2swf'.' "'.$pdf_file_path.'" -o "'.$swf_file_path.'" -f -T 9 -t -s storeallcharacters -s linknameurl';
        }
        
        exec($cmd);
        
        // 返回目标文件路径
        return $swf_file_path;
    }
    
    
}