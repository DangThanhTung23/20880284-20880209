<?php
	$p_dp = new p_dpModel($conn);
	$dp = new datphongModel($conn);
	if(isset($_GET['id']))
	{
		$dp->xoadatphongtheoid($_GET['id']);
	} 
 ?>