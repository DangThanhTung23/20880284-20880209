<?php
	class phongModel
	{
		public $id;
		public $tenphong;
		public $giaphong;
		public $soluongtoida;
		public $mota;
		public $img;
		public $conn;
		public $loaiphongID;
		public $trangthaiID;
		public function __construct($conn)
		{
			$this->conn = $conn;
			$this->id = 0;
			$this->tenphong = "";
			$this->giaphong = 0;
			$this->trangthaiID = 0;
			$this->loaiphongID = 0;
			$this->soluongtoida = 0;
			$this->mota = "";
			$this->img = "";
			
		}
		public function luuphong()
		{	
			if($this->kiemtra())
			{
				$sql = "INSERT INTO phong (tenphong, img ,giaphong, trangthaiID, loaiphongID,soluongtoida,mota)
				VALUES ('$this->tenphong','$this->img',$this->giaphong,$this->trangthaiID,$this->loaiphongID,$this->soluongtoida,'$this->mota');";
			
				return $this->conn->set_data($sql);
			}
			return false;
		}


		//đọc toàn bộ danh sách
		public function docdanhsachphong()
		{
			
			$sql = "select * from phong order by trangthaiID,tenphong";
				
			$ds = $this->conn->get_data($sql);
			return $ds;

		}

		//đọc danh sách phòng theo trạng thái
		public function docdanhsachphongtheotrangthai($trangthaiID)
		{
			$sql = "select * from phong where trangthaiID = $trangthaiID order by tenphong";
			$ds = $this->conn->get_data($sql);
			return $ds;
		}


		//đọc danh sách phòng theo keyword tên phong:
		public function docdanhsachphongtimkiem()
		{
			$sql = "select * from phong where tenphong LIKE '$key' order by tenphong";
			echo $sql;
			$ds = $this->conn->get_data($sql);
			return $ds;
		}



		public function xoaphong($id)
		{
			$sql = "DELETE FROM phong WHERE phongID = $id;";
			
			$this->conn->set_data($sql);
		}



		public function timkiemtheoID($id)
		{
			$sql = "select * from phong where phongID = $id;";
			$ds = $this->conn->get_data($sql);
			
			foreach ($ds as $key => $value) {
				$this->id = $value["phongID"];
				$this->tenphong = $value["tenphong"];
				$this->giaphong = $value["giaphong"];
				$this->trangthaiID = $value["trangthaiID"];
				$this->loaiphongID = $value["loaiphongID"];
				$this->soluongtoida = $value["soluongtoida"];
				$this->mota = $value["mota"];
				$this->img = $value["img"];
			}
		} 

		public function suaphong()
		{
			if($this->kiemtra())
			{
				$sql = "UPDATE phong SET tenphong = '$this->tenphong' ,img = '$this->img',giaphong = $this->giaphong,trangthaiID=$this->trangthaiID,loaiphongID=$this->loaiphongID,soluongtoida=$this->soluongtoida,mota='$this->mota' WHERE phongID = $this->id;";
			
				return $this->conn->set_data($sql);
			}
			return false;
		}
		public function kiemtra()
		{
			
			$sql = "SELECT * FROM phong WHERE tenphong = '$this->tenphong' and phongID <> $this->id;";
			$ds = $this->conn->get_data($sql);
			
			if(count($ds)>0)
			{
				return false;
			}
			return true;
			

			// Đóng kết nối
			//$conn->close();
		}

		public function thaydoitrangthaiphong($id)
		{
			$sql = "UPDATE phong SET trangthaiID=1 where phongID = $id";
			//echo $sql;
			return $this->conn->set_data($sql);
		}

	}

 ?>