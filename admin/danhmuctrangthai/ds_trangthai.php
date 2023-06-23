<?php
	//include "../models/trangthaiModel.php";
	// if(isset($_POST['btn_luutrangthai'])&&$_POST['btn_luutrangthai'])
	// {
		
	// 	$trangthai = $_POST['trangthai'];
	
	// 	$sql = "INSERT INTO trangthai (trangthai)
	// 			VALUES ('$trangthai');";
				
	// 		set_data($sql);
	// }
	


	//Hiển thị danh sách
	$tt = new trangthaiModel();
	$dstrangthai = $tt->docdanhsachtrangthai();
	
 ?>