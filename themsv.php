<!DOCTYPE html>
<html>
<?php
session_start();
if (isset($_SESSION['username'])) {
	$link = new mysqli('localhost', 'root', '', 'sinhvien') or die('kết nối thất bại ');
	mysqli_query($link, 'SET NAMES UTF8');
?>

	<head>
		<meta charset="utf-8">
		<title>Add Student</title>
		<link rel="stylesheet" href="style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="image/logo.ico">
		<script src="https://kit.fontawesome.com/6161a2d888.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

	</head>

	<body>
		<header>
			<a href="index.php" style="display: flex; justify-content: center;margin-top: 1%;margin-bottom:1%">
				<img src="image\school.png" alt="student manager" style="width: 3%">
			</a>
		</header>
		<!--endheader-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 12px;">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active" style="margin-left:150px">
						<a class="nav-link" id="current" href="index.php"><i class="fas fa-home"></i> Home</a>
					</li>
					<li class="nav-item" style="margin-left:150px">
						<a class="nav-link" href="lop.php"><i class="fas fa-user-friends"></i> Class</a>
					</li>
					<li class="nav-item" style="margin-left:150px">
						<a class="nav-link" href="sinhvien.php"><i class="fas fa-marker"></i> Student</a>
					</li>
					<li class="nav-item" style="margin-left:150px">
						<a class="nav-link" href="diemthi.php"><i class="fas fa-user"></i> Student's Results</a>
					</li>
					<li class="nav-item" style="margin-left:150px">
						<a class="nav-link" href="giangvien.php"><i class="fas fa-chalkboard-teacher"></i> TEACHER</></a>
					</li>
					<a style="margin-left:150px" href="dangxuat.php"><button class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-sign-out-alt"></i> Log Out</button>
					</a>
			</div>
		</nav>
		<div id="main-contain">
			<h2 style="margin-left: 45%;margin-top:3%">Add Student</h2>
			<div class="form" style="width:40%;margin:auto">
				<form method="post" class="form-group">
					<label>Họ tên </label>
					<input type="text" name="ten" class="form-control">
					<label>Ngày sinh </label>
							<input type="date" name="ngaysinh" class="form-control">
							<label>Số điện thoại </label>
									<input type="text" name="sdt" class="form-control">
									<label>MaSV</label>
											<input type="text" name="masv" class="form-control">
											<label>Quê quán </label>
													<input type="text" name="quequan" class="form-control">
													<label>So Truong </label>
															<input type="text" name="sotruong" class="form-control">
															<label>Lop</label>
															<select name="lop" class="form-control" style="width: 12%;">
																<?php
																$q = "SELECT * FROM lophoc";
																$rs = mysqli_query($link, $q);
																if (mysqli_num_rows($rs) > 0) {
																	$i = 0;
																	while ($row  = mysqli_fetch_assoc($rs)) {
																		$i++;
																		$lopID = $row['lopID'];
																		$tenlop = $row['tenlop'];

																		// echo $tenlop;
																		echo "<option value= '$lopID'>$tenlop</option>";
																	}
																}
																?>
															</select>
															<button type="submit" name="them" class="btn btn-success" style="margin-top: 10px"> Add </button>

				</form>



				<?php
				if (isset($_POST['them'])) {
					if (empty($_POST['ten']) or empty($_POST['ngaysinh']) or empty($_POST['sdt']) or empty($_POST['quequan'])) {
						echo '<p style="color:red;font-weight:bold; "> Bạn chưa nhập thông tin đầy đủ !</p> ';
					} else {
						$hotenSV = $_POST['ten'];
						$ngaySinh = $_POST['ngaysinh'];
						$lopID = $_POST['lop'];
						$sdt = $_POST['sdt'];
						$queQuan = $_POST['quequan'];
						$masv = $_POST['masv'];
						$sotruong = $_POST['sotruong'];
						$query = "INSERT INTO `sinhvien`( `name`, `lopID`,`birthday`, `phonenumber`, `address`,`MaSV`,`so_truong`) VALUES('$hotenSV','$lopID','$ngaySinh','$sdt','$queQuan','$masv','$sotruong')";
						mysqli_query($link, $query) or die("thêm dữ liệu thất bại");
						header('location:./sinhvien.php');
					}
				}
				?>
				<br>
				Click<a href="./sinhvien.php" style="color: blue; text-decoration:underline; font-weight:bold;"> here </a> to return.
				<br>
				<br>


			</div>

		</div>

		</div>

		</div>
		<!--endbody-->
		<footer>
			<div class="container">
			</div>
		</footer>

	</body>

</html>
<?php
} else {
	header('location:login.php');
}
?>