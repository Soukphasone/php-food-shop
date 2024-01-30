<?php

@include 'server.php';
if(isset($_POST['submit'])){
   $ten = mysqli_real_escape_string($cn, $_POST['ten']);
   $email = mysqli_real_escape_string($cn, $_POST['email']);
   $matkhau = md5($_POST['matkhau']);
   $cfmatkhau = md5($_POST['cfmatkhau']);

   $sql = " SELECT * FROM users WHERE ten = '$ten' && matkhau = '$matkhau' ";

   $kq = mysqli_query($cn, $sql);

   if(mysqli_num_rows($kq) > 0){

      $error[] = 'user loi!';

   }else{

      if($matkhau != $cfmatkhau){
         $error[] = 'Sai mật khẩu!';
      }else{
         $insert = "INSERT INTO users(ten, email, matkhau) VALUES('$ten','$email','$matkhau')";
         mysqli_query($cn, $insert);
         header('location:form_login.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>đăng ký tài khoản</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="ten" required placeholder="Nhập tên của bạn">
      <input type="email" name="email" required placeholder="Nhâp email">
      <input type="password" name="matkhau" required placeholder="Mật khẩu">
      <input type="password" name="cfmatkhau" required placeholder="Xác nhận mật khẩu">
      <input type="submit" name="submit" value="đăng ký" class="form-btn">
      <p>Có tài khoản? <a href="form_login.php">đăng nhâp</a></p>
   </form>

</div>

</body>
</html>