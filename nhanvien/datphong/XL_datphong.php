<?php
	$today = date('Y-m-d');

	//đọc ds phòng
	$p = new phongModel();
	//$dsphong = $p->docdanhsachphong();
	//$dsphong = $p->docdanhsachphong();
	//đọc danh sách trạng thái
	$tt = new trangthaiModel();
	$dstrangthai = $tt->docdanhsachtrangthai();
	$lp = new loaiphongModel();
	$dsloaiphong = $lp->docdanhsachloaiphong();
	$lkh = new loaikhachhangModel();
	$dsloaikhach = $lkh->docdanhsachloaikhach();
	$dsdp = array();
	$url_query = "";
	//var_dump($url_request);
	
	$key = "";
	$tungay = "";
	$denngay = "";
	$ht_tungay = $today;
	$ht_denngay = $today;
	$tbdp="";
	
	if(!isset($_SESSION['datphong']))
	{
		$_SESSION['datphong'] = array();
		
	}
	if(!isset($_SESSION['thanhtoan']))
	{
		$_SESSION['thanhtoan'] = 0;
	}


	//Nhấn nút hủy thì xóa session datphong

	if(isset($_POST['btn_huy'])&&$_POST['btn_huy'])
	{
		unset($_SESSION['datphong']);
	}


	//Sau khi chọn phòng,kiểm tra nếu nút đặt phòng dược nhấn thì lưu vào session đặt phòng và hiển thị ra
	if(isset($_POST['btn_chonphong'])&&$_POST['btn_chonphong'])
	{
		$phong = array();
			$phong = [
					'phongID'=>$_POST['phongID'],
					'tenphong'=>$_POST['tenphong'],
					'giaphong'=>$_POST['giaphong'],
					'soluong'=>$_POST['soluong'],
					'loaiphongID'=>$_POST['loaiphongID'],
					'phongID'=>$_POST['phongID'],
					'trangthaiID'=>$_POST['trangthaiID'],
				];
			$kt = true;
			// if($phong['trangthaiID']==2||$phong['trangthaiID']==3)
			// {
			// 	$kt = false;
			// }
			//$kt = $p->kiemtratrangthaiphong($_POST['phongID'],$tungay,$denngay);
			//var_dump($p);
			foreach ($_SESSION['datphong'] as $key => $value) {
				if($value['phongID']==$phong['phongID']){
					$kt = false;
					break;
				}
			}
			if($kt==true)
			{
				array_push($_SESSION['datphong'],$phong);
			}
			else{
				$tbdp = 'Phòng '.$_POST['tenphong'].' đã được đặt<br>';
			}
	}
	if(isset($_GET['huydp']))
		{
			// $dsdp = array();
			$dsdp=$_SESSION['datphong'];
			array_splice($dsdp,$_GET['huydp'],1);
			if(empty($dsdp))
			{
				unset($_SESSION['datphong']);
			}
			else{
				$_SESSION['datphong'] = $dsdp;
			}
		}
	




	//Nhấn nút hủy thì ngừng đặt phòng và xóa dsphongf trong session
	// if(isset($_POST['btn_huy'])&&$_POST['btn_huy'])
	// {	
	// 	unset($_SESSION['datphong']);
	// }


	

	//nếu xác nhận đặt phòng thì lưu thông tin vào bảng datphong và bảng dp_p vào trong csdl
	
	//$tbdp = "Hiện chưa có thông báo";
	$tbxndp="";
	if(isset($_POST['btn_luu'])&&$_POST['btn_luu'])
	{
		//var_dump($_SESSION['datphong']);

		$dsdp = $_SESSION['datphong'];
		$dp = new datphongModel();
		$p_dp = new p_dpModel();
		$chk_p_dp = false;
		$dp->tenkhachhang = $_POST['tenkhachhang'];
		$dp->ngaydatphong = $_POST['ngaydatphong'];
		$dp->ngayketthuc = $_POST['ngayketthuc'];
		$dp->diachikhachhang = $_POST['diachi'];
		//$dp->soluongnguoi = $_POST['soluongnguoi'];
		$dp->CMND = $_POST['CMND'];
		$dp->sdt = $_POST['sdt'];
		$dp->loaikhachID = $_POST['loaikhachID'];
		$date = date("ymd-His");
		$dp->id = $date;
		$kt = true;
		if(!$_SESSION['thanhtoan'])
		{
			$dp->thanhtoan = 0;
		}
		else{
			$dp->thanhtoan = $_SESSION['thanhtoan'];
		}
		$kt = true;
		foreach ($dsdp as $key => $value) {
			$kt = phongModel::kiemtratrangthaiphongtheongay($value['phongID'],$_POST['ngaydatphong'],$_POST['ngayketthuc']);
				
			//var_dump($kt);
			if($kt==false)
			{
				$tbdp = 'Phòng '.$_POST['tenphong'].' đã được đặt<br> từ ngày '.$_POST['ngaydatphong'].' đến ngày '.$_POST['ngayketthuc'];
				break;
			}
		}
		
		if($dp->tenkhachhang!=""&&$dp->CMND!=""&&$dp->sdt!=""&&!empty($dsdp)&&$kt)
		{	
			//$dp->luudp();
			foreach ($dsdp as $key => $value) {
				$p_dp->datphongID = $dp->id;
				$p_dp->phongID = $value['phongID'];
				$p_dp->giaphong =$value['giaphong'];
				$p_dp->soluong = $value['soluong'];
				
				if($p_dp->luup_dp()){
					$chk_p_dp = true;
				}
				$dp->thaydoitrangthaidatphong($value['phongID']);
				
			}
			if($dp->luudp()&&$chk_p_dp)
				{
					unset($_SESSION['datphong']);
					$tbxndp = "Bạn đã đăng ký thành công";
				}
				else{
					$tbxndp = "Yêu cầu nhập đủ thông tin";
				}
			// if($dp->luudp()&&$chk_p_dp)
			// {
			// 	unset($_SESSION['datphong']);
			// 	$tbxndp = "Bạn đã đăng ký thành công";
			// }
			// else{
			// 	$tbxndp = "Yêu cầu nhập đủ thông tin";
			// }
		}
		else{
			$tbxndp = "Yêu cầu nhập đủ thông tin";
		}
		
	}


	if(isset($_SESSION['datphong'])&&!empty($_SESSION['datphong']))
	{
		$dsdp = $_SESSION['datphong'];
		$thanhtoan = 0;
		$index = 0;
		$tbdp.='<div>
					<p>Phòng đã chọn: </p>
					<div class="row p-2">';
					foreach ($dsdp as $key => $value) {
						$tbdp.='<div class="col col-md-8">'.$value['tenphong'].'('.$value['soluong'].')</div>';
						$thanhtoan+=(int)$value['giaphong'];
						$tbdp.='<div class="col col-md-4"><a href="index.php?action=datphong&huydp='.$index.'">Hủy</a>
						</div>';

						$index++;
					};
					$tbdp.='</div>
					</div>';
		$tbdp.='<b>Thanh toán/ngày : </b>'.$thanhtoan;
		$_SESSION['thanhtoan'] = $thanhtoan;
	}else{
		$tbdp = "Chưa có phòng được chọn";
	}

	$page = 0;
	if(!isset($_GET['p']))
	{
		$page = 0;
	}
	else{
		$page = $_GET['p'];
		$url_query = $url_query."&p=".$_GET['p'];
	}
	$key = "";
	$trangthaiID = 0;
	$loaiphongID = 0;
	if(isset($_GET['btn_timkiem'])&&$_GET['btn_timkiem'])
	{
		//var_dump($_GET);
		$tungay = $_GET['tungay'];
		$denngay = $_GET['denngay'];
		$loaiphongID = $_GET['loaiphongID'];
		//$dsphong = locdanhsachphong($key,$trangthaiID,$loaiphongID);
		$url_query = $url_query."&loaiphongID=".$loaiphongID."&tungay=".$tungay."&denngay=".$denngay."&btn_timkiem=Tìm+kiếm";
		$ht_tungay = $tungay;
		$ht_denngay = $denngay;
	}
	
	// else
	// {
	// 	{
	// 		$dsphong = $p->docdanhsachphong();
	// 		include('../lib/phantrang.php');
	// 		$url = 'index.php?action=datphong';
			
	// 		$phantrang = phantrang(count($dsphong),$url,6);
	// 	}
	// }
	$limit = 4;
	$count = 0;
	$phantrang = "";
	
	
	$dsphong = $p->phantrang($page,"",$loaiphongID,$tungay,$denngay,$limit,$count);
	//var_dump($dsphong);
	//$dstoanbophong = $p->docdanhsachphong();
	include('../lib/phantrang.php');
	$url = 'index.php?action=datphong'.$url_query;	
	$phantrang = phantrang($count,$url,$limit);
 ?>
 