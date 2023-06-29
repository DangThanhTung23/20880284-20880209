<?php
	class thamsoModel extends connect
	{
		public $id;
		public $thamso;
        public $giatri;
        

		function __construct(){
			$this->id = 0;
			//$this->thamso="";
            $this->giatri = 0;
            
		}
		
		public function luuthamso()
		{
			if($this->kiemtra())
			{
				$thamso = $this->thamso;
                $giatri = $this->giatri;
                
				$sql = "INSERT INTO thamso (thamso,giatri)
				VALUES ('$thamso',$giatri);";
			
				$this->set_data($sql);
			}
			
		}
		public function suathamso()
		{
			$sql = "UPDATE thamso
					SET thamso = '$this->thamso',giatri=$this->giatri
					WHERE id = $this->id;";
							
			$this->set_data($sql);
		}

		public function docdanhsach()
		{
			$sql = "select * from thamso";
			$ds = $this->get_data($sql);
			return $ds;
		}
		public function xoathamso($id)
		{
			$sql = "DELETE FROM thamso WHERE id = $id;";
			$this->set_data($sql);
		}
		public function timkiemtheoID($id)
		{
			$sql = "select * from thamso where id = $id;";
			
			$ds = $this->get_data($sql);
			foreach ($ds as $key => $value) {
				$this->id = $value["id"];
				$this->thamso = $value["thamso"];
                $this->giatri = $value["giatri"];
			}	
		}
		public function kiemtra()
		{
			
			$sql = "SELECT * FROM thamso WHERE thamso = '$this->thamso'";

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