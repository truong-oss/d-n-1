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
            <h1>Báo cáo thống kê</h1>
           
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- Dashboard Container -->
<div class="container-fluid">
    <div class="row">
        <!-- Total Users -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text h4"><?= $data['totalUsers']; ?></p>
                </div>
            </div>
        </div>
        <!-- Total Categories -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Categories</h5>
                    <p class="card-text h4"><?= $data['totalCategories']; ?></p>
                </div>
            </div>
        </div>
        <!-- Total Products -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text h4"><?= $data['totalProducts']; ?></p>
                </div>
            </div>
        </div>
        <!-- Total Orders -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Total Orders</h5>
                    <p class="card-text h4"><?= $data['totalOrders']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<!-- footer -->
<?php include './views/layout/footer.php';?>
<!-- end footer -->
<!-- Page specific script -->

</body>
</html>
