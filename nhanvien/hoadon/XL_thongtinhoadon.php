<?php
	//var_dump($_SESSION);
	//var_dump($_POST);
	$tb = "";
	$dp = new datphongModel($conn);
	$lkh = new loaikhachhangModel($conn);
	$dsloaikhach = $lkh->docdanhsachloaikhach();
	$p_dp = new p_dpModel($conn);
	$hd = new hoadonModel($conn);
	$ts = new thamsoModel($conn);
	$ds_ts = $ts->docdanhsach();
	$ltt = new loaithanhtoanModel($conn);
	$ds_ltt = $ltt->docdanhsach();
	$p_hd = new p_hdModel($conn);
	$tb = "";
	$p = new phongModel($conn);

	$dsphong = $p_dp->timkiemphongtheoID($_GET['id']);

	$songaythue = 0;


	// if(!isset($_SESSION['thanhtoan']))
	// {
	// 	$_SESSION['thanhtoan'] = array();
	// 	//$_SESSION['dsphong'] = array();
	// }
	
	

	if(isset($_POST['btn_luuhoadon'])&&$_POST['btn_luuhoadon'])
	{
		$ktr = true;

		$day = date('ymd-His');
		$hoadonID = 'hd-'.$day;
		$hd->ID = $hoadonID;
		$hd->tenkhachhang = $_POST['tenkhachhang'];
		$hd->tennguoithanhtoan = $_POST['tennguoithanhtoan'];
		$hd->datphongID = $_POST['datphongID'];
		$hd->diachinguoithanhtoan = $_POST['diachinguoithanhtoan'];
		$hd->MST = $_POST['MST'];
		$hd->stk = $_POST['stk'];
		$hd->loaithanhtoan = $_POST['loaithanhtoan'];
		$hd->ngaydatphong = $_POST['ngaydatphong'];
		$hd->ngayketthuc = $_POST['ngayketthuc'];
		$hd->tongtienthanhtoan = $_POST['tongtienthanhtoan'];
		$hd->tongtiensauthue = $_POST['tongtiensauthue'];
		$hd->VAT = $_POST['VAT'];
		$hd->VATthanhtoan = $_POST['VATthanhtoan'];
		$hd->songaythue = $_POST['songaythue'];
		$hd->phuthuloaikhach = $_POST['phuthuloaikhach'];
		$hd->CMND = $_POST['CMND'];


		//var_dump($dsphong);
		foreach ($dsphong as $key => $value) {
			//$p_hd = new p_hdModel($conn);
			$p_hd->hoadonID = $hoadonID; 
			$p_hd->phongID = $value['phongID'];
			$p_hd->tenphong = $value['tenphong'];
			$p_hd->loaiphong = $value['loaiphong'];
			$p_hd->giaphong = $value['giaphong'];
			$p_hd->soluongkhach = $value['soluong'];
			$p_hd->giaphong = $value['giaphong'];
			$p_hd->songaythue = $_POST['songaythue'];

			$thanhtien = 1;
			$phuthusoluong = 1;
			$thanhtien = $value['giaphong'] * $_POST['songaythue'];
			if($value['soluong']>$value['soluongtoida'])
			{
				$phuthusoluong = $ds_ts[0]['giatri'];
				
				
			}
			$p_hd->phuthusoluong = $phuthusoluong;
			$p_hd->thanhtien = $thanhtien*$phuthusoluong;		
			//$p = new phongModel($conn);
			if(!$p->thaydoitrangthaiphong($value['phongID']))
			{
				$ktr = false;
				break;
			}
			if($ktr==true)
			{
				if(!$p_hd->luup_hd())
				{
					$ktr = false;
					break;
				}
			}
			//var_dump($p_hd);
		}
		if($ktr==true)
		{
			if(!$dp->thaydoiActive($_POST['datphongID'])&&$ktr==true)
			{
				$ktr = false;
			}
		}
		if($ktr==true)
		{
			if(!$hd->luuhd()&&$ktr==true)
			{
				$ktr = false;
			}
		}	
		if($ktr==true)
		{
			$tb = "Lưu thành công";
		}
		else{
			$tb = "Lưu thất bại";
		}

		$tenkhachhang = $_POST['tenkhachhang'];
		$tennguoithanhtoan = $_POST['tennguoithanhtoan'];
		$datphongID = $_POST['datphongID'];
		$diachinguoithanhtoan = $_POST['diachinguoithanhtoan'];
		$MST = $_POST['MST'];
		$stk = $_POST['stk'];
		$loaithanhtoan = $_POST['loaithanhtoan'];
		$ngaydatphong = $_POST['ngaydatphong'];
		$ngayketthuc = $_POST['ngayketthuc'];
		$tongtienthanhtoan = $_POST['tongtienthanhtoan'];
		$tongtiensauthue = $_POST['tongtiensauthue'];
		$VAT = $_POST['VAT'];
		$VATthanhtoan = $_POST['VATthanhtoan'];
		$songaythue = $_POST['songaythue'];




	}

	if(isset($_POST['btn_xn_thanhtoan'])&&$_POST['btn_xn_thanhtoan'])
	{
		//$CMND = $_POST['CMND'];
		$datphongID = $_POST['id'];
		$tenkhachhang = $_POST['tenkhachhang'];
		$tennguoithanhtoan = $_POST['tennguoithanhtoan'];
		$MST = $_POST['MST'];
		if(isset($_POST['stk']))
		{
			$stk = $_POST['stk'];
		}
		else
		{
			$stk = "";
		}
		$thanhtoanID = $_POST['thanhtoanID'];
		$diachinguoithanhtoan = $_POST['diachinguoithanhtoan'];
		foreach($ds_ltt as $key=>$value)
		{
			if($value['ID']==$thanhtoanID)
			{
				//$thanhtoanID = $_POST['loaithanhtoan'];
				$loaithanhtoan = $value['loaithanhtoan'];
			}
		}
	}
	
	if(isset($_GET['id'])&&!empty($_GET['id']))
	{
		// $datphongID = $_POST['id'];
		// $tenkhachhang = $_POST['tenkhachhang'];
		// $tennguoithanhtoan = $_POST['tennguoithanhtoan'];
		// $MST = $_POST['MST'];
		// if(isset($_POST['stk']))
		// {
		// 	$stk = $_POST['stk'];
		// }
		// else
		// {
		// 	$stk = "";
		// }
		// $thanhtoanID = $_POST['thanhtoanID'];
		// $diachinguoithanhtoan = $_POST['diachinguoithanhtoan'];
		// foreach($ds_ltt as $key=>$value)
		// {
		// 	if($value['ID']==$thanhtoanID)
		// 	{
		// 		//$thanhtoanID = $_POST['loaithanhtoan'];
		// 		$loaithanhtoan = $value['loaithanhtoan'];
		// 	}
		// }
		$VAT = $ds_ts[2]['giatri'];
		$dp = $dp->timkiemtheoID($_GET['id']);
		//$dsphong = $p_dp->timkiemphongtheoID($_GET['id']);
		$date1 = date_create($dp->ngaydatphong);
		$date2 = date_create($dp->ngayketthuc);
		
		$songaythue = date_diff($date1,$date2);
		

		$ds_thanhtoan = $dsphong;
		$tongtienthanhtoan = 0;
		$phuthuloaikhach = 1.00;
		if($dp->loaikhachID==2){
			$phuthuloaikhach = $ds_ts[1]['giatri'];
		}


		//var_dump($ds_thanhtoan);
		foreach ($ds_thanhtoan as $key => $value) {
			$thanhtien = 1;
			$phuthusoluong = 1.00;
			$thanhtien = $value['giaphong'] * $songaythue->days;
			if($value['soluong']>$value['soluongtoida'])
			{
				$phuthusoluong = $ds_ts[0]['giatri'];						
			}
			$thanhtien = $thanhtien*$phuthusoluong;
			$ds_thanhtoan[$key]['phuthusoluong'] = $phuthusoluong;
			$ds_thanhtoan[$key]['thanhtien'] = $thanhtien;
			
			
			$tongtienthanhtoan+=$thanhtien;
		}	

		$tongtienthanhtoan*=$phuthuloaikhach;
		$VATthanhtoan = $tongtienthanhtoan*$VAT;
		$tongtiensauthue = $tongtienthanhtoan+$VATthanhtoan;
	}

 ?>