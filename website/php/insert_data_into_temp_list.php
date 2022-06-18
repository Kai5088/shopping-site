<?php
//將資料加入暫存清單 要傳入1個參數：$_GET['Goods_ID']
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

$sql = 'INSERT INTO `cus_temp_list` (`Goods_ID`, `Goods_Name`, `Goods_Num`, `Goods_Price`, `Goods_URL`, `Cus_ID`) VALUES 
("' . $Goods_ID . '","' . $Goods_Name . '",' . $Goods_Num . ',' . $Goods_Price . ',"' . $Goods_URL . '","' . $Cus_ID . '")';

$sql_remove_old = "DElETE FROM `cus_temp_list` WHERE `Goods_ID` = " . $_GET['Goods_ID'] . " AND `Cus_ID` = '" . $Cus_ID . "';";
mysqli_query($db_link, $sql_remove_old);

if (mysqli_query($db_link, $sql)) 
{
    header("location:../wishlist.php");
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
}                                  
?>