	<?php
session_start();
ob_start();
if(isset($_SESSION['role'])&&$_SESSION['role']==2)
{
	include "../models/database.php";
	include "../models/phongModel.php";
	include "../models/loaiphongModel.php";
	include "../models/trangthaiModel.php";
	include "../models/userModel.php";
	include "../models/datphongModel.php";
	include "../models/p_dpModel.php";
	include "../models/loaikhachhangModel.php";
	include "../models/hoadonModel.php";
	include "../models/thamsoModel.php";
	include "../models/loaithanhtoanModel.php";
	include "../models/p_hdModel.php";

	include "../lib/function.php";

	include("header.php");
	$conn = new database();

	$title = "";
	$body = "";
	$action = "";
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}
	date_default_timezone_set("Asia/Bangkok");
	switch ($action) {
//quan ly dat phong
		case "quanlydatphong":
			include "quanlydatphong/XL_quanlydatphong.php";
			include "quanlydatphong/load_quanlydatphong.php";
			break;

		case "xoadp":

			include "quanlydatphong/XL_xoadatphong.php";
			include "quanlydatphong/XL_quanlydatphong.php";
			include "quanlydatphong/load_quanlydatphong.php";
			
			break;

		case "chitiet":
			include "quanlydatphong/XL_thongtindatphong.php";
			include "quanlydatphong/load_thongtindatphong.php";
			//include "quanlydatphong/load_dsphong.php";
			break;




//datphong
		case "datphong":
			include "datphong/XL_datphong.php";
			include "datphong/load_datphong.php";
			break;





//thanh toán
		case "thanhtoan":
			include "hoadon/XL_thanhtoan.php";
			include "hoadon/load_thanhtoan.php";
			break;

		case "thongtinhoadon":
			include "hoadon/XL_thongtinhoadon.php";
			include "hoadon/load_thongtinhoadon.php";
			break;

		case "hoadon":
			include "hoadon/XL_danhmuchoadon.php";
			include "hoadon/load_danhmuchoadon.php";
			break;

		case "chitiethoadon":
			include "hoadon/XL_chitiethoadon.php";
			include "hoadon/load_chitiethoadon.php";
			break;


		case "xoahoadon":
			include "hoadon/XL_xoahoadon.php";
			include "hoadon/load_danhmuchoadon.php";
			break;

		case "thongke":
			include "thongke/XL_thongke.php";
			include "thongke/load_thongke.php";
			break;





		
//tài khoản
		case "taikhoan":
			include "taikhoan/taikhoan.php";
			break;

		



		
		
		case "exitNhanvien":
			header('location: ../login.php');
			unset($_SESSION['role']);
			unset($_SESSION['user']);
			unset($_SESSION['pass']);

			break;

		
		default:
			include "datphong/XL_datphong.php";
			include "datphong/load_datphong.php";
			
			break;
	}
	$conn->close_conn();

	
	$header = file_get_contents("header.php");
	$header = str_replace("{{title}}", $title, $header);
	// $page = str_replace("{{body}}",$body,$page);
	
	//include "footer.php";

	}
	else{
		header('location: ../index');
	}
	
 ?>