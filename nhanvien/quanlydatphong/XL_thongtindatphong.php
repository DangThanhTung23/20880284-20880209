<?php
	$tb = "";
	$dp = new datphongModel($conn);
	$lkh = new loaikhachhangModel($conn);
	$dsloaikhach = $lkh->docdanhsachloaikhach();
	$p_dp = new p_dpModel($conn);
	$tb = "";


	if(isset($_GET['id_delete'])&&$_GET['id_delete']>0)
	{
		$p_dp->xoap_dp($_GET['id_delete'],$_GET['id']);
	}
	if(isset($_GET['id'])&&!empty($_GET['id']))
	{
		$dp = $dp->timkiemtheoID($_GET['id']);
		$dsphong = $p_dp->timkiemphongtheoID($_GET['id']);
		//var_dump($dsphong);
	}
	
	// if(isset($_POST['btn_luudatphong'])&&($_POST['btn_luudatphong']))		
	// {
		
	// 	$dp->tenkhachhang = $_POST["tenkhachhang"];
	// 	$dp->ngaydatphong = $_POST["ngaydatphong"];
	// 	$dp->ngayketthuc = $_POST["ngayketthuc"];
	// 	$dp->diachikhachhang = $_POST['diachikhachhang'];
	// 	$dp->phongID = $_POST['phongID'];
	// 	$u->thanhtoan = $_POST["thanhtoan"];
		
	// 	if($dp->luudatphong() ===true)
	// 	{
	// 		$tb = "Đã đặt phòng thành công";
	// 	}
	// 	else
	// 	{
	// 		$tb="Dữ liệu nhập có vấn đề";
	// 	}
	// }
	
	if(isset($_POST['btn_update'])&&$_POST['btn_update'])
	{	
		
		$dp->id = $_POST['id'];
		$dp->tenkhachhang = $_POST["tenkhachhang"];
		$dp->ngaydatphong = $_POST["ngaydatphong"];
		$dp->ngayketthuc = $_POST["ngayketthuc"];
		$dp->diachikhachhang = $_POST['diachikhachhang'];
		$dp->CMND = $_POST['CMND'];
		$dp->sdt = $_POST['sdt'];
		$dp->loaikhachID = $_POST['loaikhachID'];
		//$dp->phongID = $_POST['phongID'];
		//$dp->thanhtoan = $_POST["thanhtoan"];
		$dp->id = $_POST["id"];

		if($dp->suadp())
		{
			$tb = "Đã update thành công";
		}
		else{
			$tb = "update thất bại";
		}
		
	}	
	//var_dump($dp);
				
 ?>