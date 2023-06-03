<div class="text-center m-5"><h4>Danh mục phòng</h4></div>

<form action="index.php?action=danhmucphong" method="post">
	<div class="row">
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
		<div class="col col-md-2 float-right">
			<input type="submit" class="btn btn-success" name="btn_timkiem" value="Tìm kiếm" name="">
		</div>
	</div>
	
</form>


<a href="index.php?action=thongtinphong"><button type="submit" class="btn btn-success">Thêm Phòng</button></a>

<div class="row">
	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col"></th>
					<th scope="col">Tên Phòng</th>
					<th scope="col">Trạng thái</th>
					<th scope="col">Loại Phòng</th>
					<th scope="col">Giá</th>
					<th scope="col">Số lượng khách tối đa</th>
					<th scope="col">Mô tả</th>
					<th scope="col">Hình ảnh</th>
					<th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>

			    <?php foreach ($dsphong as $key => $value): ?>
			    	<tr>
						<th><input type="checkbox" name=""></th>
						<td><?php echo $value["tenphong"] ?></td>
						<td>
							<?php
								$lp = new trangthaiModel($conn);
								$lp->timkiemtheoID($value["trangthaiID"]);
								echo $lp->trangthai;
							 ?>
						</td>
						<td>
							<?php
								$lp = new loaiphongModel($conn);
								$lp->timkiemtheoID($value["loaiphongID"]);
								echo $lp->loaiphong;
							 ?>
						</td>
						<td><?php echo $value["giaphong"] ?></td>
						<td><?php echo $value["soluongtoida"] ?></td>
						<td><?php echo $value["mota"] ?></td>
						<!-- <td><img style="width: 100px;height: 100px;" src="<?php echo '../'.$value["img"] ?>"></td> -->
						<td>
							<?php
								if($value['img']==" "||$value['img']==null)
								{
									echo "không có hình";
								}
								else
								{
									echo '<img style="width: 100px;height: 100px;" src="'.'../'.$value["img"].'">';
								}
						 	?>
						</td>
						
						<td>
							<?php
								$id_delete = "index.php?action=xoaphong&id=".$value["phongID"] ;
								$id_update = "index.php?action=suaphong&id=".$value["phongID"];
							?>
					
				      	<a href=<?php echo $id_update ?>><input type="button" class="btn btn-success m-1" name="" value="edit"></a>
				      	<a href=<?php echo $id_delete ?>><input type="button" class="btn btn-success m-1"  name="" value="delete"></a>
						</td>
					</tr>
			    <?php endforeach ?>
			    
			    
			  </tbody>
			</table>
</div>