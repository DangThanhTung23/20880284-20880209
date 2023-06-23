<?php
	class loaikhachhangModel extends connect
	{
		public $loaikhachID;
		public $loaikhach;
		
		public function __construct()
		{
			$this->loaikhachID = 0;
			$this->loaikhach = "";
		}
		// public function luutrangthai(object $conn)
		// {
		// 	$sql = "INSERT INTO trangthai (trangthai)
		// 		VALUES ('$this->trangthai');";
				
		// 	$conn->set_data($sql);
		// }
		// public function suatrangthai(object $conn,$id,$tt)
		// {
		// 	$sql = "UPDATE trangthai
		// 			SET trangthai = '$tt'
		// 			WHERE ID = $id;";
			
		// 	$conn->set_data($sql);
		// }
		// public static function docdanhsachtrangthai(object $conn)
		// {
		// 	$sql = "select * from trangthai";
		// 	$dstrangthai = $conn->get_data($sql);
		// 	return $dstrangthai;
		// }
		// public static function xoatrangthai(object $conn,$id)
		// {
		// 	$sql = "DELETE FROM trangthai WHERE ID = $id;";
		// 	$conn->set_data($sql);
		// }
		// public function timkiemtheoID($conn,$id)
		// {
		// 	$sql = "select * from trangthai where ID = $id;";
		// 	$ds = $conn->get_data($sql);
			
		// 	foreach ($ds as $key => $value) {
		// 		$this->id = $value["ID"];
		// 		$this->trangthai = $value["trangthai"];
		// 	}	
		// }
		// public function luutrangthai()
		// {
		// 	if($this->kiemtra())
		// 	{
		// 		$sql = "INSERT INTO trangthai (trangthai)
		// 		VALUES ('$this->trangthai');";
				
		// 		return $this->conn->set_data($sql);
		// 	}
		// 	return false;
		// }
		// public function suatrangthai()
		// {
		// 	if($this->kiemtra())
		// 	{
		// 		$sql = "UPDATE trangthai
		// 			SET trangthai = '$this->trangthai'
		// 			WHERE ID = $this->id;";
			
		// 		return $this->conn->set_data($sql);
		// 	}
		// 	return false;
		// }
		public function docdanhsachloaikhach()
		{
			$sql = "select * from loaikhachhang";
			$dsloaikh = $this->get_data($sql);
			return $dsloaikh;
		}
		// public function xoatrangthai($id)
		// {
		// 	$sql = "DELETE FROM trangthai WHERE ID = $id;";
		// 	$this->conn->set_data($sql);
		// }
		// public function timkiemtheoID($id)
		// {
		// 	$sql = "select * from trangthai where ID = $id;";
		// 	$ds = $this->conn->get_data($sql);
			
		// 	foreach ($ds as $key => $value) {
		// 		$this->id = $value["ID"];
		// 		$this->trangthai = $value["trangthai"];
		// 	}	
		// }
		// public function kiemtra()
		// {
		// 	// if ($this->conn->connect_error) {
		// 	// 	die("Kết nối không thành công: " . $this->conn->connect_error);
		// 	// }

		// 	// Chuỗi truy vấn SQL để kiểm tra dữ liệu
		// 	$sql = "SELECT * FROM trangthai WHERE trangthai = '$this->trangthai'";
			
		// 	$ds = $this->conn->get_data($sql);
			
		// 	if(count($ds)>0)
		// 	{
		// 		return false;
		// 	}
		// 	return true;
			

		// 	// Đóng kết nối
		// 	// $conn->close();
		// }
	} 
	
?>