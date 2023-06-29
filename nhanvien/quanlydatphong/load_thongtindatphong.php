<div class="text-center"><h4>Chi tiết đặt phòng</h4></div>
<div style="width:90%;margin: 0 auto 200px auto;">
  <div class="mt-5"><h5>Thông tin khách hàng</h5></div>
  <form action="index.php?action=chitiet&id=<?php echo $dp->id ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Tên Khách Hàng</label>
      <input type="text" class="form-control" name="tenkhachhang" value="<?php echo $dp->tenkhachhang ?>">
    </div>
    <div class="form-group col-md-6">
      <label>CMND</label>
      <input type="text" class="form-control" name="CMND" value="<?php echo $dp->CMND ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Ngày đặt phòng</label>
      <input type="date" class="form-control" name="ngaydatphong" readonly  value="<?php echo $dp->ngaydatphong ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Ngày kết thúc</label>
      <input type="date" class="form-control" name="ngayketthuc" readonly value="<?php echo $dp->ngayketthuc ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Địa Chỉ Khách Hàng</label>
      <input type="text" class="form-control" name="diachikhachhang" value="<?php echo $dp->diachikhachhang ?>">
    </div>
    <div class="form-group col-md-6">
      <label>Số điện thoại</label>
      <input type="number" class="form-control" name="sdt" value="<?php echo $dp->sdt ?>">
    </div>
  </div>
  <div class="form-row">
     <div class="form-group col-md-6">
    <label>Loại Khách hàng</label>
      <select name="loaikhachID" class="form-control">
          <?php foreach ($dsloaikhach as $keylk => $valuelk): ?>
            <option class="form-control" value="<?php echo $valuelk["loaikhachID"] ?>" <?php if($dp->loaikhachID==$valuelk['loaikhachID']) 
            echo "selected"; ?>>
              <?php echo $valuelk["loaikhach"]; ?>
            </option>
          <?php endforeach ?>
      </select>
  </div>
  <input type="hidden" name="id" value="<?php echo $dp->id ?>">
 </div>
 <div class="mt-5"><h5>Danh sách phòng</h5></div>
  <table class="table">
        <thead>
          <tr>
          <th scope="col">Tên Phòng</th>
          <th scope="col">Loại Phòng</th>
          <th scope="col">Giá</th>
          <th scope="col">Số lượng khách</th>
          
          <th scope="col"></th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($dsphong as $key => $value): ?>
            <tr>
              <td><?php echo $value["tenphong"] ?></td>
              <td>
                <?php echo $value['loaiphong'] ?>
              </td>
              <td>
                <?php echo $value['giaphong'] ?>
              </td>
              <td>
                <?php echo $value['soluong'] ?>
              </td>
              
              <td>
                <?php
                  $id_delete = 'index.php?action=chitiet&id='.$dp->id.'&id_delete='.$value["phongID"] ;
                  //$id_update = "index?action=suaphong&id=".$value["phongID"];
                ?>
            
                  <a href=<?php echo $id_delete ?>>Hủy đặt phòng</a>
              </td>
            </tr>
          <?php endforeach ?>
          
          
        </tbody>
      </table>

      <div class="mt-5"><h5>Dịch Vụ</h5></div>
  <table class="table">
        <thead>
          <tr>
          <th scope="col">Tên Dịch Vụ</th>
          <th scope="col">Giá Dịch Vụ</th>
          <th scope="col">Số lượng</th>    
          <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php echo $ht_ds_dv_dadat ?>
          <?php echo $ht_ds_dv_vuathem ?>
        </tbody>
      </table>
 <div><?php echo $tb; ?></div>
  <div class="mt-5 float-right">
    <button type="button" class="btn btn-success mr-3" data-toggle="modal" data-target="#exampleModal">
      Thêm dịch vụ
    </button>
    <input type="submit" class="btn btn-success mr-3" name="btn_update" value="Cập nhật">
    <button class="btn btn-success mr-3" formaction="index.php?action=thanhtoan&id=<?php echo $dp->id ?>">Thanh Toán</button>
    <button class="btn btn-success" formaction="index.php?action=quanlydatphong">Thoát</button>
    <!-- Button trigger modal -->
    

    
  </div>
</form>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Dịch vụ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php foreach ($ds_dv as $key => $value): ?>
              <form action="<?php echo $url_query ?>" method="post">
                  <div class="row">
                    <div class="col mb-2 col-md-3"><?php echo $value['tendichvu'] ?></div>
                    <div class="col mb-2 col-md-3"><?php echo $value['giatri'] ?><?php echo $value['donvi'] ?></div>
                    <div class="col mb-2 col-md-3 pr-2"><input class="form-control" type="number" name="soluong" value="0"></div>
                    <div class="col mb-2 col-md-3"><input name="btn_themdv" type="submit" class="btn btn-success" value="Thêm"></div>
                    <input type="hidden" name="id" value="<?php echo $value['ID'] ?>">
                    <input type="hidden" name="tendichvu" value="<?php echo $value['tendichvu'] ?>">
                    <input type="hidden" name="giatri" value="<?php echo $value['giatri'] ?>">
                    <input type="hidden" name="donvi" value="<?php echo $value['donvi'] ?>">
                  </div>    
                </form>
            <?php endforeach ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
            <button type="button" class="btn btn-primary">Lưu</button>
          </div>
        </div>
      </div>
    </div>