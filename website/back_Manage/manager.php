<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>管理者頁面</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-secondary text-white container-fluid pt-3">

	選擇需修改商品: 
	<?php
	require_once('conn.php');
	$sql = "SELECT  Distinct `Goods_Name` FROM `goods` WHERE 1;";
	$goods_class = mysqli_query ($conn, $sql);
	?>
	<form action="update.php" method="post">
		<div class="row">
			<select name="select0" class="form-select form-select-sm w-25">
				<!-- 在架商品種類 -->
				<option value="">--- Select ---</option>
				
				<?php

            while ($cat = mysqli_fetch_array(
                                $goods_class,MYSQLI_ASSOC)):;

                ?>
                    <option value="<?php echo $cat['Goods_Name'];
                    ?>">
                               <?php echo $cat['Goods_Name'];?>
                    </option>
                <?php
              endwhile;
                ?>
			</select>
		</div>
	輸入欲修改商品:
		<div class="row" id="modify" >
			<input type="text" name="select1" id="good_class" placeholder="商品分類" class="col-sm-2">
			<input type="text" name="select2" id="good_name" placeholder="商品名稱" class="col-sm-2">
			<input type="text" name="select3" id="good_num" placeholder="數量" class="col-sm-1">
			<input type="text" name="select4" id="good_price" placeholder="價錢" class="col-sm-2">
			<input type="text" name="select5" placeholder="規格" class="col-sm-2">
			<input type="text" name="select6" placeholder="描述" class="col-sm-2">
			<input type="text" name="select7" id="good_url" placeholder="URL" class="col-sm-3">
		</div>
		<input type="submit" name="" value="修改" class="btn btn-primary" id="modify_determine" >
		<script>
			var div_modify = document.getElementById("modify");
			var modify_determine = document.getElementById("modify_determine");
			function appear(){
				if (div_modify.style.visibility == "hidden") {
					div_modify.style.visibility = "";
					modify_determine.style.visibility = "";
				}
			}
		</script>

		<hr>
	</form>
	新增商品: 
	<?php
	require_once('conn.php');
	$sql = "SELECT  Distinct `Goods_Classify` FROM `goods` WHERE 1;";
	$goods_class = mysqli_query ($conn, $sql);
	?>
	<form id="form" name="form" method="post" action="insert.php">
		<div class="row">
		
			<input type="text" name="select1" placeholder="商品分類" class="col-sm-2">
			<input type="text" name="select2" placeholder="商品名稱" class="col-sm-2">
			<input type="text" name="select3" placeholder="數量" class="col-sm-2">
			<input type="text" name="select4" placeholder="價錢" class="col-sm-2">
			<input type="text" name="select5" placeholder="規格" class="col-sm-2">
			<input type="text" name="select6" placeholder="描述" class="col-sm-2">
			<input type="text" name="select7" placeholder="URL" class="col-sm-4">
		</div>
		<input type="submit" name="" value="新增" class="btn btn-primary">

		</form>
	刪除商品: 
	<?php
	require_once('conn.php');
	$sql = "SELECT  Distinct `Goods_Name` FROM `goods` WHERE 1;";
	$goods_class = mysqli_query ($conn, $sql);
	?>
	<form action="delete.php" method="post">
		<div class="row">
			<select name="select" class="form-select form-select-sm w-25">
				<!-- 在架商品種類 -->
				<option value="">--- Select ---</option>
				
				<?php

            while ($cat = mysqli_fetch_array(
                                $goods_class,MYSQLI_ASSOC)):;

                ?>
                    <option value="<?php echo $cat['Goods_Name'];
                    ?>">
                               <?php echo $cat['Goods_Name'];?>
                    </option>
                <?php
              endwhile;
                ?>
			</select>
		</div>
		<input type="submit" name="" value="刪除" class="btn btn-primary">
	</form>
	刪除商品分類: 
	<?php
	require_once('conn.php');
	$sql = "SELECT  Distinct `Goods_Classify` FROM `goods` WHERE 1;";
	$goods_class = mysqli_query ($conn, $sql);
	?>
	<form action="delete_class.php" method="post">
		<div class="row">
			<select name="select4" class="form-select form-select-sm w-25">
				<!-- 在架商品種類 -->
				<option value="">--- Select ---</option>
				
				<?php

            while ($cat = mysqli_fetch_array(
                                $goods_class,MYSQLI_ASSOC)):;

                ?>
                    <option value="<?php echo $cat['Goods_Classify'];
                    ?>">
                               <?php echo $cat['Goods_Classify'];?>
                    </option>
                <?php
              endwhile;
                ?>
			</select>
		</div>
		<input type="submit" name="" value="刪除" class="btn btn-primary">
	</form>
</body>
</html>
