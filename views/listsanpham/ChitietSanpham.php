<?php include './views/layout/header-nav.php'; ?>

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0">
        <a href="index.html">Home</a> 
        <span class="mx-2 mb-0">/</span> 
        <strong class="text-black"><?= htmlspecialchars($sanpham['ten_san_pham']) ?></strong>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <form action="<?= BASE_URL . '?act=add&id_san_pham=' . $_GET['id_san_pham'] ?>" method="POST">
      <input type="hidden" name="san_pham_id" value="<?= $sanpham['id'] ?>">
      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?? '' ?>">
      <div class="row">
        <!-- Product Images -->
        <div class="col-md-6">
          <div class="mb-4">
            <img id="mainProductImage" 
                 src="<?= htmlspecialchars($sanpham['hinh_anh']) ?>" 
                 alt="Main Product Image" 
                 class="img-fluid w-100 border"
                 loading="lazy">
          </div>
          <div class="row product-image-thumbs">
            <?php foreach ($listanhsanpham as $key => $anhSP): ?>
              <div class="col-3 mb-2">
                <img
                  class="img-thumbnail product-image-thumb <?= $key === 0 ? 'active border-primary' : '' ?>"
                  src="<?= htmlspecialchars(BASE_URL . $anhSP['link_hinh_anh']) ?>"
                  alt="Thumbnail <?= $key + 1 ?>"
                  style="cursor: pointer;"
                  onclick="updateMainImage(this)"
                  loading="lazy">
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">
          <h2 name="ten_san_pham" class="text-black"><?= htmlspecialchars($sanpham['ten_san_pham']) ?></h2>
          <p><?= nl2br(htmlspecialchars($sanpham['mo_ta'])) ?></p>
          <div class="price-box">
            <?php if (!empty($sanpham['gia_khuyen_mai'])): ?>
              <span class="price-regular"><?= number_format($sanpham['gia_khuyen_mai'], 0, ',', '.') . 'đ'; ?></span>
              <span class="price-old"><del><?= number_format($sanpham['gia_san_pham'], 0, ',', '.') . 'đ'; ?></del></span>
            <?php else: ?>
              <span class="price-regular"><?= number_format($sanpham['gia_san_pham'], 0, ',', '.') . 'đ'; ?></span>
            <?php endif; ?>
          </div>
          <div class="availability">
            <i class="fa fa-check-circle"></i>
            <span><?= htmlspecialchars($sanpham['so_luong']) . ' Trong kho'; ?></span>
          </div>
          <div class="mb-1 d-flex">
            <label for="option-sm" class="d-flex mr-3 mb-3">
              <span class="d-inline-block mr-2" style="top:-2px; position: relative;">
                <input type="radio" id="option-sm" name="shop-sizes" aria-label="Size option">
              </span> 
              <span class="d-inline-block text-black"><?= $sanpham['khoi_luong'] . 'kg' ?></span>
            </label>
          </div>
          <div class="mb-5">
            <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button" onclick="changeQuantity(-1)">&minus;</button>
              </div>
              <input readonly name="so_luongs" id="so_luongs" class="form-control text-center" value="1" min="1" placeholder="">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button" onclick="changeQuantity(1)">&plus;</button>
              </div>
            </div>
          </div>
          <button class="buy-now btn btn-sm btn-primary" aria-label="Add to cart">Thêm vào giỏ hàng</button>
        </div>
      </div>
    </form> 
    <a href="<?= BASE_URL . '?act=gio_hang' ?>">View Cart</a>
  </div>
</div>

<!-- Similar Products Section -->
<div class="site-section block-3 site-blocks-2 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Sản phẩm tương tự</h2>
      </div>
    </div>
    <div class="row mb-5">
      <?php foreach ($listdanhmuctheosanpham as $sanpham): ?>
        <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
          <div class="block-4 border position-relative">
            <!-- Labels -->
            <?php
            $ngayNhap = new DateTime($sanpham['ngay_nhap']);
            $ngayHienTai = new DateTime();
            $tinhNgay = $ngayHienTai->diff($ngayNhap);

            if ($tinhNgay->days <= 7): ?>
              <div class="product-label new">
                <span class="badge bg-danger text-uppercase position-absolute top-0 start-0 m-3">New</span>
              </div>
            <?php elseif ($sanpham['gia_khuyen_mai']): ?>
              <div class="product-label discount">
                <span class="badge bg-success text-uppercase position-absolute top-0 start-0 m-3">Giảm giá</span>
              </div>
            <?php endif; ?>
            <figure class="block-4-image">
              <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanpham['id'] ?>">
                <img src="<?= htmlspecialchars(BASE_URL . $sanpham['hinh_anh']) ?>" alt="Image" class="img-fluid" loading="lazy">
              </a>
            </figure>
            <div class="block-4-text p-4 text-center">
              <h3>
                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanpham['id'] ?>">
                  <?= htmlspecialchars($sanpham['ten_san_pham']) ?>
                </a>
              </h3>
              <p class="mb-0">Finding perfect products</p>
              <p class="text-primary font-weight-bold">
                <?php if (!empty($sanpham['gia_khuyen_mai'])): ?>
                  <?= number_format($sanpham['gia_khuyen_mai'], 0, ',', '.') . 'đ'; ?>
                <?php else: ?>
                  <?= number_format($sanpham['gia_san_pham'], 0, ',', '.') . 'đ'; ?>
                <?php endif; ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<script>
function updateMainImage(thumb) {
    const mainImage = document.getElementById('mainProductImage');
    mainImage.src = thumb.src;
}

// function changeQuantity(delta) {
//     const quantityInput = document.getElementById('so_luongs');
//     let currentValue = parseInt(quantityInput.value);
//     if (!isNaN(currentValue)) {
//         currentValue += delta;
//         if (currentValue < 1) currentValue = 1; // Ensure quantity is at least 1
//         quantityInput.value = currentValue;
//     }
// }
</script>

<?php include './views/layout/footer.php'; ?>