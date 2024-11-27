<?php 
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ
require_once './commons/router.php';

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/SanPhamController.php';
require_once './controllers/CartController.php';
// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/Cart.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

 match ($act) {
  '/' =>(new HomeController)->home(),
//
  'list-san-pham' => (new  SanPhamController())->Listsanpham(),
    'chi-tiet-san-pham' => (new  SanPhamController())->ChitietSanpham(),
    //
    // 'gio_hang' =>(new CartController())->giohang(),
    'gio_hang' => (new CartController())->giohang(),
    'add' => (new CartController())->addProduct(),
    'update' => (new CartController())->update(),
    'remove' => (new CartController())->removeProduct(),
 
};
?>