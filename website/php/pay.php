<?php
//清空購物車並付款 無參數傳入
session_start();
include('../connect-sql.php');


$Cus_ID = $_SESSION['id'];

$sql = "SELECT * FROM `cus_shopping_cart` WHERE `Buyer_Record_ID` = '" . $Cus_ID . "';";
$result = mysqli_query($db_link, $sql);
$Total_Price = 0;

while($row = $result->fetch_assoc())
{
    $Cart_ID = $row['Cart_ID'];
    $Goods_ID = $row['Goods_ID'];
    $Goods_Price = $row['Goods_Price'];
    $Buy_Number = $row['Goods_Num'];
    $subtotal = $Goods_Price * $Buy_Number;
    $Total_Price += $subtotal + 100;
    $Date_Time = new DateTime('now');

    //insert data into buyer_record
    $insert_sql = 'INSERT INTO `buyer_record` (`Cus_ID`, `Buyer_Record_Time`, `Goods_ID`, `Goods_Price`, `Buy_Record_Num`) VALUES 
    ("' . $Cus_ID . '","' . $Date_Time->format('Y-m-d H:i:s') . '","' . $Goods_ID . '",' . $Goods_Price . ',' . $Buy_Number . ')';
    mysqli_query($db_link, $insert_sql);

    //delete data from shopping cart
    $delete_sql = "DELETE FROM `cus_shopping_cart` WHERE `Cart_ID` = " . $Cart_ID . ";";
    mysqli_query($db_link, $delete_sql);

    //minus Goods_Num from goods
    $minus_sql = "UPDATE `goods` SET `Goods_Num` = Goods_Num - " . $Buy_Number . " WHERE `Goods_ID` = " . $Goods_ID . ";";
    mysqli_query($db_link, $minus_sql);
}

//minus Cus_Money from login_customer
$update_money_sql = "UPDATE `login_customer` SET `Cus_Money` = Cus_Money - " . $Total_Price . " WHERE `Cus_ID` = '" . $Cus_ID . "';";
if(mysqli_query($db_link, $update_money_sql))
{
    header("location:../my-account.php#order_history");
}


