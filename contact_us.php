<!DOCTYPE html>
<html>
<head>
	<title>Contact us</title>
	<link rel="stylesheet" type="text/css" href="css/style_contact.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
</head>
<body>
<form action="xu_ly_contact.php" method = "POST">
<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2>Contact Us</h2>
				<input type="text" class="field" name="name" required placeholder="Tên của bạn">
				<input type="text" class="field" name="email" required placeholder="Email">
				<input type="text" class="field" name="phone" required placeholder="Số điên thoại">
				<textarea required placeholder="Tin nhắn" name="messages" class="field"></textarea>
				<input type="submit" id = "send" value="Gửi">
			</div>
		</div>
	</div>
</form>
</body>
</html>