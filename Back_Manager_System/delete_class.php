<?php
require_once('conn.php');
$S=trim($_POST['select4']);
//刪除資料表中的資料
$sql = "DELETE FROM goods WHERE Goods_Classify ='$S'";
mysqli_query($conn,$sql);
header( "location:manager.php"); 
?>