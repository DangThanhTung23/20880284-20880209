<?php
	
	class userModel extends connect
	{
		public $id;
		public $ten;
		public $diachi;
		public $email;
		public $user;
		public $pass;
		public $role;
		public $sdt;
		public $conn;
		public static $dsrole = [['id'=>1,'role'=>'admin'],['id'=>2,'role'=>'Quản lý']];
	
		public function __construct()
		{
			$this->role = 0;
			$this->id = 0;
			
		}
		public function luuuser()
		{	
			if($this->kiemtra())
			{
				
				$sql = "INSERT INTO user (ten, diachi ,email, user, pass,role,sdt)
				VALUES ('$this->ten','$this->diachi','$this->email','$this->user','$this->pass',$this->role,'$this->sdt');";
				
			
				return $this->set_data($sql);
			}
			
			
		}
		public function docdanhsachuser()
		{
			
			$sql = "select * from user";
				
			$ds = $this->get_data($sql);
			//var_dump($ds);
			return $ds;

		}
		public function xoauser($id)
		{
			$sql = "DELETE FROM user WHERE ID = $id;";
			
			$this->set_data($sql);
		}
		public function timkiemtheoID($id)
		{
			$sql = "select * from user where ID = $id;";
			$ds = $this->get_data($sql);
			foreach ($ds as $key => $value) {
				$this->id = $value["ID"];
				$this->ten = $value["ten"];
				$this->diachi = $value["diachi"];
				$this->email = $value["email"];
				$this->pass = $value["pass"];
				$this->user = $value["user"];
				$this->role = $value["role"];
				$this->sdt = $value['sdt'];
			}
				
		}

		public function timkiemuser($loginName,$pass)
		{
			
			$sql = "select * from user where (email = '$loginName' or user = '$loginName' ) and pass = '$pass';";
			
			$ds = $this->get_data($sql);
			// var_dump($ds);
			
			foreach ($ds as $key => $value) {
				$this->id = $value["ID"];
				$this->ten = $value["ten"];
				$this->diachi = $value["diachi"];
				$this->email = $value["email"];
				$this->pass = $value["pass"];
				$this->user = $value["user"];
				$this->role = $value["role"];
				$this->sdt = $value['sdt'];
			}
			return $ds;
				
		}


		public function suauser()
		{
			if($this->kiemtra())
			{
				$sql = "UPDATE user SET ten = '$this->ten' ,diachi = '$this->diachi',email = '$this->email',user='$this->user',pass='$this->pass',role=$this->role,sdt = '$this->sdt' WHERE ID = $this->id;";
			
				return $this->set_data($sql);
			}
			
		}
		public function kiemtra()
		{
			
			$sql = "SELECT * FROM user WHERE (user = '$this->user' or email='$this->email') and ID<>$this->id ;";
			$ds = $this->get_data($sql);
			
			if(count($ds)>0)
			{
				return false;
			}
			return true;
			

			// Đóng kết nối
			//$conn->close();
		}
		public function phantrang($p,$key,$limit,&$count)
		{
			$offset = $limit*$p;
			$sql = "select count(ID) as count from user where ten like '%$key%' or user like '%$key%';";
			$ds = $this->get_data($sql);
			//var_dump($ds);
			$count = $ds[0]['count'];
			
			$sql = "select * from user where ten like '%$key%' or user like '%$key%' ORDER BY role,ten LIMIT $limit OFFSET $offset;";
				$ds = $this->get_data($sql);
			//echo $sql;
			//var_dump($ds);
			return $ds;
			
		}

	}


 ?>