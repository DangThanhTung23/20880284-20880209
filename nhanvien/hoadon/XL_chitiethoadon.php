<?php
	$hd = new hoadonModel();
	$p_hd = new p_hdModel();
	$dv_dp = new dv_dpModel();

	if(isset($_GET['id']))
	{
		$hoadon = $hd->timkiemtheoID($_GET['id']);
		
		
		$dsphong = $p_hd->timkiemtheoID($_GET['id']);
		$ds_dv_dp = $dv_dp->timkiemtheodatphongID($hoadon->datphongID);
		$tongtiendichvu = $hoadon->tongtiendichvu;
	}
 ?>