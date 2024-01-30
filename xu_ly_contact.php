<?php
// lấy dữ liệu từ post
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$messages = $_POST['messages'];
$alert = "Thanh công";
$cn = mysqli_connect('localhost', 'root', '', 'shop_sports');
 if ($cn == false) die ("lỗi kết nối đến mysql");
 // việt lênh SQL
$sql = "INSERT INTO contact (name, email, phone, messages)
VALUES('$name', '$email', '$phone','$messages')";
// echo var_dump($sql);
//   //Thực hiện lênh bằng php
$kq = mysqli_query($cn,$sql);
 if ($kq == false){
    echo"Lỗi ".mysqli_error($cn);
 }
 else {
   header("Location: contact_secess.php")  ;
 }

?>

