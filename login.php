
<?php
session_start()

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
	<link rel="stylesheet" href="style\login.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<body>
	<header>
		<div class="container">
			<h1>ADMIN LOGIN</h1>
		</div>
	</header>
	<!--endheader-->
	<div class="container">
		<div id="login-form" style="margin-left:20%;padding: 10% 0%;text-align: center;width: 50%;" class="shadow-drop-2-tb">
			<form method="POST" name="login" style="
    justify-content: center;
">
				<d	iv class="imgcontainer" style="
    padding: 0;
">
					<img src="image\avatar\img1.png" alt="Avatar" class="avatar" style="width: 20%;">
				</d>
				<div class="form-group">
					<label >UserName</label>
					<input type="text" style="width:32%;margin-left: 34%;" class="form-control" id="exampleInputEmail1" name="taikhoan" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password</label>
					<input type="password" style="width:32%;margin-left: 34%;" class="form-control" id="exampleInputPassword1" name="password">
				</div>
				<button type="submit" class="btn btn-primary" name="login">Submit</button>
			</form>
			<?php
			$link = new mysqli('localhost', 'root', '', 'sinhvien') or die('Failed!');
			mysqli_query($link, 'SET NAMES UTF8');
			if (isset($_POST['login'])) {
				if (empty($_POST['taikhoan']) or empty($_POST['password'])) {
					echo ' </br> <p style="color:red"> vui lòng nhập đầy đủ username và password !</p>';
				} else {
					$username = $_POST['taikhoan'];
					$password = $_POST['password'];
					$query = "SELECT * FROM dangnhap where account = '$username' and password = '$password'";
					$result = mysqli_query($link, $query);
					$num = mysqli_num_rows($result);
					if ($num == 0) {
						echo '</br> <p style="color:red"> Sai tên đăng nhập hoặc mật khẩu ! </p>';
					} else {

						$_SESSION['username'] = $username;
						header('location:index.php');
					}
				};
			};

			?>
		</div>
	</div>
	<!--endbody-->
	<footer style="position: fixed;bottom: 10px;left:45%">
		<div class="container">
			<div id="ftcontent">Made by Hy & Fap & Trum</div>
		</div>
	</footer>
</body>

</html>