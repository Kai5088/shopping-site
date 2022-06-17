<?php
//從暫存清單中刪除資料 要傳入2個參數：$_GET['Cus_ID'], $_GET['Goods_ID']
session_start();
include('../connect-sql.php');
$sql = "DElETE FROM `cus_temp_list` WHERE `Goods_ID` = " . $_GET['Goods_ID'] . " AND `Cus_ID` = '" . $_GET['Cus_ID'] . "';";
if (mysqli_query($db_link, $sql)) 
{
    header("location:../wishlist.php");
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($db_link);
}                                  
?>