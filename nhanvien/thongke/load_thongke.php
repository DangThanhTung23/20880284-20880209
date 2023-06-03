<div class="text-center mb-3"><h4>Thống kê</h4></div>
<div class="container">
  <form action="index.php?action=thongke" method="post">
    <div class="row">
      <div class="form-group col col-md-6">
        <label>Từ ngày :</label>
        <input type="date" name="tungay" class="form-control" value="<?php echo $tungay ?>">
      </div>
      <div class="form-group col-md-6">
        <label>Đến ngày :</label>
        <input type="date" name="denngay" class="form-control" value="<?php echo $denngay ?>">
      </div>
    </div>
    <div><label><?php echo $tb ?></label></div>
    <input type="submit" class="btn btn-success mb-5" name="btn_thongke" value="Thống kê">
  </form>
  <div><b>Tổng doanh thu : <?php echo $tongdoanhthu ?></b></div>
  <div class="mb-3 mt-3"><b>Doanh thu từng phòng</b></div>
  <?php echo $dp_dttp ?>
  <div class="mb-3"><b>Doanh thu từng loại phòng</b></div>
  <?php echo $dp_dtlp ?>
  <div class="mb-3"><b>Mật độ sử dụng phòng</b></div>
  <?php echo $dp_mdsdp ?>
</div>