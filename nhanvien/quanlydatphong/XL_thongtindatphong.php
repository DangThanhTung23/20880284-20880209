<?php
	$tb = "";
	
	if(isset($_GET['id']))
	{
		$dp = new datphongModel();
		$lkh = new loaikhachhangModel();
		$dsloaikhach = $lkh->docdanhsachloaikhach();
		$p_dp = new p_dpModel();
		$tb = "";
		$url_query = "index.php?action=chitiet";
		$dv = new dichvuModel();
		$ds_dv = $dv->docdanhsach();
		$dv_dp = new dv_dpModel();
		// echo($_GET['id']);
		// $ds_dv_dp = timkiemtheodatphongID($_GET['id']);
		$ht_ds_dv_vuathem = "";
		$ht_ds_dv_dadat = "";
		
		if(!isset($_SESSION['dichvu']))
		{
			$_SESSION['dichvu'] = array();
		}
		if(isset($_POST['btn_themdv'])&&$_POST['btn_themdv'])
		{
			
			array_push($_SESSION['dichvu'],[
				"datphongID"=>$_GET['id'],
				"dichvuID"=>$_POST['id'],
				"tendichvu"=>$_POST['tendichvu'],
				"giatri"=>$_POST['giatri'],
				"donvi"=>$_POST['donvi'],
				"soluong"=>$_POST['soluong']
			]);
		}
	
		if(isset($_GET['id_delete'])&&$_GET['id_delete']>0)
		{
			$p_dp->xoap_dp($_GET['id_delete'],$_GET['id']);
		}
		if(isset($_GET['id'])&&!empty($_GET['id']))
		{
			$dp = $dp->timkiemtheoID($_GET['id']);
			$dsphong = $p_dp->timkiemphongtheoID($_GET['id']);
			$url_query.="&id=".$_GET['id'];
			//var_dump($dsphong);
		}
		
		// if(isset($_POST['btn_luudatphong'])&&($_POST['btn_luudatphong']))		
		// {
			
		// 	$dp->tenkhachhang = $_POST["tenkhachhang"];
		// 	$dp->ngaydatphong = $_POST["ngaydatphong"];
		// 	$dp->ngayketthuc = $_POST["ngayketthuc"];
		// 	$dp->diachikhachhang = $_POST['diachikhachhang'];
		// 	$dp->phongID = $_POST['phongID'];
		// 	$u->thanhtoan = $_POST["thanhtoan"];
			
		// 	if($dp->luudatphong() ===true)
		// 	{
		// 		$tb = "Đã đặt phòng thành công";
		// 	}
		// 	else
		// 	{
		// 		$tb="Dữ liệu nhập có vấn đề";
		// 	}
		// }
		
		if(isset($_POST['btn_update'])&&$_POST['btn_update'])
		{	
			
			$dp->id = $_POST['id'];
			$dp->tenkhachhang = $_POST["tenkhachhang"];
			$dp->ngaydatphong = $_POST["ngaydatphong"];
			$dp->ngayketthuc = $_POST["ngayketthuc"];
			$dp->diachikhachhang = $_POST['diachikhachhang'];
			$dp->CMND = $_POST['CMND'];
			$dp->sdt = $_POST['sdt'];
			$dp->loaikhachID = $_POST['loaikhachID'];
			//$dp->phongID = $_POST['phongID'];
			//$dp->thanhtoan = $_POST["thanhtoan"];
			$dp->id = $_POST["id"];
			$chk_dv = true;

			// $chk_ngay = false;
			// $p = new phongModel();
			// $dsphong = $p_dp->timkiemphongtheoID($_GET['id']);
			// var_dump($dsphong);
			// foreach ($dsphong as $key => $value) {
			// 	if($p->kiemtratrangthaiphongtheongay($_GET['id'],$_POST['ngaydatphong'],$_POST['ngayketthuc'])==false)
			// 	{
			// 		$chk_ngay = false;
			// 		break;
			// 	}
			// }

			if(!empty($_SESSION['dichvu'])&&isset($_SESSION['dichvu']))
			{
				foreach ($_SESSION['dichvu'] as $key => $value) {
					$dv = new dv_dpModel();
					$dv->datphongID = $_GET['id'];
					$dv->dichvuID = $value['dichvuID'];
					$dv->tendichvu = $value['tendichvu'];
					$dv->giatri = $value['giatri'];
					$dv->donvi = $value['donvi'];
					$dv->soluong = $value['soluong'];
					$chk_dv = $dv->luudv_dp();
					if($chk_dv==false)
					{
						break;
					}
				}
				

				if($chk_dv)
				{
					unset($_SESSION['dichvu']);
					$_SESSION['dichvu'] = array();
				}
			}
	
			if($dp->suadp()&&$chk_dv)
			{
				$tb = "Đã update thành công";
			}
			else{
				$tb = "Update thất bại";
			}
			// if($chk_ngay==false)
			// {
			// 	$tb = 'Phòng đã được đặt trong khoảng '.$_POST['ngaydatphong'].' đến '.$_POST['ngayketthuc'];
			// }

			
		}



		//var_dump($_SESSION['dichvu']);
		if(isset($_GET['deletesession'])&&isset($_GET['idDV']))
			{
				array_splice($_SESSION['dichvu'],$_GET['idDV'],1);
			}
		$ds_dv_vuathem = $_SESSION['dichvu'];
		if(!empty($ds_dv_vuathem))
		{
			
			foreach ($ds_dv_vuathem as $key => $value) {
				$id_delete = $url_query.'&idDV='.$key.'&deletesession=1';
				$ht_ds_dv_vuathem.='<tr>
									<td>'.$value["tendichvu"].'</td>
									<td>
									'.$value['giatri'].'/'.$value['donvi'].'
									</td>
									<td>
									'.$value['soluong'].'
									</td>
									
									<td>
										<a href="'.$id_delete.'">Hủy dịch vụ</a>
									</td>
								</tr>';
			}
		}
		if(isset($_GET['deletedb'])&&isset($_GET['id_dv_dp']))
		{
			
			$dv_dp->xoa($_GET['id_dv_dp']);
		}
		
		$ds_dv_dp = $dv_dp->timkiemtheodatphongID($_GET['id']);
		
		if(!empty($ds_dv_dp))
		{
			foreach ($ds_dv_dp as $key => $value) {
				$id_delete = $url_query.'&id_dv_dp='.$value['ID'].'&deletedb=1';
				$ht_ds_dv_dadat.='<tr>
									<td>'.$value["tendichvu"].'</td>
									<td>
									'.$value['giatri'].'/'.$value['donvi'].'
									</td>
									<td>
									'.$value['soluong'].'
									</td>
									
									<td>
										<a href="'.$id_delete.'">Hủy dịch vụ</a>
									</td>
								</tr>';
			}
		}

	}
			
 ?>
