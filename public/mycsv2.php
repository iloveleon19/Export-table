<?php
    // $result = mysql_query("select * from student order by id asc");
    
    $str = "姓名,性別,年齡\n";
    // $str = mb_convert_encoding($str, "UTF-8", "auto"); // 通過auto自動檢測，轉換UTF-8

    $rows[]=array('name'=>'∫kevin','sex'=>'βM','age'=>'30');
    $rows[]=array('name'=>'\,  leon','sex'=>'M','age'=>'30');

    foreach ($rows as $row) {
        // $name = mb_convert_encoding($row['name'], "UTF-8", "auto"); // 通過auto自動檢測，轉換UTF-8
        // $sex = mb_convert_encoding($row['sex'], "UTF-8", "auto"); // 通過auto自動檢測，轉換UTF-8
        $name = str_replace('"', '""', $row['name']);
        $sex = str_replace('"', '""', $row['sex']);
        $age = str_replace('"', '""', $row['age']);
        $str .= '"'.$name.'","'.$sex.'","'.$age.'"'."\n"; //用引文逗號分開
    }
    $filename = date('Ymd').'.csv'; //設定檔名
    export_csv($filename, $str); //匯出

    function export_csv($filename,$data)
    {
        header("Content-type:text/csv;charset=utf-8");
        header("Content-Disposition:attachment;filename=".$filename);
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header('Expires:0');
        header('Pragma:no-cache');
        echo "\xEF\xBB\xBF"; //輸出 BOM 避免 Excel 讀取時會亂碼
        echo $data;
    }