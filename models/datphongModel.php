<?php
	
	class datphongModel extends connect
	{
		public $id;
		public $tenkhachhang;
		public $ngaydatphong;
		public $ngayketthuc;
		public $diachikhachhang;
		public $thanhtoan;
		public $CMND;
		public $sdt;
		public $soluongnguoi;
		public $acTive;
		public $loaikhachID;
		public $conn;
		
	
		public function __construct()
		{
			$this->thanhtoan = 0;
			$this->tenkhachhang="";
			$this->ngaydatphong="";
			$this->ngayketthuc="";
			$this->diachikhachhang="";
			
			$this->CMND="";
			$this->sdt=0;
			$this->soluongnguoi=0;
			$this->isActive=0;
			$this->loaikhachID=1;
		
			$this->id = 0;
			
		}
		public function luudp()
		{	
			$sql = "INSERT INTO datphong (ID,tenkhachhang,ngaydatphong ,ngayketthuc ,diachikhachhang, thanhtoan,CMND,sdt,soluongnguoi,loaikhachID)
				VALUES ('$this->id','$this->tenkhachhang','$this->ngaydatphong','$this->ngayketthuc','$this->diachikhachhang',$this->thanhtoan,
					'$this->CMND','$this->sdt',$this->soluongnguoi,$this->loaikhachID);";
				
				return $this->set_data($sql);
			
		}
		public function docdanhsachdp()
		{
			
			$sql = "select * from datphong order by isActive,ngayketthuc DESC";
				
			$ds = $this->get_data($sql);
			return $ds;

		}
		public function xoadp($id)
		{
			$sql = "DELETE FROM datphong WHERE ID = $id;";
			
			$this->set_data($sql);
		}
		public function xoadatphongtheoid($id)
		{
			$sql = "select isActive from datphong where ID='$id'";
			$ds = $this->get_data($sql);
			if(count($ds)>0)
			{
				$isActive = $ds[0]['isActive'];
				if((int)$isActive==0)
				{
					$sql = "UPDATE phong SET trangthaiID = 1 WHERE phongID in (SELECT p_dp.phongID from p_dp,datphong WHERE datphong.ID = p_dp.datphongID and datphong.ID = '$id');";
					$this->set_data($sql);
					$sql = "DELETE FROM datphong WHERE ID = '$id';";
					$this->set_data($sql);
					$sql = "DELETE FROM p_dp WHERE datphongID='$id';";
					$this->set_data($sql);
				}
				else
				{
					$sql = "DELETE FROM datphong WHERE ID = '$id';";
					$this->set_data($sql);
					$sql = "DELETE FROM p_dp WHERE datphongID='$id';";
					$this->set_data($sql);
				}
			}
			
			//return $this->conn->set_data($sql);
		}


		public function timkiemtheoID($id)
		{
			$sql = "select * from datphong where ID = '$id';";
			$ds = $this->get_data($sql);
			foreach ($ds as $key => $value) {
				$this->id = $value["ID"];
				$this->tenkhachhang = $value["tenkhachhang"];
				$this->ngaydatphong = $value["ngaydatphong"];
				$this->ngayketthuc = $value["ngayketthuc"];
				$this->diachikhachhang = $value["diachikhachhang"];
				//$this->thanhtoan = $value["thanhtoan"];
				$this->CMND = $value['CMND'];
				$this->sdt = $value['sdt'];
				//$this->soluongnguoi = $value['soluongnguoi'];
				$this->isActive = $value['isActive'];
				$this->loaikhachID = $value['loaikhachID'];
			}
			return $this;
		}


		public function thaydoitrangthaidatphong($id)
		{
			$sql = "UPDATE phong SET trangthaiID=2 WHERE phongID=$id";
		
			$this->set_data($sql);
		} 

		

		public function suadp()
		{
			$sql = "UPDATE datphong SET tenkhachhang = '$this->tenkhachhang' ,ngaydatphong = '$this->ngaydatphong',ngayketthuc = '$this->ngayketthuc',diachikhachhang='$this->diachikhachhang',CMND='$this->CMND',sdt='$this->sdt',loaikhachID=$this->loaikhachID
				WHERE ID='$this->id'";
			
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
		public function timkiem($key){
			$sql = "select * from datphong where tenkhachhang like '%$key%' or CMND like '%$key%' ; ";
			//echo $sql;
			$ds = $this->get_data($sql);
			return $ds;
		}
		public function thaydoiActive($id)
		{
			$sql = "UPDATE datphong SET isActive = 1 where ID = '$id';";
			//echo $sql;
			return $this->set_data($sql);
		}
		public function phantrang($p,$key,$limit,&$count)
		{
			$offset = $limit*$p;
			$sql = "select count(ID) as count from datphong where tenkhachhang like '%$key%' or CMND like '%$key%';";
			$ds = $this->get_data($sql);
			//var_dump($ds);
			$count = $ds[0]['count'];
			
			$sql = "select * from datphong where tenkhachhang like '%$key%' or CMND like '%$key%' ORDER BY isActive, ngayketthuc DESC LIMIT $limit OFFSET $offset;";
				$ds = $this->get_data($sql);
			//echo $sql;
			//var_dump($ds);
			return $ds;
			
		}

	}


 ?>