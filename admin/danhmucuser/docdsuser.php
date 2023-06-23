<?php
	$u = new userModel();
	//$dsuser = $u->docdanhsachuser();
	$dsrole = userModel::$dsrole;

	$key = "";
	$url_query = "";
	if(isset($_GET['xoadp'])&&isset($_GET['id']))
	{
		$dp->xoadatphongtheoid($_GET['id']);
	} 
	if(isset($_GET['btn_timkiem']))
	{
		// echo $_GET['tungay'];
		// echo $_GET['denngay'];
		//$ds_hd = $hd->timkiem($_GET['key'],$_GET['tungay'],$_GET['denngay']);
		$key = $_GET['key'];
		$url_query = $url_query."&key=".$key."&btn_timkiem=Tìm+kiếm";
	}
	$page = 0;
	if(!isset($_GET['p']))
	{
		$page = 0;
	}
	else{
		$page = $_GET['p'];
		$url_query = $url_query."&p=".$_GET['p'];
	}
	// else
	// {
	// 	$ds_hd = $hd->docdanhsach();
	// }
	$phantrang = "";
	
	$limit = 10;
	$count = 0;
	$phantrang = "";
	
	//$count : tham chiếu từ datphongModel
	$dsuser = $u->phantrang($page,$key,$limit,$count);
	
	include('../lib/phantrang.php');
	$url = 'index.php?action=danhmucuser'.$url_query;	
	$phantrang = phantrang($count,$url,$limit);
	//echo $phantrang;
 ?>
 
