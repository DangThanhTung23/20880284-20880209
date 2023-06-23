<?php
session_start();
ob_start();
if(isset($_SESSION['role'])&&$_SESSION['role']==1)
{
	
	include "../models/database.php";
	include "../models/phongModel.php";
	include "../models/loaiphongModel.php";
	include "../models/trangthaiModel.php";
	include "../models/userModel.php";

	include "../lib/function.php";

	include("header.php");
	

	$title = "";
	$body = "";
	$action = "";
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

	switch ($action) {
		case "danhmucphong":
			$title = "Quản lý phòng";
			include "danhmucphong/docdsphong.php";
			include "danhmucphong/load_danhmucphong.php";
			break;


		case "thongtinphong":
			$title="Quản lý phòng";
			// $body = file_get_contents("danhmucphong/add.php");
			$p = new phongModel();
			$tt = new trangthaiModel();
			$lp = new loaiphongModel();
			$dstrangthai = $tt->docdanhsachtrangthai();
			$dsloaiphong = $lp->docdanhsachloaiphong();

			include "danhmucphong/themvacapnhatthongtinphong.php";
			include "danhmucphong/load_thongtinphong.php";	
			break;


		case "xoaphong":
			if(isset($_GET["id"])&&$_GET["id"]>0)
			{
				$p = new phongModel();
				$p->xoaphong($_GET["id"]);

			}
			include "danhmucphong/docdsphong.php";
			include "danhmucphong/load_danhmucphong.php";
			break;

		case "suaphong":
			$tb="";
			$p = new phongModel();
			$tt = new trangthaiModel();
			$lp = new loaiphongModel();
			$dstrangthai = $tt->docdanhsachtrangthai();
			$dsloaiphong = $lp->docdanhsachloaiphong();

			if(isset($_GET["id"])&&$_GET["id"]>0)
			{
				$p = new phongModel();
				$p->timkiemtheoid($_GET["id"]);
				include "danhmucphong/load_thongtinphong.php";
			}
			break;


		case "danhmucuser":
			include "danhmucuser/docdsuser.php";
			include "danhmucuser/load_danhmucuser.php";
			break;


		case "thongtinuser":
			// $body = file_get_contents("danhmucphong/add.php");
			$u = new userModel();

			$dsrole = userModel::$dsrole;
			// var_dump($dsrole);

			include "danhmucuser/themvacapnhatthongtinuser.php";
			include "danhmucuser/load_thongtinuser.php";	
			break;


		case "xoauser":
			if(isset($_GET["id"])&&$_GET["id"]>0)
			{
				$u = new userModel();
				$u->xoauser($_GET["id"]);

			}
			include "danhmucuser/docdsuser.php";
			include "danhmucuser/load_danhmucuser.php";
			break;

		case "suauser":
			$tb="";
			$u = new userModel();
			
			$dsrole = userModel::$dsrole;
			if(isset($_GET["id"])&&$_GET["id"]>0)
			{
				$u = new userModel();
				$u->timkiemtheoid($_GET["id"]);
				include "danhmucuser/load_thongtinuser.php";
			}
			break;









		case "danhmucloaiphong":
			$lp = new loaiphongModel();
			if(isset($_POST["btn_luuloaiphong"])&&$_POST["btn_luuloaiphong"])
			{
				$lp->loaiphong = $_POST['loaiphong'];
				$lp->luuloaiphong();
			}
			if(isset($_POST["btn_sualoaiphong"])&&$_POST["btn_sualoaiphong"]&&$_POST["id"]>0)
			{
				$lp->id = $_POST["id"];
				$lp->loaiphong = $_POST["loaiphong"];
				$lp->sualoaiphong();
			}
			include "danhmucloaiphong/ds_loaiphong.php";
			include "danhmucloaiphong/load_danhmucloaiphong.php";
			break;


		case "xoaloaiphong":
			$lp = new loaiphongModel();
			if(isset($_GET["id"])&&$_GET['id']>0)
			{
				$lp->xoaloaiphong($_GET['id']);
			}		
			include "danhmucloaiphong/ds_loaiphong.php";
			include "danhmucloaiphong/load_danhmucloaiphong.php";
			break;

		case "sualoaiphong":
			if(isset($_GET["id"])&&$_GET["id"]>0){
				$lp = new loaiphongModel();
				$lp->timkiemtheoID($_GET["id"]);
				$txt_loaiphong = $lp->loaiphong;
				$txt_id = $lp->id;
			}
			include "danhmucloaiphong/ds_loaiphong.php";
			include "danhmucloaiphong/load_danhmucloaiphong.php";
			break;


		



		case "danhmuctrangthai":
			$tt = new trangthaiModel();
			if(isset($_POST['btn_luutrangthai'])&&$_POST['btn_luutrangthai'])
			{
				$tt->trangthai = $_POST['trangthai'];
				$tt->luutrangthai();
			}
			if(isset($_POST['btn_suatrangthai'])&&$_POST['btn_suatrangthai']&&$_POST["id"]>0)
			{
				$tt->trangthai = $_POST["trangthai"];
				$tt->id = $_POST["id"];
				$tt->suatrangthai();			
			}
			
			include "danhmuctrangthai/ds_trangthai.php";
			include "danhmuctrangthai/load_danhmuctrangthai.php";			
			break;


		case "xoatrangthai":	
			if(isset($_GET["id"])&&$_GET['id']>0)
			{
				$tt = new trangthaiModel();
				$tt->xoatrangthai($_GET['id']);
			}
			include "danhmuctrangthai/ds_trangthai.php";
			include "danhmuctrangthai/load_danhmuctrangthai.php";
					
			break;

		case "suatrangthai":
			if(isset($_GET["id"])&&$_GET["id"]>0){
				
				$tt = new trangthaiModel();
				$tt->timkiemtheoID($_GET["id"]);
				$txt_trangthai = $tt->trangthai;
				$txt_id = $tt->id;
			}
			
			include "danhmuctrangthai/ds_trangthai.php";
			include "danhmuctrangthai/load_danhmuctrangthai.php";
			break;



		case "taikhoan":
			include "taikhoan/taikhoan.php";
			break;
		
		case "exitAdmin":
			header('location: ../login.php');
			unset($_SESSION['role']);
			unset($_SESSION['user']);
			unset($_SESSION['pass']);
			//session_unset();
			break;

		
		default:
			include "danhmucuser/docdsuser.php";
			include "danhmucuser/load_danhmucuser.php";
			$title = "Trang chủ Admin";
			break;
	}
	
	include("footer.php");
	$header = file_get_contents("header.php");
	$header = str_replace("{{title}}", $title, $header);
	// $page = str_replace("{{body}}",$body,$page);
	


	}
	else{
		header('location: ../index');
	}
	
 ?>