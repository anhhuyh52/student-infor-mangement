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
      <h2 style="margin-left: 43%;
    margin-top: 2%">Class List </h2><br>
      <div id="listSV" style="width:70%;margin: auto">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">class</th>
              <th scope="col">Teacher</th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
            <?php

            $query = "SELECT * FROM lophoc";
            $result = mysqli_query($link, $query);
            if (mysqli_num_rows($result) > 0) {
              $i = 0;
              while ($r = mysqli_fetch_assoc($result)) {
                $i++;
                $idlop = $r['lopID'];
                $lop = $r['tenlop'];
                $GVchunhiem = $r['chunhiem'];
                // $phongHoc=$r['phonghoc'];

                echo "<tr> ";
                echo "<td>$i</td>";
                echo "<td>$lop</td>";
                echo "<td>$GVchunhiem</td>";
                // echo "<td>$phongHoc</td>";	
                echo " <td style = 'padding-left:0'> <a href='sualop.php?id=$idlop'><button class='btn btn-primary'> Edit </button></a><a href='xoalop.php?id=$idlop' style='margin-left: 5px ' <button class='btn btn-danger'> Delete </button></a>  <a href='dslop.php?id=$idlop'><button class='btn btn-info'> Details </button></a> </td>";
              }
            }
            ?>
          </tbody>
        </table>
      </div>
        <a href="themlop.php"><button class="btn btn-primary" style="margin-left: 43%;
    margin-top: 2%;">Add More Class</button></a>
    </div>
    </div>
    </div>
    <!--endbody-->
    <footer style="position: fixed; bottom: 1%; left: 47%">
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