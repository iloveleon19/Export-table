<?php
require __DIR__.'/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();
//設置工作表標題名稱
$worksheet->setTitle('學生成績表');

//表頭
//設置單元格內容
$worksheet->setCellValueByColumnAndRow(1, 1, '學生成績表');
$worksheet->setCellValueByColumnAndRow(1, 2, '姓名');
$worksheet->setCellValueByColumnAndRow(2, 2, '語文');
$worksheet->setCellValueByColumnAndRow(3, 2, '數學');
$worksheet->setCellValueByColumnAndRow(4, 2, '外語');
$worksheet->setCellValueByColumnAndRow(5, 2, '總分');

//合併單元格
$worksheet->mergeCells('A1:E1');

$styleArray = [
    'font' => [
        'bold' => true
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];
//設置單元格樣式
$worksheet->getStyle('A1')->applyFromArray($styleArray)->getFont()->setSize(28);

$worksheet->getStyle('A2:E2')->applyFromArray($styleArray)->getFont()->setSize(14);

// 填入資料
$rows[]=array('name'=>'王二小', 'chinese'=>'82', 'maths'=>'78', 'english'=>'65');
$rows[]=array('name'=>'李万豪', 'chinese'=>'68', 'maths'=>'87', 'english'=>'79');
$rows[]=array('name'=>'张三丰', 'chinese'=>'89', 'maths'=>'90', 'english'=>'98');
$rows[]=array('name'=>'王老五', 'chinese'=>'68', 'maths'=>'81', 'english'=>'72');

$len = count($rows);
$j = 0;

for ($i=0; $i < $len; $i++) { 
    $j = $i + 3; //從表格第3行開始
    $worksheet->setCellValueByColumnAndRow(1, $j, $rows[$i]['name']);
    $worksheet->setCellValueByColumnAndRow(2, $j, $rows[$i]['chinese']);
    $worksheet->setCellValueByColumnAndRow(3, $j, $rows[$i]['maths']);
    $worksheet->setCellValueByColumnAndRow(4, $j, $rows[$i]['english']);
    $worksheet->setCellValueByColumnAndRow(5, $j, $rows[$i]['chinese'] + $rows[$i]['maths'] + $rows[$i]['english']);
}

$styleArrayBody = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => '666666'],
        ],
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
];
$total_rows = $len + 2;
//添加所有邊框/居中
$worksheet->getStyle('A1:E'.$total_rows)->applyFromArray($styleArrayBody);


// 下載設定
$filename = '成績表.xlsx';
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');