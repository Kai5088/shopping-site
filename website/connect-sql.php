<?php

$servername = "127.0.0.1";
$db_userName = 'root';
$db_password = '';
$db_name = 'shopping_mall';

$db_link = @mysqli_connect($servername, $db_userName, $db_password, $db_name);
$db_link -> set_charset("UTF8");
if (!$db_link) {
    die('資料庫連結失敗!');
} else {
//    echo '資料庫連結成功';
}

mysqli_query($db_link, "SET NAMES 'utf8'");

?>