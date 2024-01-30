<nav>
	<ul class="menu">
		<li>
		<a href="index.php"><i class='bx bxs-home' id = "home"></i></a>
		</li>
		<li>
		<a href="index.php">Home</i></a>
		</li>
	
	<?php
		$sql = "Select * From danhmuc";
		$kq = mysqli_query($conn,$sql);
		if ($kq) {
			while ($dm = mysqli_fetch_object($kq) ){
				?>
				<li>
					<a href="sanpham.php?madm=<?php echo $dm->madm ?>"><?php echo $dm->tendm ?></a>
				</li>
				<?php
			}
		}
	 ?>
	 	<li>
			<a href="contact_us.php">Contact us</a>
		</li>
	 </ul>
</nav>
