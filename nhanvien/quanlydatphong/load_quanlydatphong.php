<div class="text-center m-5"><h4>Quản lý đặt phòng</h4></div>



<div style="width: 90%; margin: 0 auto;">
	<form action="index.php?action=quanlydatphong" method="get">
		<div>
			<input class="form-control" type="text" name="key" placeholder="Tìm kiếm theo tên khách hàng hoặc CMND...">
		</div>
		<input type="hidden" name="action" value="quanlydatphong">
		<div><input type="submit" class="btn btn-success mt-3 mb-3" name="btn_timkiem" value="Tìm kiếm" name=""></div>
	</form>
	<table class="table">
			  <thead>
			    <tr>
			      
					<th scope="col">Tên khách hàng</th>
					<th scope="col">Phòng</th>
					<th scope="col">CMND</th>
					<th scope="col">Ngày đặt phòng</th>
					<th scope="col">Ngày kết thúc</th>
					<th scope="col">Địa chỉ khách hàng</th>
					<th scope="col">Đang hoạt động</th>
					<th></th>
			    </tr>
			  </thead>
			  <tbody>

			    <?php foreach ($dsdp as $key => $value): ?>
			    	<tr>
						<td><?php echo $value["tenkhachhang"] ?></td>
						<td><?php foreach ($dsp_dp as $keyp_dp => $valuep_dp): ?>
							<?php  
								if($valuep_dp['datphongID'] == $value['ID']) 
								{
									echo $valuep_dp['tenphong'].'|';
								} 

							?>
						<?php endforeach ?></td>
						<td>
							<?php echo $value["CMND"] ?>
						</td>
						<td><?php echo $value["ngaydatphong"] ?></td>
						<td><?php echo $value["ngayketthuc"] ?></td>
						<td><?php echo $value["diachikhachhang"] ?></td>
						<!-- <td><img style="width: 100px;height: 100px;" src="<?php echo '../'.$value["img"] ?>"></td> -->
						<td>
							<?php if($value['isActive']==0)
								{ echo "Chưa kết thúc"; }
								else{
									echo "Đã kết thúc";
								} 
							?>
						</td>
						
						
						<td>
							<?php
								$id_delete = "index.php?action=quanlydatphong".$url_query."&xoadp=0&id=".$value["ID"] ;
								$id_update = "index.php?action=chitiet&id=".$value["ID"];
								$id_thanhtoan = "index.php?action=thanhtoan&id=".$value["ID"];
							?>
						<a href=<?php echo $id_thanhtoan ?>><input type="button" class="btn btn-success m-1" name="" value="Thanh toán"></a>
				      	<a href=<?php echo $id_update ?>><input type="button" class="btn btn-success m-1" name="" value="Chi tiết"></a>
				      	<a href=<?php echo $id_delete ?>><input type="button" class="btn btn-success m-1"  name="" value="Xóa"></a>	      	
						</td>
					</tr>
			    <?php endforeach ?>
			    
			    
			  </tbody>
			</table>
			<div class="text-center"><?php echo $phantrang ?></div>
</div>