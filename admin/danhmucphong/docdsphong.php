<?php
	//đọc danh sách phòng
	$p = new phongModel($conn);
	$dsphong = $p->docdanhsachphong();
	//đọc danh sách trạng thái
	$tt = new trangthaiModel($conn);
	$dstrangthai = $tt->docdanhsachtrangthai($conn);
	$lp = new loaiphongModel($conn);
	$dsloaiphong = $lp->docdanhsachloaiphong();



	if(isset($_GET["tt"])&&$_GET['tt']>0)
	{
		$p->trangthaiID = $_GET['tt'];
		$dsphong = $p->docdanhsachphongtheotrangthai($_GET['tt']);
	}
	else
	{
		$dsphong = $p->docdanhsachphong();
	}
	if(isset($_POST['btn_timkiem'])&&$_POST['btn_timkiem'])
	{
		$trangthaiID = $_POST['trangthaiID'];
		$loaiphongID = $_POST['loaiphongID'];
		$key = $_POST['key'];
		$dsphong = locdanhsachphong($key,$trangthaiID,$loaiphongID);
	}
	else
	{
		{
			$dsphong = $p->docdanhsachphong();
		}
	}
 ?>

