<?php
//加入暫存清單 要輸入1個參數：$_GET['Goods_ID']
session_start();
include('../connect-sql.php');
$sql = "SELECT * FROM `goods` WHERE `Goods_ID` = " . $_GET['Goods_ID'] . ";";
$result = mysqli_query($db_link, $sql);
$row = $result->fetch_assoc();

$Goods_ID = $row['Goods_ID'];
$Goods_Name = $row['Goods_Name'];
$Goods_Price = $row['Goods_Price'];
$Goods_Num = $row['Goods_Num'];
$Goods_URL = $row['Goods_URL'];
$Goods_Statement = nl2br($row['Goods_Statement']);
$Goods_Classify = $row['Goods_Classify'];
$Goods_Specs = nl2br($row['Goods_Specs']);
$Cus_ID = $_SESSION['id'];

$sql = 'INSERT IGNORE INTO `cus_temp_list` (`Goods_ID`, `Goods_Name`, `Goods_Num`, `Goods_Price`, `Goods_URL`, `Cus_ID`) VALUES 
("' . $Goods_ID . '","' . $Goods_Name . '",' . $Goods_Num . ',' . $Goods_Price . ',"' . $Goods_URL . '","' . $Cus_ID . '")';

if (mysqli_query($db_link, $sql)) 
{
    header("location:../product-details.php?Goods_ID=$Goods_ID");
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
}                                  
?>