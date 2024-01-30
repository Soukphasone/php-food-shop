<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Link to css -->
    <link rel="stylesheet" href="css/style_shopping.css">
    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php 
$cn = mysqli_connect('localhost', 'root', '', 'shop_sports');
if(!$cn){
    die("kết nối mysql không thành công, vui lòng kiểm tra lại server");
}
$search = isset($_GET['search']) ?$_GET['search']:'';
$sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$search%'";
$kq = mysqli_query($cn, $sql);
$n = mysqli_num_rows($kq);
// echo "<div>Có $n sản phẩm</div>";
?>
<body>
    <!-- Header  -->
    <header>
        <!-- Nav -->
        <div class="nav container">
            <div class="logo">
                <img src="./Admin/./img/logo.png" alt="">
            </div>
            <div class="button-search">
            <form class="d-flex" method = "get">
            <input class="search" type="search" placeholder="Tìm kiểm" aria-label="Search" name="search">
        <div class="btn-s" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396 1.414-1.414-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8 3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6-6-2.691-6-6 2.691-6 6-6z"></path></svg></div>
      </form>
      </div>
            <div class="logout"><a href="index.php">Log Out</a></div>
            <!-- Cart-icon -->
            <i class='bx bxs-shopping-bag bx-tada' style='color:#d70a0f' id="cart-icon"></i>
                <!-- cart -->
                <div class="cart">
                    <h2 class="cart-title">Đặt hàng</h2>
                    <!-- Content -->
                    <div class="cart-content">

                    </div>
                    <!-- Total -->
                    <div class="total">
                        <div class="total-title">Tổng cộng</div>
                        <div class="total-price">0Đ</div>
                    </div>
                    <!-- Buy button -->
                    <button type="button" class="btn-buy">Mua ngay</button>
                    <!-- cart close -->
                    <i class='bx bx-x bx-flashing' id="close-cart"></i>
                </div>
        </div>
        </header>
        <?php
        $i=0;
while($sp=mysqli_fetch_object($kq))
{
    $i++;
    $anhsp = 'images/anhsp/.0.jpg';
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
        
                    <img src="<?php echo $anhsp ?>" alt="<?php echo $sp->tensp ?>" class="product-img">
                   <a href="chitietsp.php?
                   masp=<?php echo $sp->masp ?>">
                    <h2 class="product-title"><?php echo $sp->tensp?></h2>
</a>
                    <div class="price"><?php echo $sp->giasp?> Đ</div>      
                    <i class='bx bx-shopping-bag add-cart'></i>
                </div>
            </div>
        </section>
        <?php
}
?>
        <script src="css/main.js"></script>
</body>

</html>