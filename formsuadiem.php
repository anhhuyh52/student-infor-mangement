<!DOCTYPE html>
<html>
<?php
session_start();
if (isset($_SESSION['username'])) {
	$link = new mysqli('localhost', 'root', '', 'sinhvien') or die('kết nối thất bại ');
	mysqli_query($link, 'SET NAMES UTF8');
	$query = 'SELECT * FROM sinhvien INNER JOIN diemthi ON sinhvien.sinhvienID = diemthi.sinhvienID WHERE sinhvien.sinhvienID = "' . $_GET['id'] . '"';

	$result = mysqli_query($link, $query);
	if (mysqli_num_rows($result) > 0) {
		$i = 0;
		while ($r = mysqli_fetch_assoc($result)) {
			$i++;
			$sinhvienID = $r['sinhvienID'];
			$ten = $r['name'];
			$ltud = $r['ltud'];
			$ltvm = $r['ltvm'];
			$htvt = $r['htvt'];
			$htcm = $r['htcm'];
		}
	}

?>

	<head>
		<meta charset="utf-8">
		<title>Edit Results</title>
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
			<h2 style="margin-top:2%;margin-left:45%">Change Result</h2>

			<div class="form" style="margin:auto;width: 50%">
				</br></br>
				<form method="post">
					<div class="form-group">
						<label>Họ tên </label>
						<?php echo $ten; ?></div>
					<div class="form-group">
						<label>Math </label>
						<input class="form-control" type="text" name="ltud" value="<?php echo $ltud; ?>"></div>
					<div class="form-group">
						<label>Algorithm</label>
						<input class="form-control" type="text" name="ltvm" value="<?php echo $ltvm; ?>"></div>
					<div class="form-group">
						<label>Law & Life</label>
						<input class="form-control" type="text" name="htvt" value="<?php echo $htvt; ?>"></div>
					<div class="form-group">
						<label>Culture Of World</label>
						<input class="form-control" type="text" name="htcm" value="<?php echo $htcm; ?>"></div>
					<button type="submit" class="btn btn-success" name="suadiem">Submit</button>
				</form>
				<?php
				if (isset($_POST['suadiem'])) { {

						if ($ten = $svdiemthi) {
							echo "sinh viên đã có điểm";
						} else {
							$id = $_GET['id'];
							$ten = $_POST['ten'];
							$ltud = $_POST['ltud'];
							$ltvm = $_POST['ltvm'];
							$htvt = $_POST['htvt'];
							$htcm = $_POST['htcm'];
							$query = "UPDATE  diemthi SET ltud = '$ltud',  ltvm = '$ltvm',  htvt ='$htvt', htcm = '$htcm' WHERE sinhvienID = '$id'";
							mysqli_query($link, $query) or die("sửa dữ liệu thất bại");
							header('location:./suadiem.php');
						}
					}
				}
				?>
				<br>
				Click<a href="./xemdiem.php" style="color: blue; text-decoration:underline; font-weight:bold;"> here </a> to return.
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
	header('location:./login.php');
}

?>