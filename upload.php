<?php
require('dbconnect.php');
$json = file_get_contents('php://input');

$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);
$sql = "insert into calendar(id_name,date,plan,time)values";

if ($arr === NULL) {
        return;
}else{
        $json_count = count($arr["dates"]);
        $group_name = $arr["id+name"];
        for($i = 0; $i < $json_count; $i++){
                if($i!=0){
                        $sql .=",";
                }
                $sql .= "('" . $group_name . "',";
                $sql .= "'" . $arr["dates"][$i]["date"] . "',";
                $sql .= "'" . $arr["dates"][$i]["plan"] . "',";
                $sql .= "'" . $arr["dates"][$i]["time"] . "')";
        }       
}

echo $sql;
$stmt = $dbh->query($sql);
?>