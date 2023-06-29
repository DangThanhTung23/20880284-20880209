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
	include "../models/dichvuModel.php";
	include "../models/dv_dpModel.php";


	include "../lib/function.php";

	include("header.php");
	
	$phantrang = "";
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
			unset($_SESSION['dichvu']);
			include "quanlydatphong/XL_quanlydatphong.php";
			include "quanlydatphong/load_quanlydatphong.php";
			break;

		// case "xoadp":

		// 	include "quanlydatphong/XL_xoadatphong.php";
		// 	include "quanlydatphong/XL_quanlydatphong.php";
		// 	include "quanlydatphong/load_quanlydatphong.php";
			
		// 	break;

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


		// case "xoahoadon":
		// 	include "hoadon/XL_xoahoadon.php";
		// 	include "hoadon/XL_danhmuchoadon.php";
		// 	include "hoadon/load_danhmuchoadon.php";
		// 	break;

		case "thongke":
			include "thongke/XL_thongke.php";
			include "thongke/load_thongke.php";
			break;
		
		case "quydinh":	
			include "quydinh/XL_quydinh.php";
			include "quydinh/load_quydinh.php";
			break;

		
	
	
		// case "xoathamso":
		// 	$ts = new thamsoModel();
		// 	if(isset($_GET["id"])&&$_GET['id']>0)
		// 	{
		// 		$ts->xoathamso($_GET['id']);
		// 	}		
		// 	include "quydinh/XL_quydinh.php";
		// 	include "quydinh/load_quydinh.php";
		// 	break;
	
		case "suathamso":
			// $thamso = "";
    		// $giatrithamso = "";
			if(isset($_GET["id"])&&$_GET["id"]>0){
				$ts = new thamsoModel();
				$ts->timkiemtheoID($_GET["id"]);
				$thamso = $ts->thamso;
				$giatrithamso = $ts->giatri;
				
				$id = $ts->id;
			}
			include "quydinh/XL_quydinh.php";
			include "quydinh/load_quydinh.php";
			break;
			
		case "xoadichvu":
			$dv = new dichvuModel();
			if(isset($_GET["id"])&&$_GET['id']>0)
			{
				$dv->xoadichvu($_GET['id']);
			}		
			include "quydinh/XL_quydinh.php";
			include "quydinh/load_quydinh.php";
			break;
	
		case "suadichvu":
			// $thamso = "";
    		// $giatrithamso = "";
			if(isset($_GET["id"])&&$_GET["id"]>0){
				$dv = new dichvuModel();
				$dv->timkiemtheoID($_GET["id"]);
				$dichvu = $dv->tendichvu;
				$giatridichvu = $dv->giatri;
				$donvi = $dv->donvi;
				
				$id = $dv->id;
			}
			include "quydinh/XL_quydinh.php";
			include "quydinh/load_quydinh.php";
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
			//session_unset();
			break;

		
		default:
			include "datphong/XL_datphong.php";
			include "datphong/load_datphong.php";
			
			break;
	}
	

	
	$header = file_get_contents("header.php");
	$header = str_replace("{{title}}", $title, $header);
	// $page = str_replace("{{body}}",$body,$page);
	
	include "footer.php";

	}
	else{
		header('location: ../index.php');
	}
	
 ?>