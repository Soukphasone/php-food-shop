<?php
// lấy dữ liệu từ post
$tensp = $_POST['tensp'];
$gia = $_POST['gia'];
$motasp = $_POST['mota'];
$madm = $_POST['madm'];
$file_anh = $_FILES['anh'];
$cn = mysqli_connect('localhost', 'root', '', 'restaurant');
 if ($cn == false) die ("lỗi kết nối đến mysql");
//  var_dump($cn);
 // việt lênh SQL
$sql = "INSERT INTO sanpham (tensp, giasp, mota, madm)
VALUES('$tensp', '$gia', '$motasp', '$madm')";
//echo $sql;
  //Thực hiện lênh bằng php
$kq = mysqli_query($cn,$sql);
 if ($kq == false){
    echo"Lỗi ".mysqli_error($cn);
 }
 else {
  // upload ảnh sản phẩm
  if ($file_anh['error'] == 0){
    // upload ảnh và lưu tên anh là mã sản phẩm
    $spfolder = '../images/anhsp/';
    if(!is_dir($spfolder)) mkdir($spfolder);
    $masp = mysqli_insert_id($cn);
    $ck = move_uploaded_file($file_anh['tmp_name'], $spfolder.'/'.$masp.'.jpg');
  }
  header('location: sanpham.php');
  }
?>

