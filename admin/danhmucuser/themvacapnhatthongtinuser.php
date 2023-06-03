<?php
	$tb = "";
	$u = new userModel($conn);
	
	$dsrole = userModel::$dsrole ;
	if(isset($_POST['btn_luuuser'])&&($_POST['btn_luuuser']))		
	{

		$u->ten = $_POST["ten"];
		$u->diachi = $_POST["diachi"];
		$u->email = $_POST['email'];
		$u->user = $_POST['user'];
		$u->pass = $_POST['pass'];
		$u->role = $_POST["role"];
		$u->sdt = $_POST["sdt"];
		

		if($u->luuuser() ===true)
		{
			$tb = "Đã lưu thành công";
		}
		else
		{
			$tb="Dữ liệu nhập có vấn đề";
		}
	}
	
	if(isset($_POST['btn_suauser'])&&$_POST['btn_suauser']&&$_POST["id_edit"]>0)
	{
		
		$u->ten = $_POST["ten"];
		$u->diachi = $_POST["diachi"];
		$u->email = $_POST['email'];
		$u->user = $_POST['user'];
		$u->pass = $_POST['pass'];
		$u->role = $_POST["role"];
		$u->id = $_POST["id_edit"];
		$u->sdt = $_POST["sdt"];
		
		if($u->suauser() ===true)
		{
			$tb = "Đã update thành công";
		}
		else{
			$tb="Dữ liệu nhập có vấn đề";
		}
		
	}	
				
 ?>