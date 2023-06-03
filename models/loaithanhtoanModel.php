<?php
	class loaithanhtoanModel{
		public $id;
		public $loaithanhtoan;
		public $conn;
		public function __construct($conn)
		{
			$this->conn = $conn;
		}
		public function docdanhsach()
		{
			$sql = "select * from loaithanhtoan";
			$ds = $this->conn->get_data($sql);
			return $ds;
		}

	} 
 ?>