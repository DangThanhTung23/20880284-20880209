<div style="width:90%; margin: 0 auto;">
	<div class="text-center"><h4>Danh sách hóa đơn</h4></div>
	<form action='index.php?action=hoadon<?php echo $url_query ?>' method="GET">
		<div class="row">
			<div class="col col-md-4">
				<input class="form-control" type="text" name="key" placeholder="TÌm kiếm theo tên hoặc CMND...">
			</div>
			<div class="col col-md-4">
				<input class="form-control" type="date" name="tungay" value="">
			</div>
			<div class="col col-md-4">
				<input class="form-control" type="date" name="denngay" value="">
			</div>
		</div>
		<input type="hidden" name="action" value="hoadon">
		<div class="mt-3 mb-3">
			<input type="submit" class="btn btn-success" name="btn_timkiem" value="Tìm kiếm">
		</div>

	</form>
	<table class="table">
	  <thead>
	    <tr>
	      <th scope="col">Tên khách hàng</th>
	      <th scope="col">CMND</th>
	      <th scope="col">Ngày đặt phòng</th>
	      <th scope="col">Ngày kết thúc</th>
	      <th scope="col"></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($ds_hd as $key => $value): ?>
	  		<tr>
		      <td><?php echo $value['tenkhachhang'] ?></td>
		      <td><?php echo $value['CMND'] ?></td>
		      <td><?php echo $value['ngaydatphong'] ?></td>
		      <td><?php echo $value['ngayketthuc'] ?></td>
		      <td>
		      	<a href="index.php?action=chitiethoadon&id=<?php echo $value['ID'] ?>"><button class="btn btn-success">Chi tiết</button></a>
		      	<a href="index.php?action=hoadon<?php echo $url_query ?>&xoahd=0&id=<?php echo $value['ID'] ?>"><button class="btn btn-success">Xóa</button></a>
		      </td>
		    </tr>
	  	<?php endforeach ?>
	  </tbody>
	</table>
	<div class="text-center"><?php echo $phantrang ?></div>
</div>