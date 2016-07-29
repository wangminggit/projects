<?php

// 加大memory 防止内存溢出
ini_set('memory_limit', '1024M');
set_time_limit(0);

$objPHPExcel = new PHPExcel();
// set default font
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial');
$objPHPExcel->getDefaultStyle()->getFont()->setSize(9);
//$objPHPExcel->getDefaultStyle()->getNumberFormat()->setFormatCode(PHPExcel_Cell_DataType::TYPE_STRING2);
$objPHPExcel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

// data - header
$data_row_header[0] = '事件类型';
$data_row_header[1] = '后台用户组';
$data_row_header[2] = '姓名';
$data_row_header[3] = '描述';
$data_row_header[4] = 'IP';
$data_row_header[5] = '日期';
$data_row[0] = $data_row_header;

$i = 1;
foreach ($logs as $obj) {
    $admin_user = AdminUserPeer::retrieveByPK($obj->getObjectId());
    $data_row_data = array(
        $obj->getLogeventTxt(),
        is_object($admin_user) ? $admin_user->getAdminUserGroup()->getName() : ' - ',
        is_object($admin_user) ? $admin_user->getName() : ' - ',
        $obj->getDescription(),
        $obj->getIp(),
        date("Y-m-d H:i:s", $obj->getCreatedAt()),
    );
    $data_row[$i] = $data_row_data;
    $i++;
}

//set height
for ($i = 1; $i < count($data_row) + 1; $i++) {
    $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(13.00);
}

//set up style array
$title_style_arr = array(
    'font' => array(
        'bold' => true,
    ),
    'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
        'wrap' => true,
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'argb' => 'C0C0C0',
        ),
    ),
);

$record = array(); //record rows and columns of the style
// format the array three-dimensional array to a two-dimensional array
foreach ($data_row as $k => $_data_row) {
    foreach ($_data_row as $_k => $d) {
        if (is_array($d)) {
            list($class, $data) = $d;
            $data_row[$k][$_k] = $data;
            $record[] = array($k, $_k, $d[0]);
        } else {
            $data_row[$k][$_k] = $d;
        }
    }
}
$header_column = array(); //record specified column
//set header style ,auto width
for ($i = 1; $i < count($data_row[0]) + 1; $i++) {
    $objPHPExcel->getActiveSheet()->getStyle((Utils::numToExcelAlpha($i)) . "1")->applyFromArray($title_style_arr);
    $objPHPExcel->getActiveSheet()->getColumnDimension(Utils::numToExcelAlpha($i))->setWidth('30.00');
    foreach ($data_row[0] as $k => $h) {
        $header_column[$h] = $k;
    }
}

// fills data
$objPHPExcel->getActiveSheet()->fromArray($data_row, NULL, 'A1');



// Save Excel 2007 file
$filename = "Report_Admin_User_Login_ " . date('Y_m_d') . ".xlsx";
ob_end_clean();
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '"');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>