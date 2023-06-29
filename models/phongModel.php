<?php
	class phongModel extends connect
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
		public function __construct()
		{
			
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
			
				return $this->set_data($sql);
			}
			return false;
		}


		//đọc toàn bộ danh sách
		public function docdanhsachphong()
		{
			
			$sql = "select * from phong order by trangthaiID,tenphong";
				
			$ds = $this->get_data($sql);
			return $ds;

		}

		//đọc danh sách phòng theo trạng thái
		public function docdanhsachphongtheotrangthai($trangthaiID)
		{
			$sql = "select * from phong where trangthaiID = $trangthaiID order by tenphong";
			$ds = $this->get_data($sql);
			return $ds;
		}


		//đọc danh sách phòng theo keyword tên phong:
		public function docdanhsachphongtimkiem()
		{
			$sql = "select * from phong where tenphong LIKE '$key' order by tenphong";
			echo $sql;
			$ds = $this->get_data($sql);
			return $ds;
		}



		public function xoaphong($id)
		{
			$sql = "DELETE FROM phong WHERE phongID = $id;";
			
			$this->set_data($sql);
		}



		public function timkiemtheoID($id)
		{
			$sql = "select * from phong where phongID = $id;";
			$ds = $this->get_data($sql);
			
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
			
				return $this->set_data($sql);
			}
			return false;
		}
		public function kiemtra()
		{
			
			$sql = "SELECT * FROM phong WHERE tenphong = '$this->tenphong' and phongID <> $this->id;";
			$ds = $this->get_data($sql);
			
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
			return $this->set_data($sql);
		}
		
		
		public function phantrang($p,$key,$loaiphongID,$tungay,$denngay,$limit,&$count)
		{
			
			$offset = $limit*$p;
			
			$sql_tk = "where tenphong like '%$key%'";

			if($loaiphongID>0)
			{
				$sql_tk.=" and loaiphongID=$loaiphongID";
			}
			
			if($tungay!=""&&$denngay!=""&&$tungay<=$denngay)
			{
				// $sql_tk.=" and phongID not in 
				// (SELECT p_dp.phongID from p_dp,datphong  where datphong.isActive=0 
				// AND ((datphong.ngaydatphong BETWEEN '$tungay' AND '$denngay') OR (datphong.ngayketthuc BETWEEN '$tungay' and '$denngay')) 
				// AND p_dp.datphongID = datphong.ID)";
				// $sql_tk.=" and phongID not in 
				// (SELECT p_dp.phongID from p_dp,datphong  where datphong.isActive=0 
				// AND ((datphong.ngaydatphong BETWEEN '$tungay' AND '$denngay') OR (datphong.ngayketthuc BETWEEN '$tungay' and '$denngay')
				// OR (datphong.ngaydatphong >= '$tungay' AND datphong.ngayketthuc <= '$denngay'))
				// AND p_dp.datphongID = datphong.ID)";
				$sql_tk.=" and phongID not in 
				(SELECT p_dp.phongID from p_dp,datphong  where ((datphong.ngaydatphong <= '$tungay' AND datphong.ngayketthuc >= '$tungay') 
				OR (datphong.ngaydatphong <= '$denngay' and datphong.ngayketthuc>='$denngay')
				OR (datphong.ngaydatphong >= '$tungay' AND datphong.ngayketthuc <= '$denngay'))
				AND p_dp.datphongID = datphong.ID)";
			}
			
			$sql = "SELECT count(phongID) as count FROM phong $sql_tk";
			//echo $sql;
			$ds = $this->get_data($sql);
			//var_dump($ds);
			$count = $ds[0]['count'];
			$sql = "SELECT * FROM phong $sql_tk ORDER BY tenphong LIMIT $limit OFFSET $offset";
			//echo $sql;
			$ds = $this->get_data($sql);
			//var_dump($ds);
			return $ds;
		}
		public static function kiemtratrangthaiphongtheongay($id,$tungay,$denngay)
		{
			$conn = new connect();
			$sql = "select phong.phongID from phong,datphong,p_dp where
			((datphong.ngaydatphong <= '$tungay' AND datphong.ngayketthuc >= '$tungay') 
				OR (datphong.ngaydatphong <= '$denngay' and datphong.ngayketthuc>='$denngay')
				OR (datphong.ngaydatphong >= '$tungay' AND datphong.ngayketthuc <= '$denngay'))
				AND p_dp.datphongID = '$id' AND phong.phongID = p_dp.phongID";
			//echo $sql;
			$ds = $conn->get_data($sql);
			//var_dump($ds);
			
			if(count($ds)>0)
			{
				return false;
			}
			return true;
		}
	}
 ?>