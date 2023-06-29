<?php
	$p_dp = new p_dpModel();
	$dp = new datphongModel();
	$dv_dp = new dv_dpModel();
	if(isset($_GET['id']))
	{
		echo $_GET['id'];
		$dp->xoadatphongtheoid($_GET['id']);
		$dv_dp->xoatheodatphongID($_GET['id']);
	} 
 ?>