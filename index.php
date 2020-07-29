<?php
session_start();
if (isset($_SESSION['username'])) {

  // echo $_SESSION['username'];
  $link = new mysqli('localhost', 'root', '', 'sinhvien') or die('failed');
  mysqli_query($link, 'SET NAMES UTF8');
  $query = 'SELECT * FROM tintuc';
  $result = mysqli_query($link, $query);
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
    <marquee style="display:none" width="50%" scrollamount=”2″ behavior=”slide”>
      <?php
      if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while ($r = mysqli_fetch_assoc($result)) {
          $i++;
          $tin = $r['noidung'];
          echo $tin;
        }
      }
      ?>
    </marquee>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="width: 50%; margin: auto;margin-top: 5%">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image\anhcover.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="image\anhbia.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a style = "color:#606465" class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!--endbody-->
    <footer style="position: fixed; bottom: 2%;left:48%">
      Made by HPT
    </footer>
  </body>

  </html>

<?php

} else {
  header('location: login.php');
}
?>