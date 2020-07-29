<?php
session_start();
if (isset($_SESSION['username'])) {
	$link = new mysqli('localhost', 'root', '', 'sinhvien') or die('kết nối thất bại ');
	mysqli_query($link, 'SET NAMES UTF8');
	$query = 'SELECT * FROM sinhvien WHERE sinhvienID = "' . $_GET['id'] . '"';
	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
		while ($r = mysqli_fetch_assoc($result)) {
			$i++;
			$ten = $r['name'];
			$ngaysinh = $r['birthday'];
			$sdt = $r['phonenumber'];
			$quequan = $r['address'];
		}
	}
	//echo $query;

?>
	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<title>SM - Trang chủ</title>
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
				<img src="image\school.png" alt="studentmanager" style="width: 3%">
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
		</div>
		<div id="main-contain" style="margin: auto; width: 50%">
			<h2>Change Student's Info</h2>
			<div class="form">
				<span style="font-size: 20px; color: red; font-style: italic"><b>Change <?php echo $ten ?>'s Info: </b> </span> </br>
				(Chú ý điền đủ thông tin)
				</br></br>
				<form method="POST">
					<div class="form-group">
						<label></label>Full Name</labelFull>
						<input type="text" class="form-control" id="exampleInputEmail1" name="ten" value="<?php echo $ten; ?>">
					</div>
					<div class="form-group">
						<label>Birthday</label>
						<input type="date" class="form-control" name="ngaysinh" value="<?php echo $ngaysinh; ?>">
					</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" class="form-control" name="sdt" value="<?php echo $sdt; ?>">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="quequan" value="<?php echo $quequan; ?>">
					</div>
					<button type="submit" name="sua" class="btn btn-primary">Submit</button>
				</form>
				<br>Click<a href="sinhvien.php" style="color: blue; text-decoration:underline"> here </a> to return.
				<?php
				if (isset($_POST['sua'])) {
					if (empty($_POST['ten']) or empty($_POST['ngaysinh']) or empty($_POST['sdt']) or empty($_POST['quequan'])) {
						echo '</br> <p style="color:red;font-weight:bold; "> vui lòng không để trống các trường!</p> </br>';
					} else {
						$id = $_GET['id'];
						$hotenSV = $_POST['ten'];
						$ngaySinh = $_POST['ngaysinh'];
						$sDt = $_POST['sdt'];
						$queQuan = $_POST['quequan'];
						$query = "UPDATE `sinhvien` SET name = '$hotenSV', birthday = '$ngaySinh', phonenumber = '$sDt', address = '$queQuan' WHERE sinhvienID = '$id'";
						mysqli_query($link, $query) or die("sửa không thành công");
						header('location:./sinhvien.php');
					}
				}
				?>

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
	header('location:../login.php');
}
?>