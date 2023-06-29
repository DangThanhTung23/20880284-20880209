<?php
	class hoadonModel extends connect
	{
		public $ID;
		public $datphongID;
		public $loaithanhtoan;
		public $tongtienthanhtoan;
		public $tenkhachhang;
		public $tennguoithanhtoan;
		public $ngaydatphong;
		public $ngayketthuc;
		public $diachinguoithanhtoan;
		public $MST;
		public $stk;
		public $tongtiensauthue;
		public $VAT;
		public $VATthanhtoan;
		public $songaythue;
		public $phuthuloaikhach;
		public $CMND;
		public $tongtienphong;
		public $tongtiendichvu;
	
		
		
		public function luuhd()
		{
			$sql = "INSERT into hoadon (ID,datphongID,loaithanhtoan,tongtienthanhtoan,tenkhachhang,tennguoithanhtoan,
			ngaydatphong,ngayketthuc,diachinguoithanhtoan,MST,stk,tongtiensauthue,VAT,VATthanhtoan,songaythue,phuthuloaikhach,CMND,tongtienphong,tongtiendichvu) VALUES
			('$this->ID','$this->datphongID','$this->loaithanhtoan',$this->tongtienthanhtoan,'$this->tenkhachhang','$this->tennguoithanhtoan',
			'$this->ngaydatphong','$this->ngayketthuc','$this->diachinguoithanhtoan','$this->MST','$this->stk',$this->tongtiensauthue,
			$this->VAT,$this->VATthanhtoan,$this->songaythue,$this->phuthuloaikhach,'$this->CMND',$this->tongtienphong,$this->tongtiendichvu);";
			//echo $sql;
			
			return $this->set_data($sql);
		}
		public function docdanhsach(){
			$sql = "select * from hoadon order by ngayketthuc DESC";
			$ds = $this->get_data($sql);
			return $ds;
		}
		public function timkiem($key,$tungay,$denngay){
			
			if(isset($tungay)&&isset($denngay)&&$tungay!=''&&$denngay!='')
			{

				$sql = "select * from hoadon where (tenkhachhang like '%$key%' or CMND like '%$key%') and (ngayketthuc between '$tungay' and 
				'$denngay');";
				//echo $sql;
				$ds = $this->get_data($sql);
			}
			else{
				$sql = "select * from hoadon where tenkhachhang like '%$key%' or CMND like '%$key%';";
				$ds = $this->get_data($sql);
			}
			return $ds;
		}
		public function timkiemtheongay($tungay,$denngay)
		{
			$sql = "select * from hoadon where ngayketthuc between '$tungay' and '$denngay';";
			$ds = $this->get_data($sql);
			return $ds;
		}
		public function timkiemtheoID($id)
		{
			$sql = "select * from hoadon where ID = '$id';";
			$ds = $this->get_data($sql);
			foreach ($ds as $key => $value) {
				$this->ID = $value["ID"];
				$this->datphongID = $value['datphongID'];
				$this->loaithanhtoan = $value['loaithanhtoan'];
				$this->tongtienthanhtoan = $value['tongtienthanhtoan'];
				$this->tenkhachhang = $value['tenkhachhang'];
				$this->tennguoithanhtoan = $value['tennguoithanhtoan'];
				$this->ngaydatphong = $value['ngaydatphong'];
				$this->ngayketthuc = $value["ngayketthuc"];
				$this->diachinguoithanhtoan = $value['diachinguoithanhtoan'];
				$this->MST = $value['MST'];
				$this->stk = $value['stk'];
				$this->tongtiensauthue = $value['tongtiensauthue'];
				$this->VAT = $value['VAT'];
				$this->VATthanhtoan = $value['VATthanhtoan'];
				$this->songaythue = $value['songaythue'];
				$this->phuthuloaikhach = $value['phuthuloaikhach'];
				$this->CMND = $value['CMND'];
				$this->tongtienphong = $value['tongtienphong'];
				$this->tongtiendichvu = $value['tongtiendichvu'];
			}
			return $this;

		}
		

		public function xoahoadontheoid($id)
		{
			$sql = "DELETE FROM hoadon where ID = '$id';";

			$this->set_data($sql);
			$sql = "DELETE FROM p_hd where hoadonID = '$id';";
			$this->set_data($sql);
		}
		public function phantrang($p,$key,$tungay,$denngay,$limit,&$count)
		{
			$offset = $limit*$p;
			$sql = "select count(ID) as count from hoadon where tenkhachhang like '%$key%' or CMND like '%$key%';";
			$ds = $this->get_data($sql);
			//var_dump($ds);
			$count = $ds[0]['count'];
			if(isset($tungay)&&isset($denngay)&&$tungay!=''&&$denngay!='')
			{

				$sql = "select count(ID) as count from hoadon where (tenkhachhang like '%$key%' or CMND like '%$key%') and (ngayketthuc between '$tungay' and 
				'$denngay')";
				//echo $sql;
				$ds = $this->get_data($sql);
			}
			$count = $ds[0]['count'];
			if(isset($tungay)&&isset($denngay)&&$tungay!=''&&$denngay!='')
			{

				$sql = "select * from hoadon where (tenkhachhang like '%$key%' or CMND like '%$key%') and (ngayketthuc between '$tungay' and 
				'$denngay') ORDER BY ngayketthuc DESC LIMIT $limit OFFSET $offset;";
				//echo $sql;
				$ds = $this->get_data($sql);
			}
			else{
				$sql = "select * from hoadon where tenkhachhang like '%$key%' or CMND like '%$key%' ORDER BY ngayketthuc DESC LIMIT $limit OFFSET $offset;";
				$ds = $this->get_data($sql);
			}
			return $ds;
			
		}
		
	}
 ?>