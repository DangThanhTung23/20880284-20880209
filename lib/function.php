<?php
	function createFilename($file,$target_dir)
	{
		if($file["name"]=="")
		{
			return "";
		}
		else
		{
			$date = date("ymd-His");
			$filename = $date.$file["name"];
			$target_file = $target_dir.'/'.$filename;
			return $target_file;
		}
	}
	function uploadFile($file,$target_file){
		if(file_exists($target_file))
		{
			die();
		}
		else
		{
			if($file['error']==0)
			{
				if(strpos($file['type'],'image')!==false)
				{	
					move_uploaded_file($file['tmp_name'], $target_file) ;
				}
			}
		}
	} 
	function locdanhsachphong($keys,$trangthaiID,$loaiphongID)
	{
		
		if(isset($keys)==null)
		{
			$key = "";
		}
		if(isset($trangthaiID)==null)
		{
			$trangthaiID = 0;
		}
		if(isset($loaiphongID)==null)
		{
			$loaiphongID = 0;
		}
		$p = new phongModel();
		$ds = $p->docdanhsachphong();
		$ds1 = array();
		$result = array();
		
		
		if($keys==""&&$trangthaiID==0&&$loaiphongID==0)
		{
			$ds1 = $ds;
			$result = $ds1;
			
		}
		else
		{
			if($keys == "")
			{
				$ds1 = $ds;
				$result = $ds1;
			}
			else{
				foreach ($ds as $key => $p) {
					if(str_contains($p['tenphong'], $keys))
					{
						array_push($ds1, $p);
					}
				}
			}
			
			$ds2 = array();
			if($trangthaiID == 0)
			{
				$ds2 = $ds1;
				$result = $ds2;
			}
			else{
				foreach ($ds1 as $key => $p) {
					if($p['trangthaiID']==$trangthaiID)
					{
						array_push($ds2,$p);
					}
				}
			}
			
			$ds3 = array();
			if($loaiphongID == 0)
			{
				$ds3 = $ds2;
				$result = $ds3;
			}
			else{
				foreach ($ds2 as $key => $p) {
					if($p['loaiphongID']==$loaiphongID)
					{
						array_push($ds3,$p);
					}
				}
			}
			$result = $ds3;	
		}		
	return $result;
}
?>