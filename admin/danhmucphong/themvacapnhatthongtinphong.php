<?php
	$tb = "";
	$p = new phongModel($conn);
	$tt = new trangthaiModel($conn);
	$lp = new loaiphongModel($conn);
	$dstrangthai = $tt->docdanhsachtrangthai();
	$dsloaiphong = $lp->docdanhsachloaiphong();
	if(isset($_POST['btn_luuphong'])&&($_POST['btn_luuphong']))		
	{
		$p->tenphong = $_POST["tenphong"];
		$p->giaphong = $_POST["giatien"];
		$p->trangthaiID = $_POST['trangthaiID'];
		$p->loaiphongID = $_POST['loaiphongID'];
		$p->soluongtoida = $_POST['soluongnguoi'];
		$p->mota = $_POST["mota"];
		
		$p->img = createFilename($_FILES['phong_img'],"images");

		if($p->luuphong() ===true)
		{
			$tb = "Đã lưu thành công";
			if($p->img!="")
			{
				uploadFile($_FILES['phong_img'],'../'.$p->img);
			}
			
		}
		else{
			$tb = "Lưu thất bại";
		}
	}
	
	if(isset($_POST['btn_suaphong'])&&$_POST['btn_suaphong']&&$_POST["id_edit"]>0)
	{
		$p->tenphong = $_POST["tenphong"];
		$p->giaphong = $_POST["giatien"];
		$p->trangthaiID = $_POST['trangthaiID'];
		$p->loaiphongID = $_POST['loaiphongID'];
		$p->soluongtoida = $_POST['soluongnguoi'];
		$p->mota = $_POST["mota"];
		$p->id = $_POST["id_edit"];
		$p->img = $_POST["old_phong_img"];
		
		if($_FILES['phong_img']["name"]!=="")
		{
			$p->img = createFilename($_FILES['phong_img'],"images");

			if($p->suaphong() ===true)
			{
				$tb = "Đã update thành công";
				if($p->img!="")
				{
					uploadFile($_FILES['phong_img'],'../'.$p->img);
				}
			}
			else{
				$tb = "Update thất bại";
			}
		}
		else{
			if($p->suaphong())
			{
				$tb = 'Đã update thành công';
			}
			else{
				$tb = 'Update thất bại';
			}
		}
		
	}	
				
 ?>