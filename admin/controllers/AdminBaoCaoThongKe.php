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
    // public function index() {
    //     $data = [
    //         'totalUsers' => $this->model->getTotalUsers(),
    //         'totalCategories' => $this->model->getTotalCategories(),
    //         'totalProducts' => $this->model->getTotalProducts(),
    //         'totalOrders' => $this->model->getTotalOrders(),
    //     ];

    //     // Load the view and pass the data
    //     require_once './views/home.php';
    // }

}
?>