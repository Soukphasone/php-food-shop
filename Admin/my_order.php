<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="css/style_admin_page.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="css/style.css">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <img src="img/clipart1636693.png" alt="" class="logo-shop">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Quan ly</a>
          <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown08">
            <li><a class="dropdown-item" href="danhmuc.php">Danh muc</a></li>
            <li><a class="dropdown-item" href="sanpham.php">San pham</a></li>
            <li><a class="dropdown-item" href="#">My Order</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
      </ul>
      <?php
      $cn = mysqli_connect('localhost', 'root', '', 'restaurant');
      if (!$cn) {
        die("kết nối mysql không thành công, vui lòng kiểm tra lại server");
      }
      $search = isset($_GET['search']) ? $_GET['search'] : '';
      $sql = "SELECT `order`.name,`order`.`email`,`order`.`phone`,`order`.`address`,`order_detail`.`products_id`,`order_detail`.`quantity`, `order_detail`.price,`order`.`total`,`order_detail`.`last_updated`, `order_detail`.`order_id`, `order`.`id` FROM `order_detail` INNER JOIN `order` ON order_detail.order_id= `order`.`id`;";
      $kq = mysqli_query($cn, $sql);
      $n = mysqli_num_rows($kq);
      ?>
      <form class="d-flex" method="get">
        <input class="form-control me-2" type="search" placeholder="Tìm Kiểm" aria-label="Search" name="search">
        <div class="search"><i class='bx bx-search' id='search'></i></div>
      </form>
    </div>
  </div>
</nav>

<section class="contain">

  <table id="customers">
    <tr>
      <th>STT</th>
      <th>Tên người nhận</th>
      <th>email</th>
      <th>số điện thoại</th>
      <th>địa chỉ</th>
      <th>Mã sản phẩm</th>
      <th>số lượng</th>
      <th>giá</th>
      <th>tổng tiền</th>
      <th>thời gian đặt hàng</th>
    </tr>
    <?php
    if ($n > 0) {
      $i = 1;

      while ($id = mysqli_fetch_object($kq)) {
    ?>
        <tr>
          <td><?php echo $i++ ?></td>
          <td><?php echo $id->name ?></td>
          <td><?php echo $id->email ?></td>
          <td><?php echo $id->phone ?></td>
          <td><?php echo $id->address ?></td>
          <td><?php echo $id->products_id ?></td>
          <td><?php echo $id->quantity ?></td>
          <td><?php echo $id->price ?></td>
          <td><?php echo $id->price*$id->quantity ?></td>
          <td><?php echo date('d-m-
          y', $id->last_updated) ?></td>
        </tr>
      <?php
      }
    } else { ?>
      <tr>
        <td colspan="11">Chưa có dữ liệu khách hàng </td>
      </tr>
    <?php } ?>
  </table>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>