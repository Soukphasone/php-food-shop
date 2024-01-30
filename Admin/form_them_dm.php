<!DOCTYPE html>
<html>
<head>
	<title>Nhập dữ liệu danh mục</title>
	<link rel="stylesheet" href="css/style_dm.css">
</head>
<body>
	<div id="contain">
		<form action="xuly_them_dm.php" method="POST">
			<div class="title">
				<h1>Thêm dữ liệu danh mục</h1>	
			</div >
		<div class="item">
		<div >
				<label for="tendm">Tên danh mục</label>
				<br>
				<input type="text" name="tendm" id="tendm" size="30" required placeholder>
			</div>
			<div>
				<label for="mota">Mô tả</label>
					<br>
				<textarea name="mota" id="mota" cols="30" rows="5"></textarea>
			</div>
			<div class = "button">
				<input type="submit" name="btn_gui" value="Save" id="save">
				<input type="reset" name="btn_xoa" value="Cancel" id = "reset">
			</div>
			</div>
		</form>
	</div>
</body>
</html>