<?php
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
	$tb = "";
	$songaythue = 0;


	if(!isset($_SESSION['thanhtoan']))
	{
		$_SESSION['thanhtoan'] = array();
		//$_SESSION['dsphong'] = array();
	}
	if(isset($_GET['id'])&&!empty($_GET['id']))
	{
		$dp = $dp->timkiemtheoID($_GET['id']);
		$dsphong = $p_dp->timkiemphongtheoID($_GET['id']);
		$date1 = date_create($dp->ngaydatphong);
		$date2 = date_create($dp->ngayketthuc);
		
		$songaythue = date_diff($date1,$date2);
		

		$ds_thanhtoan = $dsphong;
		$tongtienthanhtoan = 0;
		$phuthuloaikhach = 1;
		if($dp->loaikhachID==2){
			$phuthuloaikhach = $ds_ts[1]['giatri'];
		}


		//var_dump($ds_thanhtoan);
		foreach ($ds_thanhtoan as $key => $value) {
			$thanhtien = 1;
			$phuthusoluong = 1;
			$thanhtien = $value['giaphong'] * $songaythue->days;
			if($value['soluong']>$value['soluongtoida'])
			{
				$phuthusoluong = $ds_ts[0]['giatri'];
				
				$thanhtien = $thanhtien*$phuthusoluong;
			}
			
			$ds_thanhtoan[$key]['phuthusoluong'] = $phuthusoluong;
			$ds_thanhtoan[$key]['thanhtien'] = $thanhtien;
			
			
			$tongtienthanhtoan+=$thanhtien;
		}	
		$stk = "";
		$tongtienthanhtoan*=$phuthuloaikhach;
		

		//$_SESSION['thanhtoan']['dp'] = $dp;
		//$_SESSION['thanhtoan']['dsp'] = $ds_thanhtoan;
		//$_SESSION['thanhtoan']['tenkhachhang'] = $dp->tenkhachhang;

		//$_SESSION['thanhtoan']['tongtienthanhtoan'] = $tongtienthanhtoan;
		//$_SESSION['thanhtoan']['phuthuloaikhach'] = $phuthuloaikhach;
		//$_SESSION['thanhtoan']['loaithanhtoan'] = $ds_thanhtoan;

	}
	

	//var_dump($_SESSION['thanhtoan']);
	
	//unset($_SESSION['thanhtoan']);
	
				
 ?>