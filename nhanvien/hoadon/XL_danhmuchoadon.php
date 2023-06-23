<?php
	$hd = new hoadonModel();
	// $date = date('Y-m-d');
	//var_dump($hd->docdanhsach());
	$key = "";
	$tungay = "";
	$denngay = "";
	$url_query = "";
	if(isset($_GET['xoahd'])&&isset($_GET['id']))
	{
		$hd->xoahoadontheoid($_GET['id']);
	} 
	if(isset($_GET['btn_timkiem']))
	{
		// echo $_GET['tungay'];
		// echo $_GET['denngay'];
		//$ds_hd = $hd->timkiem($_GET['key'],$_GET['tungay'],$_GET['denngay']);
		$key = $_GET['key'];
		$tungay = $_GET['tungay'];
		$denngay = $_GET['denngay'];
		$url_query = $url_query."&key=".$key."&tungay=".$tungay."&denngay=".$denngay."&btn_timkiem=Tìm+kiếm";
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
	
	//$count : tham chiếu từ hoadonModel
	$ds_hd = $hd->phantrang($page,$key,$tungay,$denngay,$limit,$count);
	
	include('../lib/phantrang.php');
	$url = 'index.php?action=hoadon'.$url_query;
	$phantrang = phantrang($count,$url,$limit);
 ?>