<?php
$masp = $_POST['masp'];
$file_anh = $_FILES['anh'];
$cn = mysqli_connect('localhost', 'root','', 'restaurant');
if(!$cn){
    die("Lỗi đến sql server");
}   
    $sql = "UPDATE sanpham SET tensp ='$_POST[tensp]', giasp = '$_POST[gia]', madm = '$_POST[madm]', mota = '$_POST[mota]' WHERE masp = '$_POST[masp]'";
    $kq = mysqli_query($cn, $sql);
 if ($kq == false){
    echo"Lỗi ".mysqli_error($cn);
 }
 else {
  // upload ảnh sản phẩm
  if ($file_anh['error'] == 0){
    // upload ảnh và lưu tên anh là mã sản phẩm
    $spfolder = '../images/anhsp/';
    if(!is_dir($spfolder)) mkdir($spfolder);
    $ck = move_uploaded_file($file_anh['tmp_name'], $spfolder.'/'.$masp.'.jpg');
   
  }
  header('location: sanpham.php');
  }
?>