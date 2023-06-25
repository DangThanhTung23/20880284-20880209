<?php
	class p_dpModel extends connect
	{
		public $id;
		public $phongID;
		public $datphongID;
		public $giaphong;
		public $soluong;
		
		public function luup_dp()
		{	
			$sql = "INSERT INTO p_dp (phongID, datphongID ,giaphong, soluong)
				VALUES ($this->phongID,'$this->datphongID',$this->giaphong,$this->soluong);";
				
			
				return $this->set_data($sql);
		}
		public function docdanhsachp_dp()
		{
			
			$sql = "select p_dp.*,phong.tenphong as tenphong from p_dp,phong where p_dp.phongID = phong.phongID;";
			$ds = $this->get_data($sql);
			
			return $ds;

		}
		public function xoap_dp($id_phong,$id_datphong)
		{
			$sql = "DELETE FROM p_dp WHERE datphongID = '$id_datphong' and phongID = $id_phong ;";
			

			if($this->set_data($sql))
			{
				$sql = "UPDATE phong SET trangthaiID=1 where phongID=$id_phong";
				$this->set_data($sql);
			}
		}
		public function timkiemtheoID($id)
		{
			$sql = "select * from p_dp where datphongID = $id;";
			
			$ds = $this->get_data($sql);
			return $ds;

			// foreach ($ds as $key => $value) {
			// 	$this->id = $value["ID"];
			// 	$this->tenkhachhang = $value["tenkhachhang"];
			// 	$this->ngaydatphong = $value["ngaydatphong"];
			// 	$this->ngayketthuc = $value["ngayketthuc"];
			// 	$this->diachikhachhang = $value["diachikhachhang"];
			// 	$this->phongID = $value["phongID"];
			// 	$this->thanhtoan = $value["thanhtoan"];
			// }
				
		}

		
		// public function timkiemuser($loginName,$pass)
		// {
			
		// 	$sql = "select * from user where (email = '$loginName' or user = '$loginName' ) and pass = '$pass';";
			
		// 	$ds = $this->conn->get_data($sql);
		// 	// var_dump($ds);
			
		// 	foreach ($ds as $key => $value) {
		// 		$this->id = $value["ID"];
		// 		$this->ten = $value["ten"];
		// 		$this->diachi = $value["diachi"];
		// 		$this->email = $value["email"];
		// 		$this->pass = $value["pass"];
		// 		$this->user = $value["user"];
		// 		$this->role = $value["role"];
		// 	}
		// 	return $ds;
				
		// }


		public function suap_dp()
		{
			$sql = "UPDATE p_dp SET phongID = $this->phongID ,datphongID = '$this->datphongID',giaphong = $this->giaphong,soluong=$this->soluong;";
			
			return $this->set_data($sql);
		}
		// public function kiemtra()
		// {
			
		// 	$sql = "SELECT * FROM user WHERE (user = '$this->user' or email='$this->email') and ID<>$this->id ;";
		// 	//echo $sql;
		// 	$ds = $this->conn->get_data($sql);
			
		// 	if(count($ds)>0)
		// 	{
		// 		return false;
		// 	}
		// 	return true;
			

		// 	// Đóng kết nối
		// 	//$conn->close();
		// }
		public function timkiemphongtheoID($id)
		{
			$sql = "select * from p_dp,phong,loaiphong where datphongID = '$id' and p_dp.phongID = phong.phongID and phong.loaiphongID = loaiphong.ID";
			$ds = $this->get_data($sql);
			return $ds;
		}
		function kiemtrathoigiandatphong($tungay,$denngay)
		{
			
		}
	}

 ?>