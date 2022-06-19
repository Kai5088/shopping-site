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
	<form action="" method="">
	選擇需修改商品: 
		<div class="row">
			<select name="" class="form-select form-select-sm w-25">
				<!-- 在架商品種類 -->
				<option></option>
			</select>
			<select name="" class="form-select form-select-sm w-25">
				<!-- 該在架商品種類所有商品 -->
				<option></option>
			</select>
		</div>

		<button type="button" name="" class="btn btn-primary" onclick="appear();">確定</button>
		<div class="row" id="modify" style="visibility: hidden;">
			<select name="" class="form-select form-select-sm w-25">
				<!-- 修改在架商品種類 -->
				<option></option>
			</select>
			<input type="text" name="" id="good_name" placeholder="商品名稱" class="col-sm-2">
			<input type="text" name="" id="good_num" placeholder="數量" class="col-sm-1">
			<input type="text" name="" id="good_price" placeholder="價錢" class="col-sm-2">
			<input type="text" name="" id="good_url" placeholder="URL" class="col-sm-3">
		</div>
		<input type="submit" name="" value="修改" class="btn btn-primary" id="modify_determine" style="visibility: hidden;">
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

	新增商品: 
		<div class="row">
			<select name="" class="form-select form-select-sm w-25">
				<!-- 在架商品種類 -->
				<option>1</option>
				<option>2</option>
				<option>3</option>
			</select>
			<select name="" class="form-select form-select-sm w-25" id="add_goods">
				<!-- 在架商品種類 -->
				<option>1</option>
				<option>2</option>
				<option value="last">新增商品分類</option>
			</select>
			<input type="text" name="" placeholder="商品名稱" class="col-sm-2">
			<input type="text" name="" placeholder="數量" class="col-sm-2">
			<input type="text" name="" placeholder="價錢" class="col-sm-2">
			<input type="text" name="" placeholder="新增的商品類別" class="col-sm-3" style="display:none" id="add_clasify">

			<input type="text" name="" placeholder="URL" class="col-sm-4">
		</div>
		<input type="submit" name="" value="新增" class="btn btn-primary">
		<script type="text/javascript">
			var select = document.querySelector("#add_goods");
			select.addEventListener("change", selectfun);

			function selectfun(){
				if (this.value === "last") {
					document.getElementById("add_clasify").style.display = "block";
				}
				else{
					document.getElementById("add_clasify").style.display = "none";
				}
			}
		</script>
		<hr>

	刪除商品: 
		<div class="row">
			<select name="" class="form-select form-select-sm w-25">
				<!-- 在架商品種類 -->
				<option></option>
			</select>
			<select name="" class="form-select form-select-sm w-25">
				<!-- 該在架商品種類所有商品 -->
				<option></option>
			</select>
		</div>
		<input type="submit" name="" value="刪除" class="btn btn-primary">

		<hr>
	刪除商品分類: 
		<div class="row">
			<select name="" class="form-select form-select-sm w-25">
				<!-- 在架商品種類 -->
				<option>1</option>
			</select>
		</div>
		<input type="submit" name="" value="刪除" class="btn btn-primary">
	</form>
</body>
</html>
