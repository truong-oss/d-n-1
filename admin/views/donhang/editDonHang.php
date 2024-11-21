<!-- header -->
<?php include './views/layout/header.php';?>
  <!-- Navbar -->
<?php include './views/layout/navbar.php';?>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php';?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý thông tin đơn hàng</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">  
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Sửa thông tin đơn hàng: <?= $donHang['ma_don_hang']?></h3>
              </div>
              
              <form action="<?= BASE_URL_ADMIN . '?act=sua-don-hang' ?>" method="POST">

                <input type="text" name="don_hang_id" value="<?= $donHang['id']?>" hidden>
                
                
                  <div class="form-group">
                <label for="inputStatus">Trạng thái đơn hàng</label>
                <select id="inputStatus" name="trang_thai_don_hang_id" class="form-control custom-select">
                  <?php foreach ($listTrangThaiDonHang as $trangThai) : ?>
                    <option 
                    <?php
                    if($donHang['trang_thai_don_hang_id'] > $trangThai['id'] || $donHang['trang_thai_don_hang_id'] ==9 || $donHang['trang_thai_don_hang_id'] ==10 || $donHang['trang_thai_don_hang_id'] ==11){
                        echo 'disabled';
                    }
                     ?> 
                    <?= $trangThai['id'] == $donHang['trang_thai_don_hang_id'] ? 'selected' : '' ?> 
                        value="<?= $trangThai['id']; ?>"><?= $trangThai['ten_trang_thai']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                
              </div>
              <div class="form-group">
                <label for="inputStatus">Trạng thái thanh toán</label>
                <select id="inputStatus" name="trang_thai_thanh_toan_id" class="form-control custom-select">
                  <?php foreach ($listTrangThaiThanhtoan as $thanhtoan) : ?>
                    <option
                    
                    <?php
                     ?> 
                    <?= $thanhtoan['id'] == $donHang['trang_thai_thanh_toan_id'] ? 'selected' : '' ?> 
                        value="<?= $thanhtoan['id']; ?>"><?= $thanhtoan['ten_trang_thais']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                
              </div>
                </div>
             

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- footer -->

<?php include './views/layout/footer.php';?>
<!-- end footer -->

</body>
</html>
