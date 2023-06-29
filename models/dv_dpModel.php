<?php
	class dv_dpModel extends connect
	{
		public $ID;
		public $datphongID;
		public $dichvuID;
		public $tendichvu;
		public $giatri;
		public $donvi;
        public $soluong;
		public $thanhtien;

		public function docdanhsach(){
			$sql = "select * from dv_dp";
			$ds = $this->get_data($sql);
			return $ds;
		}
		public function docdanhsachtheodatphongID($id)
		{
			$sql = "select * from dv_dp where datphongID='$id'";
			$ds = $this->get_data($sql);
			return $ds;
		}
		
		public function luudv_dp()
		{
			if(isset($this->soluong)&&isset($this->giatri))
			{
				$this->thanhtien = $this->soluong*$this->giatri;
			}
			else
			{
				$this->thanhtien = 0;
			}
			$sql = "INSERT into dv_dp (datphongID,dichvuID,tendichvu,giatri,donvi,soluong,thanhtien) VALUES
			('$this->datphongID',$this->dichvuID,'$this->tendichvu',$this->giatri,'$this->donvi',$this->soluong,$this->thanhtien)";

			//echo $sql;
			return $this->set_data($sql);
		}
		public function timkiemtheodatphongID($id)
		{
			$sql = "select * from dv_dp where datphongID = '$id';";
			
			$ds = $this->get_data($sql);
			return $ds;
		}
		public function xoa($id)
        {
            $sql = "DELETE FROM dv_dp WHERE ID = $id;";
			//echo $sql;
			return $this->set_data($sql);
        }
		public function xoatheodatphongID($id)
		{
			$sql = "DELETE FROM dv_dp WHERE datphongID = '$id'";
			//echo $sql;
			return $this->set_data($sql);
		}
	}
 ?>