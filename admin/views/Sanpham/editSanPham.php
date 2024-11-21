<!-- header -->
<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-11">
          <h1>Sửa thông tin Sản Phẩm:<?= $sanPham['ten_san_pham'] ?></h1>
        </div>
        <div class="col-sm-1 ">
        <a href="<?= BASE_URL_ADMIN . '?act=san-pham'?>" class="btn btn-secondary">Trở lại</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Thông tin sản phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form action="<?= BASE_URL_ADMIN . '?act=sua-san-pham' ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                <label for="ten_san_pham">Tên sản phẩm</label>
                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="<?= $sanPham['ten_san_pham'] ?>">
                <?php if (isset($errors['ten_danh_muc'])) { ?>
                  <p class="text-danger"><?= $errors['ten_danh_muc'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_san_pham">Gía sản phẩm</label>
                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?= $sanPham['gia_san_pham'] ?>">
                <?php if (isset($errors['gia_san_pham'])) { ?>
                  <p class="text-danger"><?= $errors['gia_san_pham'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" value="<?= $sanPham['gia_khuyen_mai'] ?>">
                <?php if (isset($errors['gia_khuyen_mai'])) { ?>
                  <p class="text-danger"><?= $errors['gia_khuyen_mai'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="hinh_anh">Hình ảnh</label>
                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
              </div>
              <div class="form-group">
                <label for="so_luong">Số lượng</label>
                <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?= $sanPham['so_luong'] ?>">
                <?php if (isset($errors['so_luong'])) { ?>
                  <p class="text-danger"><?= $errors['so_luong'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="ngay_nhap">Ngày nhập</label>
                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?= $sanPham['ngay_nhap'] ?>">
                <?php if (isset($errors['ngay_nhap'])) { ?>
                  <p class="text-danger"><?= $errors['ngay_nhap'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="inputStatus">Danh mục sản phẩm</label>
                <select id="inputStatus" name="danh_muc_id" class="form-control custom-select">
                  <?php foreach ($listDanhMuc as $danhMuc) : ?>
                    <option <?= $danhMuc['id'] == $sanPham['danh_muc_id'] ? 'selected' : '' ?> value="<?= $danhMuc['id']; ?>"><?= $danhMuc['ten_danh_muc']; ?></option>
                  <?php endforeach ?>
                </select>
                <?php if (isset($errors['danh_muc_id'])) { ?>
                  <p class="text-danger"><?= $errors['danh_muc_id'] ?></p>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="trang_thai">Trạng thái</label>
                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                  <option <?= $sanPham['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Còn bán</option>
                  <option <?= $sanPham['trang_thai'] == 2 ? 'selected' : '' ?> value="2">Dừng bán</option>
                </select>
              </div>
              <div class="form-group">
                <label for="mo_ta">Mô tả sản phẩm</label>
                <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?= $sanPham['mo_ta'] ?></textarea>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <button type="submit" class="btn btn-primary">Sửa thông tin</button>
            </div>
        </div>
        </form>
        <!-- /.card -->
      </div>
      <div class="col-md-4">
        <!-- /.card -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Album ảnh sản phẩm</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body p-0">
            <form action="<?= BASE_URL_ADMIN . '?act=sua-album-anh-san-pham' ?>" method="post" enctype="multipart/form-data">
              <div class="table-responsive">
                <table id="faqs" class="table table-hover">
                  <thead>
                    <tr>
                      <th>Ảnh</th>
                      <th>File</th>
                      <th>
                        <div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i>Add New</button></div>
                      </th>

                    </tr>
                  </thead>
                  <tbody>
                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id']?>">
                    <input type="hidden" id="img_delete" name="img_delete" >
                    <?php foreach($listAnhSanPham as $key=>$value): ?>
                    <tr id="faqs-row-<?= $key?>">
                      <input type="hidden" name="current_img_ids[]" value="<?= $value['id']?>">
                      <td><img src="<?= BASE_URL . $value['link_hinh_anh']?>" style="width:50px ;height:50px" alt=""></td>
                      <td><input type="file" name="img_array[]" class="form-control"></td>
                      <td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(<?= $key ?>,<?= $value['id']?>)"><i class="fa fa-trash"></i> Delete</button></td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
           
          </div>

          <!-- /.card-body -->
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Sửa thông tin</button>
          </div>
           </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- <div class="row">
      <div class="col-12">
        <a href="#" class="btn btn-secondary">Cancel</a>
        <input type="submit" value="Save Changes" class="btn btn-success float-right">
      </div>
    </div> -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer -->

</body>
<script>
  var faqs_row = <?= count($listAnhSanPham);?>;

  function addfaqs() {
    html = '<tr id="faqs-row-' + faqs_row + '">';
    html += '<td><img src="https://qpet.vn/wp-content/uploads/2023/04/hinh-anh-cho-shiba-cuoi-hai-huoc_011111806.jpg" style="width:50px ;height:50px" alt=""></td>';
    html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
    html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow('+ faqs_row +', null);"><i class="fa fa-trash"></i> Delete</button></td>';

    html += '</tr>';

    $('#faqs tbody').append(html);

    faqs_row++;
  }
  function removeRow(rowID, imgID){
    $('#faqs-row-' + rowID).remove();
    if(imgID !== null){
      var imgDeleteInput =document.getElementById('img_delete')
      var currentValue = imgDeleteInput.value;
      imgDeleteInput.value = currentValue ? currentValue + ',' + imgID : imgID;
    }
  }
</script>

</html>