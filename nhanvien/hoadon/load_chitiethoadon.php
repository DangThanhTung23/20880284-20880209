
<div class="text-center"><h4>Hóa đơn</h4></div>
<div style="width:90%;margin: 0 auto 200px auto;">
  <div style="border: solid 1px; padding:20px">
    <div>Đơn vị bán hàng : 20880284-20880209</div>
    <div>Mã Số Thuế : 123456789</div>
    <div>Địa chỉ : Số 1 Bacu, P9,thành phố Vũng Tàu, tỉnh Bà Rịa Vũng Tàu</div>
    <div>Diện thoại : 0357175627 </div>
    <div>Số tài khoản : 123456789 Ngân hàng Vietcombank chi nhánh Vũng Tàu</div>
  </div>
  <form method="post">
  <div style="border: solid 1px; padding:20px">
    <div>Họ tên người mua hàng : <?php echo $hoadon->tenkhachhang ?></div>
    <div>Đơn vị : <?php echo $hoadon->tennguoithanhtoan ?></div>
    <div>Địa chỉ : <?php echo $hoadon->diachinguoithanhtoan ?></div>
    <div>Mã số thuế : <?php echo $hoadon->MST ?> </div>
    <div class="row">
      <div class="col col-md-6">Hình thưc thanh toán : <?php echo $hoadon->loaithanhtoan ?></div>
      <!-- <div class="col col-md-6">Số tài khoản : <?php echo $hd->stk ?></div> -->
    </div>
    <div class="form-row">
    <div class="col-md-6">
      <label for="inputEmail4">Ngày đặt phòng : <?php echo $hoadon->ngaydatphong ?></label>
      <!-- <input type="date" class="form-control" name="ngaydatphong"  value="<?php echo $dp->ngaydatphong ?>"> -->
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Ngày kết thúc : <?php echo $hoadon->ngayketthuc ?></label>
      <!-- <input type="date" class="form-control" name="ngayketthuc" value="<?php echo $dp->ngayketthuc ?>"> -->
    </div>
  </div>
  <!-- <input type="hidden" name="tenkhachhang" value="<?php echo $tenkhachhang ?>">
  <input type="hidden" name="tennguoithanhtoan" value="<?php $tennguoithanhtoan ?>">
  <input type="hidden" name="datphongID" value=<?php echo $datphongID ?>>
  <input type="hidden" name="diachinguoithanhtoan" value="<?php echo $diachinguoithanhtoan ?>">
  <input type="hidden" name="MST" value="<?php echo $MST ?>">
  <input type="hidden" name="stk" value="<?php echo $stk ?>">
  <input type="hidden" name="loaithanhtoan" value="<?php echo $loaithanhtoan ?>">
  <input type="hidden" name="ngaydatphong" value="<?php echo $dp->ngaydatphong ?>">
  <input type="hidden" name="ngayketthuc" value="<?php echo $dp->ngayketthuc ?>">
  <input type="hidden" name="tongtienthanhtoan" value="<?php echo $tongtienthanhtoan ?>">
  <input type="hidden" name="tongtiensauthue" value="<?php echo $tongtiensauthue ?>">
  <input type="hidden" name="VAT" value="<?php echo $VAT ?>">
  <input type="hidden" name="VATthanhtoan" value="<?php echo $VATthanhtoan ?>">
  <input type="hidden" name="songaythue" value="<?php echo $songaythue->days ?>">
  <input type="hidden" name="phuthuloaikhach" value="<?php echo $phuthuloaikhach ?>">
  <input type="hidden" name="CMND" value="<?php echo $dp->CMND ?>"> -->

  </div>
  <div style="border: solid 1px; padding:20px">
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

          <?php foreach ($dsphong as $key => $value): ?>
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
              <?php echo $value['soluongkhach'] ?>
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
            <td><?php echo $hoadon->songaythue ?></td>
          </tr>
          <tr>
            <td>Phụ thu khách:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $hoadon->phuthuloaikhach  ?></td>
          </tr>
           <tr>
            <td>Tiền phòng :</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $hoadon->tongtienthanhtoan ?></td>
          </tr>
          <tr>
            <td>Thuế suất GTGT(VAT rate): <?php echo $hoadon->VAT*100 ?>%</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Tiền thuế GTGT ( VAT amount )</td>
            <td><?php echo $hoadon->VATthanhtoan  ?></td>
          </tr>
          <tr>
            <td>Tổng cộng tiền thanh toán :</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $hoadon->tongtiensauthue ?></td>
          </tr>
          
        </tbody>
      </table>
  </div>
  
  

  <div class="mt-5 float-right">
    
    <button class="btn btn-success" formaction="index.php?action=hoadon">Thoát</button>
  </div>
</form>
</div>

