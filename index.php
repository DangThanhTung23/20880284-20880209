<?php
	include "models/database.php";
	include "models/phongModel.php";
	include "models/loaiphongModel.php";
	include "models/trangthaiModel.php";
	include "models/userModel.php";
	include "lib/function.php";
	ob_start();
	session_start();

	include("header.php");
	$conn = new database();

	$title = "";
	$body = "";
	$action = "";
	if(isset($_GET['action']))
	{
		$action = $_GET['action'];
	}

	switch ($action) {
		
		case "datphong":
			break;


		case "lienhe":
			break;


		
		default:
			break;
	}
	$conn->close_conn();

	include("footer.php");
	$header = file_get_contents("header.php");
	$header = str_replace("{{title}}", $title, $header);
	// $page = str_replace("{{body}}",$body,$page);
 ?>