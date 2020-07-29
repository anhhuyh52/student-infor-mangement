
<?php
	
	session_start();
 	 if(isset($_SESSION['username'])){
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
			  <h2 style="margin-top:2%;margin-left:43% ;">Student</h2>
			  	<div id="thongtin" style="width: 50% ; margin: auto; display: flex;margin-top:2%">
			  			<div id="avtGiangvien">
			  				<?php 
			  						$link = new mysqli('localhost','root','','sinhvien') or die('kết nối thất bại '); 
									mysqli_query($link, 'SET NAMES UTF8');
			  						if (isset($_POST['upload'])){
			  						$file = $_FILES['avt'];
			  						// echo $file['name'];
			  						// exit();
			  						move_uploaded_file($file['tmp_name'],"upload/".$file['name']);
			  						$link_avt = $file['name'];
			  						$q = 'UPDATE sinhvien SET avt = "'.$link_avt.'" WHERE  sinhvienID = "'.$_GET['id'].'"';
			  						mysqli_query($link, $q) or die('không cập nhật được');
			  						echo "<div>Đã cập nhật</div>";
			  						}

				  					$query = 'SELECT * FROM sinhvien WHERE sinhvienID = "'.$_GET['id'].'" '; 
									$result = mysqli_query($link, $query);
									if( mysqli_num_rows($result) > 0 )
										{
											$i = 0; 
											while($r= mysqli_fetch_assoc($result))
											{
												$i++;
												$lopID = $r['lopID'];
												$masv=$r['sinhvienID'];
												$ten= $r['name'];
												$ngaysinhsql =$r['birthday'];
												$ngaysinh = date("d-m-Y", strtotime($ngaysinhsql));
												$sdt = $r['phonenumber'];
												$quequan = $r['address'];
												$sotruong = $r['so_truong'];
												$avt = $r['avt'];
											}
										}
																	
									$q = 'SELECT tenlop FROM lophoc WHERE lopID = "'.$lopID.'" '; 
									$rs = mysqli_query($link, $q);
									$r1= mysqli_fetch_assoc($rs);
									$tenlop = $r1['tenlop'];
									//echo $tenlop;
			  				
			  					if($avt == ""){
			  						echo '<img src= "image/test.jpg" width="200px" height="200px">';
			  					}
			  					else{
			  					echo '<img src= "upload/'.$avt.'" width="200px" height="200px">';
			  					}
			  					echo " <br><b> ".$ten."</b>";
			  					echo "<br> MSSV: ".$masv;
			  				?>
			  				<form method="post" name="upload_avt" enctype="multipart/form-data">
								  <input type="file" name = "avt" id="file" class="input_file">
								  <br>
			  					<button	class="btn btn-primary" style="margin-top: 10px;" type="submit" name = "upload">Upload</button>

			  				</form>
			  				
			  			</div>
			  			<div id="chi_tiet">
			  				 <?php
			  				  echo "<big>Họ tên: ";
			  				  echo $ten. "</big>";
							  echo "<br>Lớp: " .$tenlop. "<br>";
			  				  echo "<br>Ngày sinh: " .$ngaysinh. "<br>";
			  				  echo "Số điện thoại: " .$sdt . "<br>";
			  				  echo "Quê quán: " .$quequan . "<br>";
			  				  if ($sotruong == ""){
			  				  	echo 'Sở trường: Chưa cập nhật <br>
			  				  		<br><span style="color:red">Cập nhật sở trường:</span> <br>
						  			<form method="post">
									<input type = "text" name = "so_truong"/>
									<button type = "submit" name = "thaydoi">Change</button>';
								if(isset($_POST['thaydoi']))
										{
											$so_truong = $_POST['so_truong'];
											$query = "UPDATE sinhvien SET so_truong = '$so_truong' WHERE name = '$ten'";
											mysqli_query($link, $query) or die ('thay đổi không thành công');
											header('location:sinhvien.php');
											
										}

			  				  }
			  				  else 
			  				  echo "Sở trường: " .$sotruong . "<br>";
			  				?>
					<form>
			  			</div>
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
	else {
		header('location:login.php');
	}
?>