
<div class="text-center">
		<h4>Danh mục loại phòng</h4>
	</div>


<div class="row mb-5">
		<form method="post" action="index.php?action=danhmucloaiphong" enctype="multipart/form-data" style="width:80%">
			
			<div class="row">
                <div class="form-group col col-md-6">
                	<label class="form-label">ID phòng</label>
                    <input type="text" name="id" readonly class="form-control" value="<?php if(isset($txt_id)) echo $txt_id ?>" />
                    <label class="form-label">Loại phòng</label>
                    <input type="text" name="loaiphong" required class="form-control" value="<?php if(isset($txt_loaiphong)) echo $txt_loaiphong ?>" />
                </div>
			</div>
			<div class="row" style="width:40%">
				<input name="btn_sualoaiphong" type="submit" value="Update" class="btn btn-success ml-3 mr-3">
				<input name="btn_luuloaiphong" type="submit" value="Save" class="btn btn-success">
				
			</div>
            
    	</form>
	</div>

<div class="row">
	<table class="table">
			  <thead>
			    <tr>
			      <th scope="col"></th>
					<th scope="col">Loại phòng</th>
			    </tr>
			  </thead>
			  <tbody>
			  	
			  	<?php foreach ($dsloaiphong as $key => $value): ?>
			  		<tr>
				      <th><input type="checkbox" placeholder="loaiphong" name="loaiphong" value=""></th>
				      <td><?php echo $value["loaiphong"] ?></td>
				      <td>
				      	<?php
				      		$id_delete = "index.php?action=xoaloaiphong&id=".$value["ID"];
				      		$id_update = "index.php?action=sualoaiphong&id=".$value["ID"];
				      	?>
				      	<a href=<?php echo $id_update ?>><input type="button" class="btn btn-success m-1" name="" value="edit"></a>
				      	<a href=<?php echo $id_delete ?>><input type="button" class="btn btn-success m-1"  name="" value="delete"></a>
				      	
				      </td>
			      
			    </tr>
			  	<?php endforeach ?>
			    
			    
			    
			  </tbody>
			</table>
</div>

