<?php
	class database{
		public $conn;
		public function __construct(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db = "quanlykhachsan";
			$this->conn = new mysqli($servername, $username, $password,$db);
			  // set the PDO error mode to exception
			  echo $this->conn->connect_error;
			  if($this->conn->connect_error===true)
		  		{
		  			die("connect failed");
		  		}
		}


		public function get_data($sql)
		{
			$result = $this->conn->query($sql);
			//var_dump($result);
			$arr = mysqli_fetch_all($result,MYSQLI_ASSOC);
			//var_dump($arr);
			return $arr;
		}	


		public function set_data($sql)
		{
			return $this->conn->query($sql);
		}
		public function close_conn(){
			$this->conn->close();
		}


	} 
 ?>