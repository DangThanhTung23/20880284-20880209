<?php
	//đọc danh sách phòng
	$p = new phongModel();
	$dsphong = $p->docdanhsachphong();
	//đọc danh sách trạng thái
	$tt = new trangthaiModel();
	$dstrangthai = $tt->docdanhsachtrangthai();
	$lp = new loaiphongModel();
	$dsloaiphong = $lp->docdanhsachloaiphong();
	$url_query = "";


	if(isset($_GET["tt"])&&$_GET['tt']>0)
	{
		$p->trangthaiID = $_GET['tt'];
		$dsphong = $p->docdanhsachphongtheotrangthai($_GET['tt']);
	}
	else
	{
		$dsphong = $p->docdanhsachphong();
	}
	// if(isset($_POST['btn_timkiem'])&&$_POST['btn_timkiem'])
	// {
	// 	$trangthaiID = $_POST['trangthaiID'];
	// 	$loaiphongID = $_POST['loaiphongID'];
	// 	$key = $_POST['key'];
	// 	$dsphong = locdanhsachphong($key,$trangthaiID,$loaiphongID);
	// }
	// else
	// {
	// 	{
	// 		$dsphong = $p->docdanhsachphong();
	// 	}
	// }
	$page = 0;
	if(!isset($_GET['p']))
	{
		$page = 0;
	}
	else{
		$page = $_GET['p'];
		$url_query = $url_query."&p=".$_GET['p'];
	}
	$key = "";
	$trangthaiID = 0;
	$loaiphongID = 0;
	if(isset($_GET['btn_timkiem'])&&$_GET['btn_timkiem'])
	{
		
		//$trangthaiID = $_GET['trangthaiID'];
		$loaiphongID = $_GET['loaiphongID'];
		$key = $_GET['key'];
		//$dsphong = locdanhsachphong($key,$trangthaiID,$loaiphongID);
		$url_query = $url_query."&key=".$key."&trangthaiID=".$trangthaiID."&loaiphongID=".$loaiphongID."&btn_timkiem=Tìm+kiếm";
	}
	// else
	// {
	// 	{
	// 		$dsphong = $p->docdanhsachphong();
	// 		include('../lib/phantrang.php');
	// 		$url = 'index.php?action=datphong';
			
	// 		$phantrang = phantrang(count($dsphong),$url,6);
	// 	}
	// }
	$limit = 6;
	$count = 0;
	$phantrang = "";
	
	$dsphong = $p->phantrang($page,$key,$loaiphongID,"","",$limit,$count);
	//var_dump($dsphong);
	//$dstoanbophong = $p->docdanhsachphong();
	include('../lib/phantrang.php');
	$url = 'index.php?action=danhmucphong'.$url_query;	
	$phantrang = phantrang($count,$url,$limit);
 ?>

