<?php session_start(); ?>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="css/style_cart.css">
<body>
<?php include_once("include/connect.php"); ?>
<?php
if (!isset($_SESSION['cart'])){
    $_SESSION["cart"] = array();
}
$error = false;
if(isset($_GET['action'])){
    foreach ($_POST['quantity'] as $id => $quantity){
        $_SESSION["cart"][$id] = $quantity;
    }
header("Location: cart.php");
if(isset($_GET['id'])){
    unset($_SESSION["cart"][$_GET['id']]);
}
header("Location: cart.php");
if(isset($_POST['update_click'])){
    foreach ($_POST['quantity'] as $id => $quantity){
        $_SESSION["cart"][$id] = $quantity;
    }
}
elseif(isset($_POST['order_click'])){
   if(empty($_POST['ten'])){
    $error= 'Bạn chưa nhâp tên của người nhận';
   }
   elseif(empty($_POST['email'])){
    $error = 'Bạn chưa nhâp email';
   }
   elseif(empty($_POST['phone'])){
    $error = 'Bạn chưa nhâp số điện thoại';
   }
   elseif(empty($_POST['diachi'])){
    $error = 'Bạn chưa nhâp địa chỉ';
   }
   elseif(empty($_POST['quantity'])){
    $error = 'Giỏ hàng rỗng';
   }
   header("Location: error_khach_hang.php");
   if($error == false && !empty($_POST['quantity'])){
    $products = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `masp` IN(" . implode(",", array_keys($_POST['quantity'])).")");
    $total = 0;
    $orderProducts = array();
    while($row = mysqli_fetch_array($products)){
        $orderProducts[] = $row;
        $total += $row['giasp'] * $_POST['quantity'][$row['masp']];
    }
    $insertOrder = mysqli_query($conn, "INSERT INTO `order` (`id`, `name`, `email`, `phone`, `address`, `total`, `created_time`, `last_updated`) VALUE (NULL,'".$_POST['ten']."', '".$_POST['email']."', '".$_POST['phone']."', '".$_POST['diachi']."','".$total."', '".time()."', '".time()."');");
    $orderID = $conn->insert_id;
    $insertString = "";
    foreach ($orderProducts as $key => $product) {   
        $insertString .="(NULL, '".$orderID."', '".$product['masp']."', '".$_POST['quantity'][$product['masp']]."', '".$product['giasp']."', '".time()."', '".time()."')";
        if($key != count($orderProducts) - 1){
            $insertString .= ",";
        }
       }
       $insertOrder = mysqli_query($conn, "INSERT INTO `order_detail` (`id`, `order_id`, `products_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUE ".$insertString.";");
       header("Location: buy_secess.php");
    }
   
}
}
 
if(!empty($_SESSION['cart'])){
    $products = mysqli_query($conn, "SELECT * FROM `sanpham` WHERE `masp` IN (".implode(",", array_keys($_SESSION['cart'])).")");
}

?>
<section class="contain">
<div class="content-add-pd">
    <div class="home-index">
    <a href="index.php"><i class='bx bxs-home' id = "home"></i></a>
    </div>
    <h2>Giỏ Hàng</h2>
    </div>
<form action="cart.php?action=submit" method="POST">
    <table id = "customers">
        <tr>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Gía sản phẩm</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Xóa</th>
        </tr>
    <?php  
    if(!empty($products)){
    $n = mysqli_num_rows($products);
    if ($n > 0){
     $i = 1;
     $tongtien = 0;
 while($sp=mysqli_fetch_object($products))
 {
 $anhsp = 'images/anhsp/.0.jpg';
 if(is_file('images/anhsp/'.$sp->masp.'.jpg'))
 {
     $anhsp = 'images/anhsp/'.$sp->masp.'.jpg';
 }
 ?>
 <tr>
   <td><?php echo $i++ ?></td>
   <td>
     <div class="img">
     <img src="<?php echo $anhsp ?>" alt="<?php echo $sp->tensp ?>">
    </div>
</td>
<td><?php echo $sp->tensp ?></td>
<td><?php echo number_format($sp->giasp, 0, ",", ".") ?> VND</td>
   <td><input class="cart-quantity" type="number" name="quantity[<?php echo $sp->masp?>]" value="<?php echo $_SESSION["cart"][$sp->masp]?>" size="1" id ="cart-quantity"></td>
   <td><?php echo number_format($sp->giasp*($_SESSION["cart"][$sp->masp]), 0, ",", ".") ?> VND</td>
   <td class="remove-pro">
   <a href="cart.php?action=delete&id=<?php echo $sp->masp ?>"><div class="remove"><i class='bx bxs-trash-alt' style='color:#f50912;' id ="remove"></i></div></a>
    </td>
    </tr>
    <?php $tongtien += $sp->giasp*($_SESSION["cart"][$sp->masp]) ?>
    <?php
}
?>
<tr>
    <td></td>
    <td></td>
    <td class = "tongtien-gia"colspan="2">Tổng tiền</td>
    <td></td>
    <td class = "tongtien-gia"><?php echo number_format($tongtien, 0, ",", ".") ?> VND</td>
    <td><input id = "update" type="submit" name ="update_click" value="Cập Nhật"></input></td>
</tr>
<?php
}} else { ?>
    <tr>
     <td colspan="6">Chưa có dữ liệu trong giỏ hàng </td>
    </tr>
 <?php }?>

</table>
<div class="form-container">
<div class="form-buy">
      <input type="text" name="ten" placeholder="Tên người nhận">
      <input type="email" name="email" placeholder=" email">
      <input type="text" name="phone" placeholder="Số điện thoại">
      <input type="text" name="diachi" placeholder="Địa chỉ">
      <input type="submit" name="order_click" value="Đặt Hàng" class="form-btn">
      </div>
      </div>
</form>
</section>
</body>