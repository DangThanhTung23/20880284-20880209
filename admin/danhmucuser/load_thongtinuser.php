<div class="row">
		<form method="post" action="index.php?action=thongtinuser" enctype="multipart/form-data" style="width:80%">
			<div class="text-center">
				<h4>Thông tin người dùng </h4>
			</div>
			<div class="row">
				<div class="form-group col col-md-6">
                    <label class="form-label">Tên</label>
                    <input type="text" id="" name="ten" class="form-control" value="<?php echo $u->ten ?>" />
                </div>
                <div class="form-group col col-md-6">
                    <label class="form-label">ID</label>
                    <input type="text" id="" readonly name="" class="form-control" value="<?php echo $u->id ?>" />
                </div>
			</div>
            <div class="row">
                 <div class="form-group col col-md-6">
                            <label class="form-label">email</label>
                            <input type="text" id="" name="email" class="form-control" value="<?php echo $u->email ?>" />
                </div>
                <div class="form-group col col-md-6">
                    <label class="form-label">Vai trò</label>
                    <select name="role" class="form-control">
                        <?php foreach ($dsrole as $keyrole => $valuerole): ?>
                            <option class="form-control" <?php if($valuerole['id']==$u->role) echo "selected" ?> value="<?php echo $valuerole['id'] ?>"><?php echo $valuerole['role']; ?></option>
                        <?php endforeach ?>
                    </select>
                    
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
                        <input name="btn_luuuser" type="submit" value="Save" class="btn btn-success m-3">
                        <input name="btn_suauser" type="submit" value="Update" class="btn btn-success m-3">
                        <button class="btn btn-success m-3" formaction="index.php?action=danhmucuser">Thoát</button>
                    </div>
                </div>
            </div>
                        
        </form>
	</div>