<?php
if (isset($_GET['madm'])){
    $madm = $_GET['madm'];
    $cn = mysqli_connect('localhost', 'root','', 'restaurant');
    if(!$cn){
        die("kết nối mysql không thành công, vui lòng kiểm tra lại server ");
    }
    $sql = "SELECT * FROM danhmuc WHERE madm =$madm ";
		$kq = mysqli_query($cn, $sql);
		$dm = mysqli_fetch_object($kq);
		?>
		<link rel="stylesheet" type="text/css" href="css/style_dm.css">
		<div id="contain">
		<form action="xuly_sua_dm.php" method="POST">
			<div class="title">
				<h2>Thông tin danh mục</h2>	
			</div >
		<div class="item">
		<div >
				<input type="text" name="madm" id="madm" size="30" value = "<?php echo $dm->madm ?>" hidden>
			</div>
				<label for="tendm">Tên danh mục</label>
				<br>
				<input type="text" name="tendm" id="tendm" size="30" value = "<?php echo $dm->tendm ?>">
			<div>
				<label for="mota">Mô tả</label>
					<br>
				<textarea name="mota" id="mota" cols="30" rows="5"><?php echo $dm->mota ?></textarea>
			</div>
			<div class = "button">
				<input type="submit" name="btn_gui" value="Save" id="save">
				<input type="reset" name="btn_xoa" value="Cancel" id = "reset">
			</div>
			</div>
		</form>
	</div>
		<?php
	}
?>