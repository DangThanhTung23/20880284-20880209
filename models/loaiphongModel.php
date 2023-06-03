<?php
	class loaiphongModel{
		public $id;
		public $loaiphong;
		public $conn;
		function __construct($conn){
			$this->id = 0;
			$this->loaiphong="";
			$this->conn = $conn;
		}
		
		public function luuloaiphong()
		{
			if($this->kiemtra())
			{
				$lp = $this->loaiphong;
				$sql = "INSERT INTO loaiphong (loaiphong)
				VALUES ('$lp');";
			
				$this->conn->set_data($sql);
			}
			
		}
		public function sualoaiphong()
		{
			if($this->kiemtra())
			{
				$sql = "UPDATE loaiphong
					SET loaiphong = '$this->loaiphong'
					WHERE ID = $this->id;";
			
				$this->conn->set_data($sql);
			}
			
		}

		public function docdanhsachloaiphong()
		{
			$sql = "select * from loaiphong";
			$dsloaiphong = $this->conn->get_data($sql);
			return $dsloaiphong;
		}
		public function xoaloaiphong($id)
		{
			$sql = "DELETE FROM loaiphong WHERE ID = $id;";
			$this->conn->set_data($sql);
		}
		public function timkiemtheoID($id)
		{
			$sql = "select * from loaiphong where ID = $id;";
			
			$ds = $this->conn->get_data($sql);
			
			foreach ($ds as $key => $value) {
				$this->id = $value["ID"];
				$this->loaiphong = $value["loaiphong"];
			}	
		}
		public function kiemtra()
		{
			
			$sql = "SELECT * FROM loaiphong WHERE loaiphong = '$this->loaiphong'";

			$ds = $this->conn->get_data($sql);
			
			if(count($ds)>0)
			{
				return false;
			}
			return true;
			

			// Đóng kết nối
			//$conn->close();
		}

	}
 ?>