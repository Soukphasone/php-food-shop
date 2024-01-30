<?php
// lấy dữ liệu từ post
$tendm = $_POST['tendm'];
$motadm = $_POST['mota'];

$cn = mysqli_connect('localhost', 'root', '', 'restaurant');
 if ($cn == false) die ("lỗi kết nối đến mysql");
 // việt lênh SQL
$sql = "INSERT INTO danhmuc (tendm, mota)
VALUES('$tendm', '$motadm')";
//echo $sql;
  //Thực hiện lênh bằng php
$kq = mysqli_query($cn,$sql);
 if ($kq == false){
    echo"Lỗi ".mysqli_error($cn);
 }
 else {
    header("Location: danhmuc.php");
 }
?>

