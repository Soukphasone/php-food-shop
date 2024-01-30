
<?php 
// $sql = "SELECT  * FROM sanpham ORDER BY masp DESC LIMIT 0, 4";
$sql = "SELECT  * FROM sanpham ORDER BY madm=3 DESC LIMIT 0, 8";
	$kq = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($kq);
	// echo "<div>Có $n sản phẩm</div>";
	$i=0;
	while($sp=mysqli_fetch_object($kq))
	{
		// $i++;
		$anhsp ='images/anhsp/0.jpg';
		if(is_file('images/anhsp/'.$sp->masp.'.jpg'))
			{
				$anhsp = 'images/anhsp/'.$sp->masp.'.jpg';
			}
		?>
	  <!-- Shop -->
	  <section class="shop container">
            <!-- <h2 class="section-title">Shop products</h2> -->
            <!-- Content -->
            <div class="shop-content">
                <!-- Box 1 -->
                <div class="product-box">
				<a href="chitietsp.php?
                   masp=<?php echo $sp->masp ?>">
                    <img src="<?php echo $anhsp ?>" alt="<?php echo $sp->tensp ?>" class="product-img">
<h2 class="product-title"><?php echo $sp->tensp?></h2>
                    <div class="price"><div><?php echo number_format($sp->giasp, 0, ",", ".") ?> VND</div>      
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
				</a>
            </div>
        </section>
		<?php
	}
?>
</div>
