<?php
	include "models/database.php";
	include "models/phongModel.php";
	include "models/loaiphongModel.php";
	include "models/trangthaiModel.php";
	include "models/userModel.php";
	include "models/datphongModel.php";
	include "models/p_dpModel.php";
	include "models/loaikhachhangModel.php";
	include "models/hoadonModel.php";
	include "models/thamsoModel.php";
	include "models/loaithanhtoanModel.php";
	include "models/p_hdModel.php";
	ob_start();
	session_start();

	include("header.php");
	//$conn = new database();

	$title = "Quản lý khách sạn";
	$body = "";
	$action = "";
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

	switch ($action) {
		case "home":
			include('khachhang/home/home.php');
			break;
			
		case "datphong":
			include('khachhang/datphong/XL_datphong.php');
			include('khachhang/datphong/load_datphong.php');
			break;


		case "lienhe":
			break;
			
		
		default:
			include('khachhang/home/home.php');
			break;
	}
	

	include("footer.php");
	$header = file_get_contents("header.php");
	$header = str_replace("{{title}}", $title, $header);
	// $page = str_replace("{{body}}",$body,$page);
 ?>