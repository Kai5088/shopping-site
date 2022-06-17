<?php
//將資料加入購物車 要傳入2個參數：$_GET['Goods_ID'], $_GET[num]
session_start();
include('../connect-sql.php');
$sql = "SELECT * FROM `goods` WHERE `Goods_ID` = " . $_GET['Goods_ID'] . ";";
$result = mysqli_query($db_link, $sql);
$row = $result->fetch_assoc();

$Goods_ID = $row['Goods_ID'];
$Goods_Name = $row['Goods_Name'];
$Goods_Price = $row['Goods_Price'];
$Goods_Num = $_GET['num'];
$Goods_URL = $row['Goods_URL'];
$Buyer_Record_ID = $_SESSION['id'];

$sql = 'REPLACE INTO `cus_shopping_cart` (`Goods_ID`, `Goods_Name`, `Goods_Price`, `Goods_Num`, `Goods_URL`, `Buyer_Record_ID`) VALUES 
("' . $Goods_ID . '","' . $Goods_Name . '",' . $Goods_Price . ',' . $Goods_Num . ',"' . $Goods_URL . '","' . $Buyer_Record_ID . '")';
if (mysqli_query($db_link, $sql)) 
{
    header("location:../cart.php");
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
} 
$sql = "DElETE FROM `cus_temp_list` WHERE `Goods_ID` = " . $Goods_ID . " AND `Cus_ID` = '" . $Buyer_Record_ID . "';";
if (mysqli_query($db_link, $sql)) 
{
    header("location:../cart.php");
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
}                                   
?>