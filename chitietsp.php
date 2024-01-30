<!DOCTYPE html>
<html>
<head>
	<title>shop >> Sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/style_shopping.css">
	<link rel="stylesheet" type="text/css" href="css/style_ct.css">
</head>
<body>
<div id="contain">
<?php
	include_once("include/connect.php"); 
	include("include/header.php"); 
	$masp = 0;
	if(isset($_GET["masp"])) $masp = $_GET["masp"];

	$sql = "SELECT * FROM sanpham WHERE 1 ";
	if ($masp !=0) {
		$sql .= " AND masp = $masp ";
	}
	$kq = mysqli_query($conn, $sql);
	$sp=mysqli_fetch_object($kq);
	$anhsp ='images/anhsp/0.jpg';
		if(is_file('images/anhsp/'.$sp->masp.'.jpg'))
			{
				$anhsp = 'images/anhsp/'.$sp->masp.'.jpg';
			}
		?>
		 <div class="container-buy">
        <div class="img">
        <img src="<?php echo $anhsp ?>" alt="<?php echo $sp->tensp ?>" class="product-img">
        </div>
        <div class="container-content-b">
            <div class="content-buy">
                <div class="name-products">
                <h1><?php echo $sp->tensp?></h1>
                   <div class="price-buy"><h3><div><?php echo number_format($sp->giasp, 0, ",", ".") ?> VND</div></h3>  
                </div>
                </div>
               <div class="cart-quantity-number">
                <div class="number-content">
                    <h3>số lượng</h3>
                </div>
                <form action="cart.php?action=submit" method ="POST">
                    <input class="cart-quantityy" type="number" name="quantity[<?php echo $sp->masp?>]" value="1" size="2">
                   
               </div>
                <div class="button">
                    <div class="button-b">
                   <input class = "btn-b" type="submit" value = "Mua "></input>
                    </div>
                    </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<div class="hotproducts">
			<?php include("include/all_products.php"); ?>
		</div>
        <div class="footer-pro">
		<?php include("include/footer.php"); ?>
		</div>
</body>
</body>
</html>