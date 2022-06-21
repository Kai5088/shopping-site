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
$sql="UPDATE goods SET  ";
if($S1!=''){
$sql .= "Goods_Classify='$S1' "; $count=1;
}
if($S2!=''){
	if($count==1){
		$sql .=",";
	}
$sql .= "Goods_Name='$S2' "; $count=1;
}
if($S3!=''){
		if($count==1){
		$sql .=",";
	}
$sql .= "Goods_Num='$S3' "; $count=1;
}
if($S4!=''){
		if($count==1){
		$sql .=",";
	}
$sql .= "Goods_Price='$S4' "; $count=1;
}
if($S5!=''){
		if($count==1){
		$sql .=",";
	}
$sql .= "Goods_Specs='$S5' "; $count=1;
}
if($S6!=''){
		if($count==1){
		$sql .=",";
	} 
$sql .= "Goods_Statement='$S6' "; $count=1;
}
if($S7!=''){
		if($count==1){
		$sql .=",";
	}
$sql .= "Goods_URL='$S7' "; 
}

$sql .= " WHERE Goods_Name='$S0';";

mysqli_query($conn,$sql);
header( "location:manager.php"); 
?>