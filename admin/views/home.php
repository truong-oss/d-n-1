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
    <div class="dashboard-container">
        <div class="card">
            <h3>Total Users</h3>
            <p><?= $data['totalUsers']; ?></p>
        </div>
        <div class="card">
            <h3>Total Categories</h3>
            <p><?= $data['totalCategories']; ?></p>
        </div>
        <div class="card">
            <h3>Total Products</h3>
            <p><?= $data['totalProducts']; ?></p>
        </div>
        <div class="card">
            <h3>Total Orders</h3>
            <p><?= $data['totalOrders']; ?></p>
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
