<?php
	$hd = new hoadonModel($conn);
	// $date = date('Y-m-d');
	//var_dump($hd->docdanhsach());


	if(isset($_GET['btn_timkiem']))
	{
		// echo $_GET['tungay'];
		// echo $_GET['denngay'];
		$ds_hd = $hd->timkiem($_GET['key'],$_GET['tungay'],$_GET['denngay']);
	}
	else
	{
		$ds_hd = $hd->docdanhsach();
	}
 ?>