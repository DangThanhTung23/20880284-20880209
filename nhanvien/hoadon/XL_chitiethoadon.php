<?php
	$hd = new hoadonModel($conn);
	$p_hd = new p_hdModel($conn);

	if(isset($_GET['id']))
	{
		$hoadon = $hd->timkiemtheoID($_GET['id']);
		
		
		$dsphong = $p_hd->timkiemtheoID($_GET['id']);
	}
 ?>