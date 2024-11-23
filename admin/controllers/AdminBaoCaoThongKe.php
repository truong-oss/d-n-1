<?php
class AdminBaoCaoThongKe{
    public $model1;
    public function __construct() {
        $this->model1 = new DashboardModel();
    }

    public function home(){
        $data = [
                     'totalUsers' => $this->model1->getTotalUsers(),
                     'totalCategories' => $this->model1->getTotalCategories(),
                     'totalProducts' => $this->model1->getTotalProducts(),
                     'totalOrders' => $this->model1->getTotalOrders(),
                ];
        require_once './views/home.php';

    }
  

}
?>