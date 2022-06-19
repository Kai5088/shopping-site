<?php
include('../connect-sql.php');
session_start();

$Cus_ID = $_SESSION['id'];
$sql = "SELECT * FROM `login_customer` WHERE `Cus_ID` = '" . $Cus_ID . "';";
$result = mysqli_query($db_link, $sql);
$row = $result->fetch_assoc();


$sql = "UPDATE `login_customer` SET `Cus_Money` = '" .
       (int)($row['Cus_Money']) + 10000 .
       "' WHERE `Cus_ID` = '" . $Cus_ID . "';";
$empty = mysqli_query($db_link, $sql);

header("Location: ../my-account.php");
?>
