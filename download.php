<?php
require('dbconnect.php');
$json = file_get_contents('php://input');

$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);

$sql = "select * from calendar where id_name =";
$sql .= "'".$arr['id+name']."';";

$stmt = $dbh->query($sql);
$result = array();
foreach ($stmt as $value) {
        $result[] =array(
                "date" => $value["date"],
                "plan" => $value["plan"],
                "time" => $value["time"],
        );
}
$json_result = json_encode($result);
echo $json_result;