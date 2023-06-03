<?php
	class thamsoModel{
		public $id;
		public $thamso;
		public $giatri;
		public $conn;
		public function __construct($conn)
		{
			$this->conn = $conn;
		}
		public function docdanhsach()
		{
			$sql = "select * from thamso";
			$ds = $this->conn->get_data($sql);
			return $ds;
		}

	} 
 ?>