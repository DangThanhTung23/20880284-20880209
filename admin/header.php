<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light border-bottom box-shadow mb-3" style="background-color: #e3f2fd;">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <a class="navbar-brand" href="index">Quản Lý Khách Sạn</a>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php?action=danhmucuser">Quản lý user</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php?action=danhmucphong">Quản lý phòng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php?action=danhmucloaiphong">Quản lý loại phòng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php?action=danhmuctrangthai">Quản lý trạng thái</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php?action=taikhoan">Tài khoản</a>
                        </li>
                        
                        
                    </ul>
                    <div class="row">
                        <span class="pt-2"><?php  echo $_SESSION['user'] ?></span><a class="ml-3" href="index?action=exitAdmin"><button class="btn btn-outline-success my-2 my-sm-0">Thoát</button></a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">