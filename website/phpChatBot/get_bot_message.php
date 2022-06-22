<?php

function speak($con,$txt,$ortxt)
{
	$sql="select reply from chatbot_hints where question like '%$txt%'";
$res=mysqli_query($con,$sql);
// if(mysqli_num_rows($res)>0){echo "fuck";}


if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	$html=$row['reply'];
}
else{
	$html="Sorry not be able to understand you";
}
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$ortxt','$added_on','user')");
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
	echo $html;

}



function ask_product_speak($con,$txt,$ortxt)
{
	if($txt==""){
		$txt="error";
	}
	$sql="select * from goods where upper(Goods_Name) like '%$txt%'";
	$html ='';
$res=mysqli_query($con,$sql);
// if(mysqli_num_rows($res)>0){echo "fuck";}
if($total_fields = mysqli_num_fields($res))
while ($row=mysqli_fetch_assoc($res)) {
			$url = $row['Goods_URL'];
		$html.="產品名稱: ".$row['Goods_Name']."<br>"."產品價格: ".$row['Goods_Price']."<br>"."產品規格: ".$row['Goods_Specs']."<br>"."產品描述: ".$row['Goods_Statement']."<br>"."產品分類: ".$row['Goods_Classify']."<br>"."產品url:"."<a href=$url>連結按我</a>"."<br>"."******************"."<br>";

}
else{
	$html="Sorry 我們沒賣這個商品";
}
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$ortxt','$added_on','user')");
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
	echo $html;

}

function ask_price_speak1($con,$txt,$ortxt,$cl)
{
	
	
	$sql="SELECT * FROM `goods` WHERE Goods_Price>=$txt AND Goods_Classify like '%$cl%'ORDER BY Goods_Price ASC LIMIT 0, 1 ";
$res=mysqli_query($con,$sql);
// if(mysqli_num_rows($res)>0){echo "fuck";}
if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	$url = $row['Goods_URL'];

	$html="產品名稱: ".$row['Goods_Name']."<br>"."產品價格: ".$row['Goods_Price']."<br>"."產品規格: ".$row['Goods_Statement']."<br>"."產品分類: ".$row['Goods_Classify']."<br>"."產品url:"."<a href=$url>連結按我</a>"."<br>"."******************"."<br>";

}
else{
	$html="Sorry 我們沒賣這個商品";
}
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$ortxt','$added_on','user')");
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
	echo $html;

}

function ask_price_speak2($con,$txt,$ortxt,$cl)
{
	
	
	$sql="SELECT * FROM `goods` WHERE Goods_Price<=$txt AND Goods_Classify like '%$cl%' ORDER BY Goods_Price DESC LIMIT 0, 1";
$res=mysqli_query($con,$sql);
// if(mysqli_num_rows($res)>0){echo "fuck";}
if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	$url = $row['Goods_URL'];

	$html="產品名稱: ".$row['Goods_Name']."<br>"."產品價格: ".$row['Goods_Price']."<br>"."產品規格: ".$row['Goods_Statement']."<br>"."產品分類: ".$row['Goods_Classify']."<br>"."產品url:"."<a href=$url>連結按我</a>"."<br>"."******************"."<br>";

}
else{
	$html="Sorry 我們沒賣這個商品";
}
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$ortxt','$added_on','user')");
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
	echo $html;

}

function random_select($con,$ortxt)
{
	
	$a=rand(1,counter($con));
	$sql="SELECT * FROM `goods` WHERE Goods_ID = $a";
$res=mysqli_query($con,$sql);
// if(mysqli_num_rows($res)>0){echo "fuck";}
if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	$url = $row['Goods_URL'];

	$html="產品名稱: ".$row['Goods_Name']."<br>"."產品價格: ".$row['Goods_Price']."<br>"."產品規格: ".$row['Goods_Statement']."<br>"."產品分類: ".$row['Goods_Classify']."<br>"."產品url:"."<a href=$url>連結按我</a>"."<br>"."******************"."<br>";
}
else{
	$html="Sorry not be able to understand you";
}
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$ortxt','$added_on','user')");
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
	echo $html;

}
function delete_all($con)
{
	$sql="DELETE FROM message;";
	$res=mysqli_query($con,$sql);
	return;
}

// if(mysqli_num_rows($res)>0){echo "fuck";}

function counter($con)
{
	$sql = "SELECT Goods_ID FROM `goods`";
	$res=mysqli_query($con,$sql);
	$a = mysqli_num_rows($res);
	return $a;
	
}

