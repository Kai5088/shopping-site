<?php
//從購物車中刪除資料 要傳入1個參數：$_GET['Goods_ID']
session_start();
include('../connect-sql.php');
$Cus_ID = $_SESSION['id'];
if($_GET['Goods_ID'] == "ALL")
{
    $sql = "DElETE FROM `cus_shopping_cart` WHERE `Buyer_Record_ID` = '" . $Cus_ID . "';";
}
else 
{
    $sql = "DElETE FROM `cus_shopping_cart` WHERE `Goods_ID` = " . $_GET['Goods_ID'] .  " AND `Buyer_Record_ID` = '" . $Cus_ID . "';";
}
if (mysqli_query($db_link, $sql)) 
{
    header("location:../cart.php");
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
}                                  
?>