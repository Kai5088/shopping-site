<?php
require_once('conn.php');
$S0=trim($_POST['select0']);
$S1=trim($_POST['select1']);
$S2=trim($_POST['select2']);	
$S3=trim($_POST['select3']);
$S4=trim($_POST['select4']);
$S5=trim($_POST['select5']);
$S6=trim($_POST['select6']);
$S7=trim($_POST['select7']);
//刪除資料表中的資料
$sql = "UPDATE goods SET Goods_Classify='$S1', Goods_Name='$S2',Goods_Num='$S3',Goods_Price='$S4',Goods_Specs='$S5',Goods_Statement='$S6',Goods_URL='$S7'
WHERE Goods_Name='$S0';";
mysqli_query($conn,$sql);
header( "location:manager.php"); 
?>