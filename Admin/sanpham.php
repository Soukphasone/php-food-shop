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
            <li><a class="dropdown-item" href="my_order.php">My Order</a></li>
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
      $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$search%'";
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
  <div class="content-add-pd">
    <h2>Thêm sản phẩm</h2>
    <a href="form_them_sp.php"><button class="btn-add" type="submit">Add</button></a>
  </div>

  <table id="customers">
    <tr>
      <th>STT</th>
      <th>Hình ảnh</th>
      <th>Tên sản phẩm</th>
      <th>Gía sản phẩm</th>
      <th>Mô tả</th>
      <th>Thao tác</th>
    </tr>
    <?php
    if ($n > 0) {
      $i = 1;
      while ($sp = mysqli_fetch_object($kq)) {
        $anhsp = '../images/anhsp/.0.jpg';
        if (is_file('../images/anhsp/' . $sp->masp . '.jpg')) {
          $anhsp = '../images/anhsp/' . $sp->masp . '.jpg';
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
          <td><?php echo $sp->mota ?></td>
          <td>
            <div class="button">
              <div class="button-d">
                <a href="xuly_xoa_sp.php?masp=<?php echo $sp->masp ?>"><button class="btn-d" type="submit">Delete</button></a>
              </div>
              <div class="button-e">
                <a href="form_sua_sp.php?masp=<?php echo $sp->masp ?>"><button class="btn-e" type="submit">Edit</button></a>
              </div>
            </div>
            </div>
          </td>
        </tr>
      <?php
      }
    } else { ?>
      <tr>
        <td colspan="8">Không có dữ liệu sản phẩm</td>
      </tr>
    <?php } ?>
  </table>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>