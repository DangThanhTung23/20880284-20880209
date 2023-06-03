<?php
	$hd = new hoadonModel($conn);
	$date = date('Y-m-d');
	if(isset($_GET['id']))
	{
		$hd->xoahoadontheoid($_GET['id']);
	} 
	$ds_hd = $hd->docdanhsach();
 ?>