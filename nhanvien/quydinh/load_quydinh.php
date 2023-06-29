<div style="width: 80%;margin: 0 auto">
    <div class="text-center">
		<h4>Quy định</h4>
    </div>
    <div class="text-center mt-5"><b>Dịch vụ</b></div>
    <div class="row mb-5">
            <form method="post" action="index.php?action=quydinh" enctype="multipart/form-data" style="width:80%">	
                <div class="row">
                    <div class="form-group col col-md-6">
                        <!-- <label class="form-label">ID tham số</label> -->
                        <input type="hidden" name="id" readonly class="form-control" value="<?php if(isset($id)){echo $id ;} ?>" />
                        <label class="form-label">Dịch vụ</label>
                        <input type="text" name="dichvu" required class="form-control" value="<?php if(isset($dichvu)) {echo $dichvu;} ?>" />
                        <label class="form-label">Giá trị</label>
                        <input type="text" name="giatridichvu" required class="form-control" value="<?php if(isset($giatridichvu)) {echo $giatridichvu;} ?>" />
                        <label class="form-label">Đơn vị</label>
                        <input type="text" name="donvi" required class="form-control" value="<?php if(isset($donvi)) {echo $donvi;} ?>" />
                    </div>
                </div>
                <input name="btn_suadichvu" type="submit" value="Update" class="btn btn-success">
                <input name="btn_luudichvu" type="submit" value="Save" class="btn btn-success">
            </form>
        </div>
    <div class="row">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col"></th>
                        <th scope="col">Dịch vụ</th>
                        <th>Giá trị</th>
                        <th>Đơn vị</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($dsdichvu as $key => $value): ?>
                        <tr>
                        <th><input type="checkbox" name=""></th>
                        <td><?php echo $value["tendichvu"] ?></td>
                        <td><?php echo $value["giatri"] ?></td>
                        <td><?php echo $value["donvi"] ?></td>
                        
                        <td>
                            <?php 
                                $id_delete = "index.php?action=xoadichvu&id=".$value["ID"];
                                $id_update = "index.php?action=suadichvu&id=".$value["ID"] 
                            ?>
                            <a href=<?php echo "$id_update" ?>><input type="button" class="btn btn-success m-1" name="" value="edit"></a>
                            <a href=<?php echo $id_delete ?>><input type="button" class="btn btn-success m-1"  name="" value="delete"></a>
                            
                        </td>
                    
                    </tr>
                    <?php endforeach ?>
                </tbody>
        </table>
    </div>

    <div class="text-center mt-5"><b>Tham số</b></div>
    <div class="row mb-5">
            <form method="post" action="index.php?action=quydinh" enctype="multipart/form-data" style="width:80%">	
                <div class="row">
                    <div class="form-group col col-md-6">
                        <input type="hidden" name="id" readonly class="form-control" value="<?php if(isset($id)){echo $id ;} ?>" />
                        <label class="form-label">Tham số </label>
                        <input type="text" name="thamso" required class="form-control" value="<?php if(isset($thamso)) {echo $thamso;} ?>" />
                        <label class="form-label">Giá trị</label>
                        <input type="text" name="giatri" required class="form-control" value="<?php if(isset($giatrithamso)) {echo $giatrithamso;} ?>" />
                    </div>
                </div>
                <input name="btn_suathamso" type="submit" value="Update" class="btn btn-success">
                <!-- <input name="btn_luuthamso" type="submit" value="Save" class="btn btn-success"> -->
            </form>
        </div>
    <div class="row">
        <table class="table">
                <thead>
                    <tr>
                    <th scope="col"></th>
                        <th scope="col">Tham số</th>
                        <th>Giá trị</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($dsthamso as $key => $value): ?>
                        <tr>
                        <th><input type="checkbox" name=""></th>
                        <td><?php echo $value["thamso"] ?></td>
                        <td><?php echo $value["giatri"] ?></td>
                        <td>
                            <?php 
                                $id_delete = "index.php?action=xoathamso&id=".$value["id"];
                                $id_update = "index.php?action=suathamso&id=".$value["id"] 
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

</div>