<?php
	//Hiển thị danh sách
	$lp = new loaiphongModel($conn);
	$dsloaiphong = $lp->docdanhsachloaiphong();

 ?>