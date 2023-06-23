<?php
	class loaithanhtoanModel extends connect
	{
		public $id;
		public $loaithanhtoan;
		public $conn;
		
		public function docdanhsach()
		{
			$sql = "select * from loaithanhtoan";
			$ds = $this->get_data($sql);
			return $ds;
		}

	} 
 ?>