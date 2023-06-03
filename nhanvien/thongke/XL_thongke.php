<?php 
  $dp_dttp = "";
  $dp_dtlp = "";
  $dp_mdsdp = "";
  $tb = "";
  $tungay = "";
  $phong = new phongModel($conn);
  $tongdoanhthu = 0;

  $denngay = date('Y-m-d');
  if(isset($_POST['btn_thongke'])&&$_POST['btn_thongke'])
  {
  	$tungay = $_POST['tungay'];
  	$denngay = $_POST['denngay'];

  	if($_POST['tungay']!=""&&$_POST['denngay']!="")
  	{
  		//Tính tổng doanh thu
  		$sql = "select * from hoadon where ngayketthuc between '$tungay' and '$denngay'";
  		$ds_hd = $conn->get_data($sql);
  		foreach ($ds_hd as $key => $value) {
  			$tongdoanhthu += $value['tongtienthanhtoan'];
  		}


  		//doanh thu phòng
  		$sql = "select * from phong";
  		$dsphong = $phong->docdanhsachphong();

  		$dp_dttp.='
  					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Phòng</th>
					      <th scope="col">Doanh thu</th>
					      <th scope="col">Tỉ lệ</th>  
					    </tr>
					  </thead>
					  <tbody>';
		foreach ($dsphong as $key => $value) {
			// code...
			$doanhthu = 0;
			$tile = 0;
			$id_phong = $value['phongID'];
			$sql = "select * from hoadon,p_hd where (hoadon.ngayketthuc between '$tungay' and '$denngay') and p_hd.hoadonID = hoadon.ID and p_hd.phongID = $id_phong";
			$ds_p_hd = $conn->get_data($sql);
			//var_dump($ds_p_hd);
			foreach ($ds_p_hd as $key => $valuett) {
				$thanhtien = 0;
				$thanhtien = $valuett['thanhtien'];
				$thanhtien*=$valuett['phuthuloaikhach'];
				$doanhthu+=$thanhtien;
			}
			$tile = $doanhthu/$tongdoanhthu*100;
			$dp_dttp.='<tr>
					      <td>'.$value['tenphong'].'</td>
					      <td>'.$doanhthu.'</td>
					      <td>'.round($tile,2).'%'.'</td>
					    </tr>';
		}
					    
		$dp_dttp.='</tbody></table>';



		//doanh thu theo loai phong
		$lp = new loaiphongModel($conn);
		$sql = "select * from loaiphong";
  		$dsloaiphong = $lp->docdanhsachloaiphong();
  		
  		$dp_dtlp.='<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Loại Phòng</th>
					      <th scope="col">Doanh thu</th> 
					      <th scope="col">Tỉ lệ</th>
					    </tr>
					  </thead>
					  <tbody>';
		//var_dump($dsloaiphong);
		foreach ($dsloaiphong as $key => $value) {
			// code...
			$doanhthu = 0;
			$id_loaiphong = $value['ID'];
			$sql = "select p_hd.tenphong as tenphong ,p_hd.phongID,hoadon.ngayketthuc,hoadon.phuthuloaikhach as phuthuloaikhach,p_hd.thanhtien as thanhtien, hoadon.tongtienthanhtoan from hoadon,p_hd,phong where (hoadon.ngayketthuc between '$tungay' and '$denngay') and p_hd.hoadonID = hoadon.ID and p_hd.phongID = phong.phongID and phong.loaiphongID = $id_loaiphong";

			$ds_p_hd = $conn->get_data($sql);
			//var_dump($ds_p_hd);
			foreach ($ds_p_hd as $key => $valuett) {
				$thanhtien = 0;
				$thanhtien = $valuett['thanhtien'];
				$thanhtien*=$valuett['phuthuloaikhach'];
				$doanhthu+=$thanhtien;
			}
			
			$tile = $doanhthu/$tongdoanhthu*100;
			$dp_dtlp.='<tr>
					      <td>'.$value['loaiphong'].'</td>
					      <td>'.$doanhthu.'</td>
					      <td>'.round($tile,2).'%'.'</td>
					    </tr>';
		}
	
		$dp_dtlp.='</tbody></table>';


		//Mật độ sử dụng phòng
		$date1 = date_create($tungay);
	  	$date2 = date_create($denngay);
	  	$date_diff = date_diff($date1,$date2);
	  	
	  	$tongsongay = $date_diff->days;
	  	//echo $tongsongay;

		$sql = "select * from phong";
		$matdosudung = 0;
  		$dsphong = $phong->docdanhsachphong();
  		$dp_mdsdp.='<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">Phòng</th>
					      <th scope="col">Số ngày thuê</th>
					      <th scope="col">Mật độ sử dụng</th>
					    </tr>
					  </thead>
					  <tbody>';
		foreach ($dsphong as $key => $value) {
			// code...
			$songaythue = 0;
			$id_phong = $value['phongID'];
			$sql = "select * from hoadon,p_hd where ((hoadon.ngayketthuc between '$tungay' and '$denngay') or (hoadon.ngaydatphong between
			'$tungay' and '$denngay') or (hoadon.ngaydatphong < '$tungay' and hoadon.ngayketthuc > '$denngay')) and p_hd.hoadonID = hoadon.ID and p_hd.phongID = $id_phong";
			$ds_p_hd = $conn->get_data($sql);
			//var_dump($ds_p_hd);

			foreach ($ds_p_hd as $key => $valuemd) {
				if($valuemd['ngaydatphong']<$tungay&&$valuemd['ngayketthuc']<=$denngay)
				{
					$ngaydatphong = date_create($valuemd['ngaydatphong']);
					
					$songay = date_diff($date1,$ngaydatphong);
					
					$songaythue += ($valuemd['songaythue'] - $songay->days);
					
				}
				elseif($valuemd['ngaydatphong']>=$tungay&&$valuemd['ngayketthuc']>$denngay)
				{
					$ngayketthuc = date_create($valuemd['ngayketthuc']);
					$songay = date_diff($ngayketthuc,$date2);
					$songaythue = ($valuemd['songaythue'] - $songay->days);
					
				}
				elseif($valuemd['ngaydatphong']<$tungay&&$valuemd['ngayketthuc']>$denngay)
				{
					$ngaydatphong = date_create($valuemd['ngaydatphong']);
					$songay = date_diff($date1,$ngaydatphong);
					$songaythue += ($valuemd['songaythue'] - $songay->days);
					$ngayketthuc = date_create($valuemd['ngayketthuc']);
					$songay = date_diff($ngayketthuc,$date2);
					$songaythue += ($valuemd['songaythue'] - $songay->days);
					
				}
				else{
					$songaythue+=$valuemd['songaythue'];
					
				}
				//echo $songaythue.$value['tenphong'].'cc';
			}
			$matdosudung = $songaythue/$tongsongay*100;
			$dp_mdsdp.='<tr>
					      <td>'.$value['tenphong'].'</td>
					      <td>'.$songaythue.'</td>
					      <td>'.round($matdosudung,2).'%'.'</td>
					    </tr>';
		}
					    
		$dp_mdsdp.='</tbody></table>';

  	}
  	else{
  		$tb ="Yêu cầu chọn ngày";
  	}
  }
?>
<!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">Phòng</th>
      <th scope="col">Doanh thu</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      
    </tr>
  </tbody>
</table> -->