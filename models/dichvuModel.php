<?php
	class dichvuModel extends connect
	{
		public $id;
		public $tendichvu;
        public $giatri;
        public $donvi;

		function __construct(){
			$this->id = 0;
			$this->dichvu="";
            $this->giatri = 0;
            $this->donvi = "";
		}
		
		public function luudichvu()
		{
			if($this->kiemtra())
			{
				$tendichvu = $this->tendichvu;
                $giatri = $this->giatri;
                $donvi = $this->donvi;
				$sql = "INSERT INTO dichvu (tendichvu,giatri,donvi)
				VALUES ('$tendichvu',$giatri,'$donvi');";
				
				$this->set_data($sql);
			}
			
		}
		public function suadichvu()
		{
			$sql = "UPDATE dichvu
					SET tendichvu = '$this->tendichvu',giatri=$this->giatri,donvi='$this->donvi'
					WHERE ID = $this->id;";			
			//echo $sql;
				$this->set_data($sql);
		}

		public function docdanhsach()
		{
			$sql = "select * from dichvu";
			$ds = $this->get_data($sql);
			return $ds;
		}
		public function xoadichvu($id)
		{
			$sql = "DELETE FROM dichvu WHERE ID = $id;";
			$this->set_data($sql);
		}
		public function timkiemtheoID($id)
		{
			$sql = "select * from dichvu where ID = $id;";
			
			$ds = $this->get_data($sql);
			
			foreach ($ds as $key => $value) {
				$this->id = $value["ID"];
				$this->tendichvu = $value["tendichvu"];
                $this->giatri = $value["giatri"];
                $this->donvi = $value["donvi"];
			}	
		}
		public function kiemtra()
		{
			
			$sql = "SELECT * FROM dichvu WHERE tendichvu = '$this->tendichvu'";

			$ds = $this->get_data($sql);
			
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