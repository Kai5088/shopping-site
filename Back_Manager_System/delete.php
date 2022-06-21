<?php
require_once('conn.php');
$S=trim($_POST['select']);
//刪除資料表中的資料
$sql = "DELETE FROM goods WHERE Goods_Name ='$S'";
mysqli_query($conn,$sql);
header( "location:manager.php"); 
?>