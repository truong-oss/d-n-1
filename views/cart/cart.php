<?php include './views/layout/header-nav.php'; ?>
<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="<?= BASE_URL  ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
      <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['message']; unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>
        <div class="row mb-5">

          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($cartItems as $item): ?>
                  <tr>
                    <td class="product-thumbnail">
                    <img src="<?= $item['hinh_anh'] ?>" alt="<?= $item['ten_san_pham'] ?>" width="80" class="img-thumbnail">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?= $item['ten_san_pham'] ?></h2>
                    </td>
                    <td>$<?= number_format($item['gia_khuyen_mai'], 2) ?></td>
                   
                    <td>
                    <form method="POST" action="<?= BASE_URL . '?act=update' ?>">
                    <input type="hidden" name="id[]" value="<?= $item['cart_id'] ?>">
                    <input type="number" name="so_luongs[]" value="<?= $item['so_luongs'] ?>" min="1" class="form-control">

        <div class="input-group-append">
            <button type="submit" class="btn btn-primary" aria-label="Update quantity">Update</button>
        </div>
    </div>
</form>

                    </td>
                    <td>$<?= number_format($item['gia_khuyen_mai'] * $item['so_luongs'], 2) ?></td>
                    <td>
                        <form method="POST" action="<?= BASE_URL . '?act=remove' ?>">
                    <input type="hidden" name="id[]" value="<?= $item['cart_id'] ?>">

                            <button type="submit" class="btn btn-danger" aria-label="Remove product">X</button>
                        </form>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button href="" class="btn btn-outline-primary btn-sm btn-block">Continue Shopping</button>
              </div>
              <div class="col-md-6">
                <!-- <button class="btn btn-primary btn-sm btn-block">Update Cart</button> -->
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Tổng tiền </h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black"></span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"></strong>
                  </div>
                </div>
                <div class="row mb-5">
                <?php
    // Tính tổng giỏ hàng
             $totalAmount = 0;
            foreach ($cartItems as $item) {
             $totalAmount += $item['gia_khuyen_mai'] * $item['so_luongs'];
             }
                ?>
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">  $<?= number_format($totalAmount, 2) ?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.html'">Proceed To Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include './views/layout/footer.php'; ?>