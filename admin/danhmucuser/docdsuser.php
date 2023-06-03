<?php
	$u = new userModel($conn);
	$dsuser = $u->docdanhsachuser();
	$dsrole = userModel::$dsrole;
 ?>