date_default_timezone_set('Asia/Kolkata');
include('database.inc.php');
$txt=mysqli_real_escape_string($con,$_POST['txt']);
static $i1 = 0;
if (preg_match("/(.*幹你*)|(.*肏你*)|(.*操你*)|(.*fuck*)/", $txt))
{
	$ortxt = $txt;
	$txt = "幹你";
	// counter($con);
	speak($con,$txt,$ortxt);
	
}
else if (preg_match("/(.*本日推薦|隨機推薦|random*)/", $txt))
{
	$ortxt = $txt;
	counter($con);
	random_select($con,$ortxt);
	
}
else if(preg_match("/(.*價格*)/", $txt))
{
	$result =explode("價格",$txt);
	if(preg_match("/(.*元以上的)/", $result[1])){
		$rresult =explode("元以上的",$result[1]);
		$ortxt = $txt;$c =explode("嗎",$rresult[1]);$cl =$c[0];
		if($cl == "筆電"||$cl == "notebook"||$cl == "Notebook"||$cl == "nb"||$cl == "NB"||$cl == "計算機"||$cl == "電腦"||$cl == "電競筆電")
		 	$cl = "筆記型電腦";
		else if($cl == "headphone")
			$cl = "耳機";
		else if($cl == "keyboard")
			$cl = "鍵盤";
		ask_price_speak1($con,TRIM($rresult[0]),$ortxt,TRIM($cl));
		
	}
	else if(preg_match("/(.*元以下的)/", $result[1])){
		$rresult =explode("元以下的",$result[1]);
		$ortxt = $txt;$c =explode("嗎",$rresult[1]);$cl =$c[0];
		if($cl == "筆電"||$cl == "notebook"||$cl == "Notebook"||$cl == "nb"||$cl == "NB"||$cl == "計算機"||$cl == "電腦"||$cl == "電競筆電")
		 	$cl = "筆記型電腦";
		else if($cl == "headphone")
			$cl = "耳機";
		else if($cl == "keyboard")
			$cl = "鍵盤";
		ask_price_speak2($con,TRIM($rresult[0]),$ortxt,TRIM($cl));
	}
		// $ortxt = $txt;$ortxt = $txt;$txt = '我想要買';speak($con,$txt,$ortxt);
		
	// $str_sec = explode("價格",$result[0]);
	// if(preg_match("/(.*以上)/", $result[1])){
	// 	$ortxt = $result[0];$result[0] = $str_sec[1];ask_price_speak1($con,TRIM($result[0]),$ortxt);
	// }
	// else{
	// 	$ortxt = $result[0];$result[0] = $str_sec[1];ask_price_speak2($con,TRIM($result[0]),$ortxt);
	// }
	// // $ortxt = $txt;$ortxt = $txt;$txt = '我想要買';speak($con,$txt,$ortxt);
	
}
else if(preg_match("/(.*你好*)|(.*好棒*)|(.*麼棒*)|(.*good*job*)/", $txt))
{
	$ortxt = $txt;$txt = '棒';speak($con,$txt,$ortxt);
}
else if(preg_match("/(.*購物車*)/", $txt))
{
	$ortxt = $txt;$txt = '購物車';speak($con,$txt,$ortxt);
	
}
else if(preg_match("/(.*想買*)/", $txt))
{
	
	$str_sec_0 = explode("想買",$txt);
	$str_sec = explode("嗎",$str_sec_0[1]);
	$ortxt = $txt;$txt = $str_sec[0];ask_product_speak($con,TRIM($txt),$ortxt);

	
}

else if(preg_match("/(.*想要買*)/", $txt))
{
	
	$str_sec_0 = explode("想要買",$txt);
	$str_sec = explode("嗎",$str_sec_0[1]);
	$ortxt = $txt;$txt = $str_sec[0];ask_product_speak($con,TRIM($txt),$ortxt);
	// $ortxt = $txt;$ortxt = $txt;$txt = '我想要買';speak($con,$txt,$ortxt);
	
}
else if(preg_match("/(.*你們有賣|有沒有賣*)/", $txt))
{
	
	$str_sec_0 = explode("賣",$txt);
	$str_sec = explode("嗎",$str_sec_0[1]);
	$ortxt = $txt;$txt = $str_sec[0];ask_product_speak($con,TRIM($txt),$ortxt);
	// $ortxt = $txt;$ortxt = $txt;$txt = '我想要買';speak($con,$txt,$ortxt);
	
}
else if(preg_match("/(.*你們有賣李彥宏*)/", $txt))
{
	$ortxt = $txt;$txt = '李彥宏';ask_product_speak($con,$txt,$ortxt);
	
}
else if(preg_match("/(.*早安|午安|晚安*)/", $txt))
{
	$ortxt = $txt;$txt = '安';speak($con,$txt,$ortxt);
	
}
else if(preg_match("/(.*哪裡人|住哪裡*)/", $txt))
{
	$ortxt = $txt;$txt = '哪裡人';speak($con,$txt,$ortxt);
	
}
else if(preg_match("/(.*刪除所有訊息|clear*)/", $txt))
{
	$ortxt = $txt;delete_all($con);
	echo "成功刪除，請重新整理頁面";
	// $ortxt = $txt;delete_all($con);speak($con,$txt,$ortxt);
	
}

else{
	$ortxt = $txt;speak($con,$txt,$ortxt);
}

?>