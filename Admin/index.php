<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style_admin_page.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <img src="img/clipart1636693.png" alt="" class="logo-shop">
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Quan ly</a>
                <ul class="dropdown-menu bg-dark" aria-labelledby="dropdown08">
                  <li><a class="dropdown-item" href="danhmuc.php">danh muc</a></li>
                  <li><a class="dropdown-item" href="sanpham.php">San pham</a></li>
                  <li><a class="dropdown-item" href="my_order.php">My order</a></li>
                </ul>
              </li>   
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
      </ul>
      <form class="d-flex" method = "get">
        <input class="form-control me-2" type="search" placeholder="Tìm Kiểm" aria-label="Search" name = "search">
        <div class="search"><i class='bx bx-search' id = 'search'></i></div>
</form>
    </div>
  </div>
</nav>

    <div class="container">
        <div class="content">
            <h3>Welcome to SOUKPHASONE'S <span>Shopping</span></h3>
           <a href="danhmuc.php"> <h1>Danh Muc <span></span></h1></a>
           <a href="sanpham.php"> <h1>San Pham <span></span></h1></a>
           <a href="my_order.php"> <h1>My Order <span></span></h1></a>
    </div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</html>