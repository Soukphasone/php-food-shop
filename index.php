<!DOCTYPE html>
<html>
<head>
	<title>shop sports online</title>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="css/style_shopping.css">
</head>
<body>
	<div id="contain">
		<?php include_once("include/connect.php"); ?>
		<?php include("include/header.php"); ?> 
		<div class="wellcom">
			<div class="img-logo-rt">
				<img src="admin/img/clipart15971.png" alt="">
			</div>
			<h2><span class="bo"><<</span> Welcome to <span class="bo"><<<>>> SOUKPHASONE <<<>>></span> restaurant<span class="bo"> >></span></h2>
			<div class="img-logo-rt">
				<img src="admin/img/clipart15971.png" alt="">
			</div>
		</div>
		<div class="slider"><?php include("include/slider.php"); ?> </div>
	</div>
	<div class="hotproducts">
	<div class="food">
			<img src="admin/img/laos-flag.png" alt="" >
		<h2>Laotain Food</h2>
		</div>
			<?php include("include/list_dm_sp1.php"); ?>
			</div>
	<div class="hotproducts">
	<div class="food">
			<img src="admin/img/vietnam-flag.png" alt="" >
			<h2 class="vn">Vietnamese Food</h2>
		</div>
			<?php include("include/list_dm_sp2.php"); ?>
			</div>
	<div class="hotproducts">
	<div class="food">
			<img src="admin/img/Flag-Thailand.png" alt="" >
			<h2 class="th">Thai Food</h2>
		</div>
			<?php include("include/list_dm_sp3.php"); ?>
			</div>
	<div class="hotproducts">
	<div class="food">
			<img src="admin/img/Flag-China.png" alt="" >
			<h2 class="cn">Chinese Food</h2>
		</div>
			<?php include("include/list_dm_sp4.php"); ?>
			</div>
	<div class="hotproducts">
	<div class="food">
			<div class="img-drink"><img src="admin/img/drink-logo.jpg" alt=""></div>
		</div>
			<?php include("include/list_dm_sp5.php"); ?>
			</div>
	
		<div class="footer-pro">
		<?php include("include/footer.php"); ?>
		</div>
</body>
</html>

