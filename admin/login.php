<?php 
// nhúng file php khác vào 
	include '../classes/adminlogin.php';
?>
<?php 
	$class = new adiminlogin(); // gọi tên lớp adminlogin
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$adminUser = $_POST['adminUser']; // lấy dữ liệu từ form gửi lên 
		$adminPass = md5($_POST['adminPass']); // sử dụng hàm md5() mã hóa mật khẩu 

		// hàm kiểm tra xem dữ liệu có trùng khớp hay không nếu trùng khớp thì cho adimin
		$login_check = $class->login_admin($adminUser , $adminPass);
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<span >
				<?php
					// nếu như mà ko có dữ liệu nhập vào thì sẽ hiện ra dòng thông báo 
					if(isset($login_check)){
						echo "<i> ". $login_check . "</i>";
					}
				?>
			</span>
			<div>
				<input type="text" placeholder="Username" required="" name="adminUser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="adminPass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>