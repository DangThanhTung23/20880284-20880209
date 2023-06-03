<div class="text-center">
				<h4>Danh mục trạng thái</h4>
			</div>

<div class="row mb-5">
		<form method="post" action="index.php?action=danhmuctrangthai" enctype="multipart/form-data" style="width:80%">	
			<div class="row">
                <div class="form-group col col-md-6">
                	<label class="form-label">ID trạng thái</label>
                    <input type="text" name="id" readonly class="form-control" value="<?php if(isset($txt_id)) echo $txt_id ?>" />
                    <label class="form-label">Trạng thái</label>
                    <input type="text" name="trangthai" required class="form-control" value="<?php if(isset($txt_trangthai)) echo $txt_trangthai ?>" />
                </div>
			</div>
			<input name="btn_suatrangthai" type="submit" value="Update" class="btn btn-success">
            <input name="btn_luutrangthai" type="submit" value="Save" class="btn btn-success">
    	</form>
	</div>
<div class="row">
	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col"></th>
					<th scope="col">Trạng Thái</th>
			    </tr>
			  </thead>
			  <tbody>

			  	<?php foreach ($dstrangthai as $key => $value): ?>
			  		<tr>
				      <th><input type="checkbox" name=""></th>
				      <td><?php echo $value["trangthai"] ?></td>
				      <td>
				      	<?php 
				      		$id_delete = "index.php?action=xoatrangthai&id=".$value["ID"];
				      		$id_update = "index.php?action=suatrangthai&id=".$value["ID"] 
				      	?>
				      	<a href=<?php echo "$id_update" ?>><input type="button" class="btn btn-success m-1" name="" value="edit"></a>
				      	<!-- <a href=""><input type="button" class="btn btn-success m-1"  name="" value="delete"></a> -->
				      	<!-- <?php echo $id_delete ?> -->
				      </td>
			      
			    </tr>
			  	<?php endforeach ?>
			    
			    
			    
			  </tbody>
			</table>
</div>
