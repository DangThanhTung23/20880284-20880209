<div style="width:90%;margin: 0 auto;">
<form action="index.php?action=datphong" method="post">
	<div class="row mt-5">
		<div class="col col-md-6">
			<input class="form-control" type="text" name="key" placeholder="Tìm kiếm ...">
		</div>

		<div class="col col-md-3">
			<div class="row">
				<div class="form-group col col-md-5">
                    <select name="trangthaiID" class="form-control">
                    	<option value="0">Tất cả</option>
                        <?php foreach ($dstrangthai as $key => $value): ?>
                            <option class="form-control" value="<?php echo $value["ID"] ?>"><?php echo $value["trangthai"] ?></option>
                        <?php endforeach ?>        
                    </select>
	             </div>
	             <div class="form-group col col-md-5">
	                    <select name="loaiphongID" class="form-control">
	                    	<option value="0">Tất cả</option>
	                        <?php foreach ($dsloaiphong as $key => $value): ?>
	                            <option class="form-control" value="<?php echo $value["ID"] ?>"><?php echo $value["loaiphong"]; ?></option>
	                        <?php endforeach ?>
	                    </select>
	            </div>
			</div>
		</div>
		<div class="col col-md-4 mb-2">
			<input type="submit" class="btn btn-success" name="btn_timkiem" value="Tìm kiếm" name="">
		</div>
	</div>
	
</form>




<div class='row'>
	<div class="col col-md-8">
		<div class="row mt-5">
			<?php foreach ($dsphong as $key => $value): ?>
				<div class="col col-md-6 p-3">
					<form action="index.php?action=datphong" method="post">
						<div class="card" style="height: 100%;">
							<div style="width: 100%;">
								<img src="<?php echo $value["img"] ?>" class="card-img-top" alt="...">
							</div>
						  <!-- <img src="../<?php echo $value["img"] ?>" class="card-img-top" alt="..."> -->
						  <div class="card-body">
						    <h5 class="card-title" name="tenphong"><?php echo $value["tenphong"]; ?></h5>
						    <p class="card-text" name="soluongtoida"><b>Số lượng tối đa : <?php echo $value["soluongtoida"]; ?></b></p>
						    <p class="card-text"><b>Giá Phòng : <?php echo $value['giaphong']; ?></b></p>
						    <p class="card-text">Loại phòng : <?php foreach ($dsloaiphong as $keylp => $lp) {
						    	if($lp['ID']==$value['loaiphongID'])	echo $lp['loaiphong'];
						    } ?></p>
						    <p class="card-text">Trạng thái : <?php foreach ($dstrangthai as $keytt => $tt) {
						    	if($tt['ID']==$value['trangthaiID'])	echo $tt['trangthai'];
						    } ?></p>


						    <p class="card-text"><?php echo $value['mota']; ?></p>
						    <input type="hidden" name="tenphong" value="<?php echo $value['tenphong'] ?>">
						    <input type="hidden" name="phongID" value="<?php echo $value['phongID'] ?>">
						    <input type="hidden" name="giaphong" value="<?php echo $value['giaphong'] ?>">
						    <input type="hidden" name="soluongtoida" value="<?php echo $value['soluongtoida'] ?>">
						    <input type="hidden" name="trangthaiID" value="<?php echo $value['trangthaiID'] ?>">
						    <input type="hidden" name="loaiphongID" value="<?php echo $value['loaiphongID'] ?>">
						    <p class="card-text"><?php echo $value['mota']; ?></p>
						    <p><label class="form-label">Số lượng người : </label>
						    	<input type="number" name="soluong" value="0"></p>
						    <input type="submit" class="btn btn-success" name="btn_chonphong" value="Đặt phòng">
						  </div>
						</div>
					</form>	
				</div>
			<?php endforeach ?>
		</div>
		
	</div>
	<div class="col col-md-4 mt-3">
			<div class="p-2">
				<form class="mt-3" action="index.php?action=datphong" method="post">
					<div class="border p-5 mb-3" style="border-radius: 10px;">
						<div class="text-center mb-5">
							<h4 class="">Đặt phòng</h4>
						</div>
						<div class="border p-3">
							<?php echo $tbdp; ?>
						</div>
					<div>
				  <div class="form-group mt-5">
				    <input type="text" class="form-control" name="tenkhachhang" placeholder="Nhập tên quý khách">
				  </div>
				  <div class="form-group">
				    <input type="text" class="form-control" name="CMND" placeholder="CMND">
				  </div>
				  <div class="form-group">
				  	<input type="text" class="form-control" placeholder="Số điện thoại" name="sdt">
				  </div>
				  <!--  <div class="form-group">
				    <input type="number" class="form-control" name="soluongnguoi" placeholder="Nhập số lượng người">
				  </div> -->
				  <div class="form-group">
				  	<label class="form-label">Loại khách</label>
                   	<select name="loaikhachID" class="form-control">
                        <?php foreach ($dsloaikhach as $keylk => $valuelk): ?>
                            <option class="form-control" value="<?php echo $valuelk["loaikhachID"] ?>"><?php echo $valuelk["loaikhach"]; ?></option>
                        <?php endforeach ?>
                    </select>
				  </div>
				  <div class="form-group">
				    <input type="text" class="form-control" name="diachi" placeholder="Địa chỉ">
				  </div>
				  <div class="form-group">
				  	<input type="date" name="ngaydatphong" class="form-control" value="<?php echo $today; ?>">
				  </div>
				  <div class="form-group">
				  	<input type="date" name="ngayketthuc" class="form-control" value="<?php echo $today; ?>">
				  </div>
				  <div><?php echo $tbxndp ?></div>
				  <div class="row float-right">
				  	<input type="submit" name="btn_luu" class="btn btn-success mr-3" value="Xác nhận đặt phòng"></input>
				  	<input type="submit" class="btn btn-success mr-3" name="btn_huy" value="Hủy"></input>
				  </div>
				</form>
			</div>
		</div>
		</div>
		
	</div>
</div>
</div>
	
