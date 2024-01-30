<?php

@include 'server.php';

session_start();

if(isset($_POST['submit'])){

   $ten = mysqli_real_escape_string($cn, $_POST['ten']);
   $matkhau = md5($_POST['matkhau']);
   $sql = " SELECT * FROM users WHERE ten = '$ten' && matkhau = '$matkhau' ";

   $kq = mysqli_query($cn, $sql);

   if ($kq ==false) {
		echo "Lỗi ".mysqli_error($cn);

	}
	else
	{
		// đọc kết quả của sql
		// lấy ra số dòng kết quả		mysqli_num_rows($kq)
		$n = mysqli_num_rows($kq);
		if ($n==0) {
         $error[] = 'Sai tên hoặc mật khẩu!';
		}
		else
		{
			// đọc dữ liệu 	mysqli_fetch_object($kq)
			$user = mysqli_fetch_object($kq);
			setcookie('id', $user->id, time()+24*36000,'/');
			setcookie('ten', $user->ten, time()+24*36000,'/');
			setcookie('loginmark', time(), time()+24*36000,'/');
			header('Location:index.php');
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Đăng nhập</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="ten" required placeholder="Tên của bạn">
      <input type="password" name="matkhau" required placeholder="Mật khẩu">
      <input type="submit" name="submit" value="đăng nhập" class="form-btn">
      <p>Không có tài khoản? <a href="form_dangky.php">đăng ký</a></p>
   </form>

</div>

</body>
</html>