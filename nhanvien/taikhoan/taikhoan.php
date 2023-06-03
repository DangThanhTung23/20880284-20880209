<?php
	$username = $_SESSION['user'];
	$pass = $_SESSION['pass'];
	$u = new userModel($conn);
      
    $arr = $u->timkiemuser($username,$pass);
    $tb = "";
	
	//$dsrole = userModel::$dsrole ;
	// if(isset($_POST['btn_luuuser'])&&($_POST['btn_luuuser']))		
	// {

	// 	$u->ten = $_POST["ten"];
	// 	$u->diachi = $_POST["diachi"];
	// 	$u->email = $_POST['email'];
	// 	$u->user = $_POST['user'];
	// 	$u->pass = $_POST['pass'];
	// 	//$u->role = $_POST["role"];
	// 	$u->sdt = $_POST["sdt"];
		

	// 	if($u->luuuser() ===true)
	// 	{
	// 		$tb = "Đã lưu thành công";
	// 	}
	// 	else
	// 	{
	// 		$tb="Dữ liệu nhập có vấn đề";
	// 	}
	// }
	
	if(isset($_POST['btn_suauser'])&&$_POST['btn_suauser']&&$_POST["id_edit"]>0)
	{
		
		$u->ten = $_POST["ten"];
		$u->diachi = $_POST["diachi"];
		$u->email = $_POST['email'];
		$u->user = $_POST['user'];
		$u->pass = $_POST['pass'];
		//$u->role = $_POST["role"];
		//$u->id = $_POST["id_edit"];
		$u->sdt = $_POST["sdt"];
		
		if($u->suauser() ===true)
		{
			$tb = "Đã update thành công";
		}
		else{
			$tb="Dữ liệu nhập có vấn đề";
		}
		$_SESSION['user'] = $_POST['user'];
		$_SESSION['pass'] = $_POST['pass'];
	}
 ?>
 <div class="container">
		<form method="post" action="index.php?action=taikhoan" enctype="multipart/form-data" style="width:80%">
			<div class="text-center mb-5">
				<h4>Thông tin tài khoản</h4>
			</div>
			<div class="row">
				<div class="form-group col col-md-6">
                    <label class="form-label">Tên</label>
                    <input type="text" id="" name="ten" class="form-control" value="<?php echo $u->ten ?>" />
                </div>
                <div class="form-group col col-md-6">
                            <label class="form-label">Email</label>
                            <input type="text" id="" name="email" class="form-control" value="<?php echo $u->email ?>" />
                </div>
			</div>
			 <div class="row">
                <div class="form-group col col-md-6">
                    <label class="form-label">User name</label>
                    <input type="text" id="" name="user" class="form-control" value="<?php echo $u->user ?>" />
                </div>

                <div class="form-group col col-md-6">
                    <label class="form-label">Password</label>
                    <input type="text" name="pass" id="" class="form-control" value="<?php echo $u->pass ?>" />
               </div>
            </div> 
            <div class="row">
                <div class="form-group col col-md-6">
                    <label class="form-label">Địa chỉ</label>
                    <input type="text" name="diachi" id="" class="form-control" value="<?php echo $u->diachi ?>" />
               </div>
               <div class="form-group col col-md-6">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" name="sdt" id="" class="form-control" value="<?php echo $u->sdt ?>" />
               </div>
            </div>
            
                
           
                        
                        
            <div class="row">
                <div class="col">
                    <input type="hidden" name="id_edit" value="<?php echo $u->id ?>">
                    <div class="row">
                        <?php echo $tb ?>
                    </div>

                    <div class="row" style="float: right;">
                        <input name="btn_suauser" type="submit" value="Update" class="btn btn-success m-3">
                        <button class="btn btn-success m-3" formaction="index.php">Thoát</button>
                    </div>
                </div>
            </div>
                        
        </form>
	</div>
