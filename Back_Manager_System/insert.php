<?php
require_once('conn.php');
$S=trim($_POST['select1']);
if (preg_match("/\新增商品分類/i", $_POST['select2'])){
	$S2=trim($_POST['select8']);
}
else{
	$S2=trim($_POST['select2']);	
}
$S3=trim($_POST['select3']);
$S4=trim($_POST['select4']);
$S5=trim($_POST['select5']);
$S6=trim($_POST['select6']);
$S7=trim($_POST['select7']);
//刪除資料表中的資料
$sql = "INSERT INTO goods (Goods_Classify, Goods_Name,Goods_Num,Goods_Price,Goods_Specs,Goods_Statement,Goods_URL)
VALUES ('$S', '$S2', '$S3','$S4','$S5','$S6','$S7');";
mysqli_query($conn,$sql);
header( "location:manager.php"); 
?>