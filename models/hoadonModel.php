<?php
	class hoadonModel{
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
		public $conn;
	
		public function __construct($conn)
		{
			$this->conn = $conn;
		}
		
		public function luuhd()
		{
			$sql = "INSERT into hoadon (ID,datphongID,loaithanhtoan,tongtienthanhtoan,tenkhachhang,tennguoithanhtoan,
			ngaydatphong,ngayketthuc,diachinguoithanhtoan,MST,stk,tongtiensauthue,VAT,VATthanhtoan,songaythue,phuthuloaikhach,CMND) VALUES
			('$this->ID','$this->datphongID','$this->loaithanhtoan',$this->tongtienthanhtoan,'$this->tenkhachhang','$this->tennguoithanhtoan',
			'$this->ngaydatphong','$this->ngayketthuc','$this->diachinguoithanhtoan','$this->MST','$this->stk',$this->tongtiensauthue,
			$this->VAT,$this->VATthanhtoan,$this->songaythue,$this->phuthuloaikhach,'$this->CMND');";
			
			return $this->conn->set_data($sql);
		}
		public function docdanhsach(){
			$sql = "select * from hoadon order by ngayketthuc DESC";
			$ds = $this->conn->get_data($sql);
			return $ds;
		}
		public function timkiem($key,$tungay,$denngay){
			
			if(isset($tungay)&&isset($denngay)&&$tungay!=''&&$denngay!='')
			{

				$sql = "select * from hoadon where (tenkhachhang like '%$key%' or CMND like '%$key%') and (ngayketthuc between '$tungay' and 
				'$denngay');";
				//echo $sql;
				$ds = $this->conn->get_data($sql);
			}
			else{
				$sql = "select * from hoadon where tenkhachhang like '%$key%' or CMND like '%$key%';";
				$ds = $this->conn->get_data($sql);
			}
			return $ds;
		}
		public function timkiemtheongay($tungay,$denngay)
		{
			$sql = "select * from hoadon where ngayketthuc between '$tungay' and '$denngay';";
			$ds = $this->conn->get_data($sql);
			return $ds;
		}
		public function timkiemtheoID($id)
		{
			$sql = "select * from hoadon where ID = '$id';";
			$ds = $this->conn->get_data($sql);
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
			}
			return $this;

		}
		

		public function xoahoadontheoid($id)
		{
			$sql = "DELETE FROM hoadon where ID = '$id';";

			$this->conn->set_data($sql);
			$sql = "DELETE FROM p_hd where hoadonID = '$id';";
			$this->conn->set_data($sql);
		}
		
	}
 ?>