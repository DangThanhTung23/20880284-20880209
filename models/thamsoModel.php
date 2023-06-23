<?php
	class thamsoModel extends connect
	{
		public $id;
		public $thamso;
		public $giatri;
		
		
		public function docdanhsach()
		{
			$sql = "select * from thamso";
			$ds = $this->get_data($sql);
			return $ds;
		}

	} 
 ?>