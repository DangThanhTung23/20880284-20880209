<?php
	class p_hdModel extends connect
	{
		public $ID;
		public $hoadonID;
		public $tenphong;
		public $loaiphong;
		public $giaphong;
		public $soluongkhach;
		public $phuthusoluong;
		public $thanhtien;
		public $songaythue;
		public $phongID;
		
		
		public function luup_hd()
		{
			$sql = "INSERT into p_hd (hoadonID,tenphong,loaiphong,giaphong,soluongkhach,phuthusoluong,thanhtien,songaythue,phongID) VALUES
			('$this->hoadonID','$this->tenphong','$this->loaiphong',$this->giaphong,$this->soluongkhach,$this->phuthusoluong,$this->thanhtien,
			$this->songaythue,$this->phongID);";
			//echo $sql;
			return $this->set_data($sql);
		}
		public function timkiemtheoID($id)
		{
			$sql = "select * from p_hd where hoadonID = '$id';";
			$ds = $this->get_data($sql);
			return $ds;
		}
		public function timkiemtheoIDphong($id)
		{
			$sql = "select * from p_hd where phongID = '$id';";
			$ds = $this->get_data($sql);
			return $ds;
		}
	}
 ?>