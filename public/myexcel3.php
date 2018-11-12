<?php

// $dir=dirname('__FILE__'); //找到當前腳本所在路徑

require __DIR__."/excelClasses/PHPExcel.php"; //引入文檔

$objPHPExcel=new PHPExcel();  //實例化PHPExcel類，等同於在桌面上創建一個ecxel表格
//$objPHPExcel->createSheet();  //創建新的內置表    執行一次創建一個新的一頁
//$objPHPExcel->setActiveSheetIndex(1);//把新創建的的sheet設定微當前活動sheet
$objSheet=$objPHPExcel->getActiveSheet();//獲取當前活動sheet的操作對象
$objSheet->setTitle('dome2'); //給當前的活動sheet設置名稱

$arr[]=array('name'=>'姓名', 'chinese'=>'語文', 'maths'=>'數學', 'english'=>'外語');
$arr[]=array('name'=>'王二小', 'chinese'=>'82', 'maths'=>'78', 'english'=>'65');
$arr[]=array('name'=>'李万豪', 'chinese'=>'68', 'maths'=>'87', 'english'=>'79');
$arr[]=array('name'=>'张三丰', 'chinese'=>'89', 'maths'=>'90', 'english'=>'98');
$arr[]=array('name'=>'王老五', 'chinese'=>'68', 'maths'=>'81', 'english'=>'72');

$objSheet->fromArray($arr);//直接加載數據塊來實現填充數據

$objWrite=PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");//按照指定格式生成excel文檔
//$objWrite->save(__DIR__."/demo_3.xlsx");//保存到當前文檔夾下

browser_export("Excel2007",'excel.xlsx');  //不保存在當前文檔夾下，直接輸出至瀏覽器
$objWrite->save('php://output');           //保存

function browser_export($type,$filename){  //聲明一個方法  判斷保存 保存格式
    if($type=='Excel5'){
        header('Content-Type: application/vnd.ms-excel');
    }else{
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    }
    header('Content-Disposition: attachment;filename="'.$filename.'"');//告訴瀏覽器 輸出的文檔名稱
    header('Cache-Control: max-age=0');//禁止緩存
}