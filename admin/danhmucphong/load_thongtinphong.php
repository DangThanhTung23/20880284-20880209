<div class="row">
		<form method="post" action="index.php?action=thongtinphong" enctype="multipart/form-data" style="width:80%">
			<div class="text-center">
				<h4>Thêm phòng</h4>
			</div>
			<div class="row">
				<div class="form-group col col-md-6">
                    <label class="form-label">Tên Phòng</label>
                    <input type="text" id="txt_tenphong" required name="tenphong" class="form-control" value="<?php echo $p->tenphong ?>" />
                </div>
                <div class="form-group col col-md-6">
                    <label class="form-label">ID phòng</label>
                    <input type="text" id="txt_phongID" readonly name="phongID" class="form-control" value="<?php echo $p->id ?>" />
                </div>
			</div>
            <div class="row">
                 <div class="form-group col col-md-6">
                            <label class="form-label">Giá Tiền</label>
                            <input type="number" id="txt_giatien" name="giatien" class="form-control" value="<?php echo $p->giaphong ?>" />
                </div>
                <div class="form-group col col-md-6">
                    <label class="form-label">Loại Phòng</label>
                    <select name="loaiphongID" class="form-control">
                        <?php foreach ($dsloaiphong as $key => $value): ?>
                            <option class="form-control" <?php if($value['ID']==$p->loaiphongID) echo "selected" ?> value="<?php echo $value["ID"] ?>"><?php echo $value["loaiphong"]; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
                
            <div class="row">
                <div class="form-group col col-md-6">
                    <label class="form-label">Trạng thái</label>
                    <select name="trangthaiID" class="form-control">
                        <?php foreach ($dstrangthai as $key => $value): ?>
                            <option readonly class="form-control" <?php if($value['ID']==$p->trangthaiID){echo "selected";} ?> value="<?php echo $value["ID"] ?>"><?php echo $value["trangthai"] ?></option>
                        <?php endforeach ?>
                        
                    </select>
                </div>

                <div class="form-group col col-md-6">
                    <label class="form-label">Số Lượng Người</label>
                    <input type="number" name="soluongnguoi" id="txt_soluongnguoi" class="form-control" value="<?php if(isset($p)) echo $p->soluongtoida ?>" />
               </div>
            </div> 

                        
                        <div class="form-group">
                            <textarea name="mota" placeholder="Mô tả" id="txtarea_mota"><?php echo $p->mota ?></textarea>
                        </div>

                        <?php
                            if(isset($p))
                            {
                                if($p->img==""||$p->img==null)
                                {
                                    echo "không có hình";
                                }
                                else{
                                    echo '<img id="phongimg" style="width:200px;border:solid; margin-top:20px" src="'.'../'.$p->img.'" />';
                                }
                            } 
                         ?>
                        <input type="hidden" name="old_phong_img" value="<?php echo $p->img ?>">
                        <div class="form-group mt-3">
                            <input type="file" id="upload_img" class="form-control" name="phong_img" value="" title="Tải ảnh"/>
                        </div>
            <div class="row">
                <div class="col">
                    <input type="hidden" name="id_edit" value="<?php echo $p->id ?>">
                    <div class="row">
                        <?php echo $tb ?>
                    </div>

                    <div class="row" style="float: right;">
                        <input name="btn_luuphong" type="submit" value="Save" class="btn btn-success m-3">
                        <input name="btn_suaphong" type="submit" value="Update" class="btn btn-success m-3">
                        <button class="btn btn-success m-3" formaction="index.php?action=danhmucphong">Thoát</button>
                    </div>
                </div>
            </div>
                        
        </form>
	</div>