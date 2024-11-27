<?php

class HomeController{
    public $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        
    }
    public function home(){
    //   $listBanner = $this->modelSanPham->getListBanner();
      
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    
 








}




?>