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
$Goods_Statement = nl2br($row['Goods_Statement']);
$Goods_Classify = $row['Goods_Classify'];
$Goods_Specs = nl2br($row['Goods_Specs']);
$Buyer_ID = $_SESSION['id'];

$sql = 'INSERT INTO `cus_shopping_cart` (`Goods_ID`, `Goods_Name`, `Goods_Price`, `Goods_Num`, `Goods_URL`, `Buyer_Record_ID`) VALUES 
("' . $Goods_ID . '","' . $Goods_Name . '",' . $Goods_Price . ',' . $Goods_Num . ',"' . $Goods_URL . '","' . $Buyer_ID . '")';
echo $sql;
if (mysqli_query($db_link, $sql)) 
{
    header("location:../cart.php");
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
}                                  
?>