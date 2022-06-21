<?php
session_start();
$_SESSION["num"]='帳號或密碼錯誤';
require_once('conn.php');
$S=trim($_POST['account']);
$S2=trim($_POST['password']);
//刪除資料表中的資料
$sql = "SELECT COUNT(*) FROM login_manager WHERE Manager_Account='$S' AND Manager_Password='$S2'";
$result =mysqli_query($conn,$sql);
$total_records = mysqli_fetch_array($result);
if ( $total_records[0]>0 ) {
      // 成功登入, 指定Session變數
	  session_destroy();
      header("Location: manager.php");
   } else {  // 登入失敗
      echo "<script>alert('**帳號或密碼錯誤，請重新輸入**');window.history.back();</script>"; 
   }

?>