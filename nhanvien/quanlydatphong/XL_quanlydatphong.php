<?php
	$dp = new datphongModel($conn);
	$dsdp = $dp->docdanhsachdp();
	$p_dp = new p_dpModel($conn);
	$dsp_dp = $p_dp->docdanhsachp_dp();
	


	if(isset($_GET['key'])&&$_GET['key']!="")
	{
		$dsdp = $dp->timkiem($_GET['key']);
	}
	
 ?>
