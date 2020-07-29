<!DOCTYPE html>
<html>
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','sinhvien') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');			
?>
<head>
    <meta charset="utf-8">
    <title>Add Class</title>
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
              <div id="main-contain" style="margin: auto;width: 50%"> 
				<h2>Add More Class</h2>
				
				<div class="form">
				<span style="font-size: 20px; color: red; font-style: italic"><b>Please fill in the form to change: </b> </span></br>
				</br>
				<form method="post" >
					<div class="form-group">
						<label>Class</label>
						<input type="text" class="form-control" name="ten" />
					</div>
					<div class="form-group">
						<label>Teacher's Name</label>
						<input type="text" class="form-control" name="GVCN" />
					</div>
					<label >Class</label>
							<select class="form-control" name="phonghoc">
							<option>P.101</option>
										<option>P.102</option>
										<option>P.103</option>
										<option>P.201</option>
										<option>P.202</option>
										<option>P.203</option>
										<option>P.301</option>
										<option>P.302</option>
										<option>P.303</option>
							</select>
						<button type="submit" class="btn btn-primary " name="them" style="margin-top: 10px">Submit</button>
				</form>
					
					
					
					<?php
						$link = new mysqli('localhost','root','','sinhvien') or die('kết nối thất bại '); 
						mysqli_query($link, 'SET NAMES UTF8');
						
						if(isset($_POST['them'])){
							if(empty($_POST['ten']) or empty($_POST['GVCN']) or empty($_POST['phonghoc'])) {echo'</br> <p style="color:red; "> Bạn chưa nhập thông tin đầy đủ ! </p> </br>';}
							else{
							$lop = $_POST['ten'];
							$GVchunhiem = $_POST['GVCN'];
							$phongHoc = $_POST['phonghoc'];
							$query = "INSERT INTO `lophoc`( `tenlop`, `chunhiem`, `phonghoc`) VALUES('$lop','$GVchunhiem','$phongHoc')";
							mysqli_query($link,$query) or die("thêm dữ liệu thất bại");
							header('location:./lop.php');
							}
						}
						
					?>
					<br>Chọn menu bên trái hoặc click vào <a href="./lop.php" style="color: blue; text-decoration:underline;font-weight:bold;">đây</a> để quay lại danh sách lớp.
					
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
	}
	else{
		header('location:login.php');
	}
?>