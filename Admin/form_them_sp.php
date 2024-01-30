<!DOCTYPE html>
<html>
<head>
	<title>Nhập dữ liệu sản phẩm</title>
	<link rel="stylesheet" href="css/style_sp.css">
</head>
<body>
	<div id="contain">
		<form action="xuly_them_sp.php" method="POST" enctype="multipart/form-data">
			<div class="full"></div>
		<div class="item">
				<label for="tensp">Tên sản phẩm</label>
				<br>
				<input type="text" name="tensp" id="tensp" size="30">
				<label for="giasp">Giá sản phẩm</label>
				<br>
				<input type="text" name="gia" id="gia" size="30">
				<label for="mota">Mô tả</label>
					<br>
				<textarea name="mota" id="mota" cols="30" rows="5"></textarea>
            
			<div class="item-img">
			<label for="anh">Ảnh</label>
				<input type="file" name="anh" id="anh" size="30">
			</div>
           <div class="id-dm">
           <div class = item-madm>
            <label for="madm">Mã danh mục</label>
				<?php
				$cn = mysqli_connect('localhost','root','','restaurant');
				if (!$cn) {
					die("Kết nối mysql không thành công,vui lòng kiểm tra lại server");
				}
				$sql = "SELECT * FROM danhmuc ";
				$kq = mysqli_query($cn, $sql);
				$n = mysqli_num_rows($kq);
				?>
			<div class="custom">
			<div class="custom-select">
			<select name="madm" id="madm">
			<?php
			while ($dm =mysqli_fetch_object($kq)) {
				echo "	<option value='$dm->madm'>$dm->tendm </option>";
				
				
			}
			?>
		</select>
				</div>
			</div>

            </div>

           </div>
		   <script src="css/cs.js"></script>
			<div class = "button">
				<input type="submit" name="btn_gui" value="Save" id="save">
				<input type="reset" name="btn_xoa" value="Cancel" id = "reset">
			</div>
			</div>
		</form>
	</div>
</body>
</html>