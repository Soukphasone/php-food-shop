<?php
if (isset($_GET['masp'])){
    $masp = $_GET['masp'];
    $cn = mysqli_connect('localhost', 'root','', 'restaurant');
    if(!$cn){
        die("kết nối mysql không thành công, vui lòng kiểm tra lại server ");
    
	}
    $sql = "SELECT * FROM sanpham WHERE masp =$masp ";
		$kq = mysqli_query($cn, $sql);
		$sp = mysqli_fetch_object($kq);
		?>
		<link rel="stylesheet" href="css/style_sp.css">
        <div id="contain">
		<form action="xuly_sua_sp.php" method="POST" enctype="multipart/form-data">
			<div class="full">        
			</div >
            <div class="item">
		<div>
				<input type="text" name="masp" id="masp" size="30" value="<?php echo $sp->masp; ?>" hidden="true">
				<label for="tensp">Tên sản phẩm</label>
				<br>
				<input type="text" name="tensp" id="tensp" size="30" value="<?php echo $sp->tensp; ?>">
				<label for="giasp">Giá sản phẩm</label>
				<br>
				<input type="text" name="gia" id="gia" size="30" value="<?php echo $sp->giasp; ?>">
				<label for="mota">Mô tả</label>
					<br>
				<textarea name="mota" id="mota" cols="30" rows="5"><?php echo $sp->mota ?></textarea>
			</div>       
			<div class="item-img">
			<label for="anh">Ảnh</label>
				<input type="file" name="anh" id="anh" size="30">
			</div>
           <div class="id-dm">
           <div class = item-madm>
            <label for="madm">Mã danh mục</label>
            <br>
				<?php
				$cn = mysqli_connect('localhost','root','','shop_sports');
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
	<?php
	}

?>