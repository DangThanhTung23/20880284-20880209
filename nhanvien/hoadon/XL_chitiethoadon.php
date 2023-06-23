<?php
	$hd = new hoadonModel();
	$p_hd = new p_hdModel();

	if(isset($_GET['id']))
	{
		$hoadon = $hd->timkiemtheoID($_GET['id']);
		
		
		$dsphong = $p_hd->timkiemtheoID($_GET['id']);
	}
 ?>