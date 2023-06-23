<?php
	$p_dp = new p_dpModel();
	$dp = new datphongModel();
	if(isset($_GET['id']))
	{
		$dp->xoadatphongtheoid($_GET['id']);
	} 
 ?>