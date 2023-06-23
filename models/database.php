<?php
	class connect{
		// public $conn;
		// public function __construct(){
		// 	$servername = "localhost";
		// 	$username = "root";
		// 	$password = "";
		// 	$db = "quanlykhachsan";
		// 	// $servername = "sql304.epizy.com";
		// 	// $username = "epiz_33257338";
		// 	// $password = "6Twob1hDW3FO98q";
		// 	// $db = "epiz_33257338_QuanLyKhachSan";
		// 	$this->conn = new mysqli($servername, $username, $password,$db);
		// 	  // set the PDO error mode to exception
		// 	  echo $this->conn->connect_error;
		// 	  if($this->conn->connect_error===true)
		//   		{
		//   			die("connect failed");
		//   		}
		// }


		public function get_data($sql)
		{
			$conn = mysqli_connect("localhost","root","","quanlykhachsan");
			$result = mysqli_query($conn,$sql);
			//var_dump($result);
			$arr = mysqli_fetch_all($result,MYSQLI_ASSOC);
			//var_dump($arr);
			mysqli_close($conn);
			return $arr;
			
		}	


		public function set_data($sql)
		{
			$conn = mysqli_connect("localhost","root","","quanlykhachsan");
			$chk = mysqli_query($conn,$sql);
			mysqli_close($conn);
			return $chk;
		}
		// public function close_conn(){
		// 	$this->conn->close();
		// }

	
	} 
 ?>