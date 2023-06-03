<div class="text-center m-5"><h4>Danh mục User</h4></div>
<a href="index.php?action=thongtinuser"><button type="submit" class="btn btn-success m-3">Thêm User</button></a>

<div class="row">
	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col"></th>
					<th scope="col">Tên</th>
					<th scope="col">Vai trò</th>
					<th scope="col">Địa chỉ</th>
					<th scope="col">Email</th>
					<th scope="col">User name</th>
					<th scope="col">Password</th>
					<th scope="col">Số điện thoại</th>
					
					<th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>

			    <?php foreach ($dsuser as $key => $value): ?>
			    	<tr>
						<th><input type="checkbox" name=""></th>
						<td><?php echo $value["ten"] ?></td>
						<td>
							<?php
								foreach ($dsrole as $keyrole => $role) {
									// code...
									if($role['id']==$value["role"])
									{
										echo $role['role'];
									}
								}
							 ?>
						</td>
						<td><?php echo $value["diachi"] ?></td>
						<td><?php echo $value["email"] ?></td>
						<td><?php echo $value["user"] ?></td>
						<td><?php echo $value["pass"] ?></td>
						<td><?php echo $value["sdt"] ?></td>
						<!-- <td><img style="width: 100px;height: 100px;" src="<?php echo '../'.$value["img"] ?>"></td> -->
						
						
						<td>
							<?php
								$id_delete = "index.php?action=xoauser&id=".$value["ID"] ;
								$id_update = "index.php?action=suauser&id=".$value["ID"];
							?>
					
				      	<a href=<?php echo $id_update ?>><input type="button" class="btn btn-success m-1" name="" value="edit"></a>
				      	<a href=<?php echo $id_delete ?>><input type="button" class="btn btn-success m-1"  name="" value="delete"></a>
						</td>
					</tr>
			    <?php endforeach ?>
			    
			    
			  </tbody>
			</table>
</div>