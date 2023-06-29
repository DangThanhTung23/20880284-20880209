<?php
	$tb = "";
	$dp = new datphongModel();
	$lkh = new loaikhachhangModel();
	$dsloaikhach = $lkh->docdanhsachloaikhach();
	$p_dp = new p_dpModel();
	$hd = new hoadonModel();
	$ts = new thamsoModel();
	$ds_ts = $ts->docdanhsach();
	$ltt = new loaithanhtoanModel();
	$ds_ltt = $ltt->docdanhsach();
	$dv_dp = new dv_dpModel();
	$ds_dv_dp = $dv_dp->docdanhsachtheodatphongID($_GET['id']);
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
		$tongtienphong = 0;
		$phuthuloaikhach = 1;
		if($dp->loaikhachID==2){
			$phuthuloaikhach = $ds_ts[1]['giatri'];
		}


		//var_dump($ds_thanhtoan);
		if(!empty($ds_thanhtoan))
		{
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
				
				
				$tongtienphong+=$thanhtien;
			}
		}

			
		$stk = "";

		$tongtienphong*=$phuthuloaikhach;
		$tongtienthanhtoan += $tongtienphong;
		$tongtiendichvu = 0;
		if(!empty($ds_dv_dp))
		{
			foreach ($ds_dv_dp as $key => $value) {
				$tongtiendichvu+=$value['thanhtien'];
			}
		}
		$tongtienthanhtoan+=$tongtiendichvu;

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