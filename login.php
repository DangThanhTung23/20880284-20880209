<?php
  include "models/database.php";
  include "models/phongModel.php";
  include "models/loaiphongModel.php";
  include "models/trangthaiModel.php";
  include "models/userModel.php";
  include "lib/function.php";
  session_start();
  ob_start();
    
    $conn = new database();
    if(isset($_POST['btn_login'])&&$_POST['btn_login'])
    { 
      $username = $_POST['loginName'];
      $pass = $_POST['loginPassword'];
      $u = new userModel($conn);
      
      $arr = $u->timkiemuser($username,$pass);
      if(count($arr)>0)
      {
        $_SESSION['role'] = $u->role;
      }
      else
      {
        $_SESSION['role'] = 0;
        
      }
      if($_SESSION['role']==1)
      {
        $_SESSION["user"] = $u->user;
        $_SESSION["pass"] = $u->pass;
        header('location: admin/index.php');
      }
      if($_SESSION["role"]==2)
      {
        $_SESSION["user"] = $u->user;
        $_SESSION["pass"] = $u->pass;
        header('location: nhanvien/index.php');
      }
      
      
    } 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý khách sạn</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <a class="navbar-brand" href="index">Quản Lý Khách Sạn</a>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item ml-3">
                            <a class="nav-link text-dark" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item ml-3">
                            <a class="nav-link text-dark" href="index.php?action=datphong">Đặt phòng</a>
                        </li>
                        <li class="nav-item ml-3">
                            <a class="nav-link text-dark" href="index.php?action=lienhe">Liên hệ</a>
                        </li>
                        
                       <!--  <li class='nav-item' style="float: right;">
                            <a class="nav-link text-dark" href="index?action=login">Đăng nhập</a>
                        </li> -->
                        
                    </ul>
                </div>
                <div class="row">
                    <a class="nav-link text-dark" href="login">Đăng nhập</a>
                </div>
            </div>
        </nav>
    </header>
<body style="background-image: url(images/bg_home.jpg); background-size: cover;">
    <div class="container mt-5" style="width: 40%;">
      <div class="tab-content">
      <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form action="login.php" method="post">
          <div class="text-center mb-5 mt-3">
            <h1 class="mt-5 mb-5">Đăng nhập</h1>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="loginName" id="loginName" class="form-control" />
            <label class="form-label">Email or username</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="loginPassword" id="loginPassword" class="form-control" />
            <label class="form-label">Password</label>
          </div>

          <!-- 2 column grid layout -->
          <div class="row mb-4">
            <div class="col-md-6 d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check mb-3 mb-md-0">
                <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                <label class="form-check-label" for="loginCheck"> Remember me </label>
              </div>
            </div>

            <div class="col-md-6 d-flex justify-content-center">
              <!-- Simple link -->
              <!-- <a href="#!">Forgot password?</a> -->
            </div>
          </div>

          <!-- Submit button -->
          <input type="submit" name='btn_login' class="btn btn-primary btn-block mb-4">Sign in</input>

          <!-- Register buttons -->
          <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>

    <footer class="border-top footer text-muted">
        <div class="container">
            &copy; 2023 - _20880284_20880209 - <a asp-area="" asp-page="/Privacy">Privacy</a>
        </div>
    </footer>

    
    <!-- Thư viện jQuery (dammio.com) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>

    <!-- JavaScript biên dịch mới nhất -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>
