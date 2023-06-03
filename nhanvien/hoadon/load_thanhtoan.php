
<div class="text-center mb-5"><h4>Thanh toán</h4></div>
<div style="width:90%;margin: 0 auto 200px auto;">
  <form action="index.php?action=thongtinhoadon&id=<?php echo $dp->id ?>" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Tên Khách Hàng : <?php echo $dp->tenkhachhang ?></label>
      <!-- <input type="text" class="form-control" name="tenkhachhang" value="<?php echo $dp->tenkhachhang ?>"> -->
    </div>
    <div class="form-group col-md-6">
      <label>CMND : <?php echo $dp->CMND ?></label>
      <!-- <input type="text" class="form-control" name="CMND" value="<?php echo $dp->CMND ?>"> -->
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Ngày đặt phòng : <?php echo $dp->ngaydatphong ?></label>
      <!-- <input type="date" class="form-control" name="ngaydatphong"  value="<?php echo $dp->ngaydatphong ?>"> -->
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Ngày kết thúc : <?php echo $dp->ngayketthuc ?></label>
      <!-- <input type="date" class="form-control" name="ngayketthuc" value="<?php echo $dp->ngayketthuc ?>"> -->
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Địa Chỉ Khách Hàng : <?php echo $dp->diachikhachhang ?></label>
      <!-- <input type="text" class="form-control" name="diachikhachhang" value="<?php echo $dp->diachikhachhang ?>"> -->
    </div>
    <div class="form-group col-md-6">
      <label>Số điện thoại : <?php echo $dp->sdt ?></label>
      <!-- <input type="number" class="form-control" name="sdt" value="<?php echo $dp->sdt ?>"> -->
    </div>
  </div>
  <div class="form-row">
     <div class="form-group col-md-6">
    <label>
      Loại Khách hàng : <?php foreach ($dsloaikhach as $keylk => $valuelk): ?>
            <?php if($dp->loaikhachID==$valuelk['loaikhachID']) {echo $valuelk["loaikhach"];} ?>
          <?php endforeach ?>
    </label>
      <!-- <select name="loaikhachID" class="form-control">
          <?php foreach ($dsloaikhach as $keylk => $valuelk): ?>
            <option class="form-control" value="<?php echo $valuelk["loaikhachID"] ?>" <?php if($dp->loaikhachID==$valuelk['loaikhachID']) 
            echo "selected"; ?>>
              <?php echo $valuelk["loaikhach"]; ?>
            </option>
          <?php endforeach ?>
      </select> -->
  </div>
  <input type="hidden" name="id" value="<?php echo $dp->id ?>">
 </div>
 <div class="mt-5"><h5>Danh sách phòng : </h5></div>
  <table class="table">
        <thead>
          <tr>
          <th></th>
          <th scope="col">Tên Phòng</th>
          <th scope="col">Loại Phòng</th>
          <th scope="col">Giá phòng/1 ngày</th>
          <th scope="col">Số lượng khách</th>
          <th scope="col">Phụ thu số lượng</th>
          <th scope="col">Thành tiền</th>
          
          </tr>
        </thead>
        <tbody>

          <?php foreach ($ds_thanhtoan as $key => $value): ?>
            <tr>
            <td></td>
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
              <?php echo $value['phuthusoluong'] ?>
            </td>
            <td>
              <?php echo $value['thanhtien'] ?>
            </td>
            
            
          </tr>
          <?php endforeach ?>
          
          <tr>
            <td>Số ngày thuê :</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $songaythue->days ?></td>
          </tr>
          <tr>
            <td>Phụ thu khách:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $phuthuloaikhach  ?></td>
          </tr>
          <tr>
            <td>Tổng cộng :</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $tongtienthanhtoan ?></td>
          </tr>
          
        </tbody>
      </table>
  <div class="mt-5 mb-5">
    <h5>Thông tin thanh toán : </h5>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Tên Người Thanh Toán : </label>
          <input type="text" class="form-control" name="tennguoithanhtoan" value="">
        </div>
        <div class="form-group col-md-6">
          <label>Mã số thuế : </label>
          <input type="text" class="form-control" name="MST" value="">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Địa chỉ : </label>
          <input type="text" class="form-control" name="diachinguoithanhtoan" value="">
        </div>
        <div class="form-group col-md-6">
          <label>Số tiền thanh toán : </label>
          <input type="number" readonly class="form-control" name="tongtienthanhtoan" value="<?php echo $tongtienthanhtoan ?>">
          
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label>Hình thức thanh toán : </label>
           <?php foreach ($ds_ltt as $keyltt => $valueltt): ?>
            <div class="form-check">
              <input id="r_s" onclick="check_radio(<?php echo $valueltt['ID']; ?>)" class="form-check-input" name="thanhtoanID" type="radio"
              <?php if($valueltt['ID']==1) echo "checked"; ?>
               value="<?php echo $valueltt['ID'] ?>" />
            <label class="form-check-label"><?php echo $valueltt['loaithanhtoan'] ?></label>
            <div id="dp_<?php echo $valueltt['ID'] ?>"></div>
            </div>

          <?php endforeach ?>
          
        </div>
      </div>
    
  </div>
  <div><input type="hidden" name="tenkhachhang" value="<?php echo $dp->tenkhachhang ?>"></div>
  <div><input type="hidden" name="id" value="<?php echo $dp->id ?>"></div>
 <div><?php echo $tb; ?></div>
  <div class="mt-5 float-right">
    <input type="submit" class="btn btn-success mr-3" name="btn_xn_thanhtoan" value="Xác nhận thanh toán">
    <!-- <button class="btn btn-success mr-3" formaction="index.php?action=thanhtoan&id=<?php echo $dp->id ?>">Thanh Toán</button> -->
    <button class="btn btn-success" formaction="index.php?action=quanlydatphong" onclick="<?php unset($_SESSION['thanhtoan']) ?>">Thoát</button>
  </div>
</form>
</div>
<script>
  function check_radio(id) {
    // var text =  document.getElementById('dp');
    if(id == 2)
    {
      document.getElementById(`dp_${id}`).innerHTML = '<input type="text" class="form-control mt-3" name="stk" placeholder="Hãy nhập số tài khoản của bạn..." value="<?php echo $stk ?>">';
    }
  }
</script>
