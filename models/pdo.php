<?php
	function get_connection(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db = "quanlykhachsan";

		
		  $conn = new mysqli($servername, $username, $password,$db);
		  // set the PDO error mode to exception
		  echo $conn->connect_error;
		  if($conn->connect_error===true)
		  {
		  	die("connect failed");
		  }
		  return $conn;
	} 

	function set_data($sql)
	{
		$conn = get_connection();
		$conn->query($sql);
		$conn->close();
	}


	function get_data($sql)
	{
		$conn = get_connection();
		$result = $conn->query($sql);
		$arr = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$conn->close();
		return $arr;
	}	
	// function get_data($sql)
	// {
	// 	$conn = get_connection();
	// 	$result = $conn->query($sql);
	// 	$conn->close();
	// 	return $result;
	// }	
?>