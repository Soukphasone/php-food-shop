
<header>
<div class="login-signup">
<?php
	if (!isset($_COOKIE['id'])){
	?>
	<a href="form_login.php">Sign In</a>
	<a href="form_dangky.php">Sign Up </a>
	<?php
	}
	else
	{
		echo "Hello ".$_COOKIE['ten'];
	}
    
	?>
</div>
        <!-- Nav -->
        <div class="nav container">
            <div class="logo">
                <img src="./Admin/./img/clipart1335483.png" alt="">
            </div>
            <div class="button-search">
            <form class="d-flex" action="sanpham.php "method = "post">
            <input class="search" type="text" placeholder ="Tìm kiểm" aria-label="Search" name="keyword">
            <input type="submit" name="btn_search" hidden="true">
        <div class="btn-s" type="submit" name="btn_search"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg></div>
      </form>
      </div>
            <!-- Cart-icon -->
            <a href="cart.php"><i class='bx bxs-shopping-bag bx-tada' id="cart-icon"></i></a>
                <!-- cart -->
                <div class="cart">
                    <h2 class="cart-title">Your Cart</h2>
                    <!-- Content -->
                    <div class="cart-content">

                    </div>
                    <!-- Total -->
                    <div class="total">
                        <div class="total-title">Total</div>
                        <div class="total-price">$0</div>
                    </div>
                    <!-- Buy button -->
                    <button type="button" class="btn-buy">Buy now</button>
                    <!-- cart close -->
                    <i class='bx bx-x' id="close-cart"></i>
                </div>
        </div>
        <div class="menu">
        <?php include("include/menu.php"); ?>
        </div>
        </header>