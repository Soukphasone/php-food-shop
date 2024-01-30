<!DOCTYPE html>
<html>
<head>
	<title>Gshop >> Sản phẩm</title>
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_shopping.css">
</head>
<body>
<div id="contain">
<?php
	include_once("include/connect.php"); 
	include("include/header.php"); 
	$madm = 0;
	if(isset($_GET["madm"])) $madm = $_GET["madm"];

	$sql = "SELECT * FROM sanpham WHERE 1 ";
	if ($madm !=0) {
		$sql .= " AND madm = $madm ";
	}
	$keyword = '';
	if (isset($_POST['btn_search'])) {
		$keyword = $_POST['keyword'];
	}
	if ($keyword !='') {
		$sql .=" AND (tensp LIKE '%{$keyword}%' OR mota LIKE '%{$keyword}%') ";
	}
	?>
<div class="full"></div>
	<?php
	$kq = mysqli_query($conn, $sql);
	$n = mysqli_num_rows($kq);
	// echo "<div>Có $n sản phẩm</div>";
	$i=0;
	while($sp=mysqli_fetch_object($kq))
	{
		$i++;
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
<div class="footer-pro">
		<?php include("include/footer.php"); ?>
		</div>

</body>
</html>