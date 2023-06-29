<?php
	//include "../models/thamsoModel.php";
	// if(isset($_POST['btn_luutrangthai'])&&$_POST['btn_luutrangthai'])
	// {
		
	// 	$trangthai = $_POST['trangthai'];
	
	// 	$sql = "INSERT INTO trangthai (trangthai)
	// 			VALUES ('$trangthai');";
				
	// 		set_data($sql);
	// }
    $dv = new dichvuModel();

    if(isset($_POST["btn_luudichvu"])&&$_POST["btn_luudichvu"])
    {
        $dv->giatri = $_POST['giatridichvu'];
        $dv->tendichvu = $_POST['dichvu'];
        $dv->donvi = $_POST['donvi'];
        $dv->luudichvu();
    }
    if(isset($_POST["btn_suadichvu"])&&$_POST["btn_suadichvu"]&&$_POST["id"]>0)
    {
        $dv->id = $_POST["id"];
        
        $dv->tendichvu = $_POST['dichvu'];
        $dv->giatri = $_POST["giatridichvu"];
        $dv->donvi = $_POST["donvi"];
        $dv->suadichvu();
    }



	//Hiển thị danh sách
    $ts = new thamsoModel();
    if(isset($_POST["btn_luuthamso"])&&$_POST["btn_luuthamso"])
    {
        $ts->giatri = $_POST['giatrithamso'];
        $ts->luuthamso();
    }
    if(isset($_POST["btn_suathamso"])&&$_POST["btn_suathamso"]&&$_POST["id"]>0)
    {
        $ts->id = $_POST["id"];
        
        $ts->thamso = $_POST['thamso'];
        $ts->giatri = $_POST["giatri"];
        $ts->suathamso();
    }

    $dv = new dichvuModel();
    $dsdichvu = $dv->docdanhsach();
	$ts = new thamsoModel();
	$dsthamso = $ts->docdanhsach();
	//var_dump($dstrangthai);
 ?>