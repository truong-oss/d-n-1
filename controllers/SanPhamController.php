<?php 

class SanPhamController
{
    public $modelsanphamm;
    public function __construct()
    {
        $this->modelsanphamm = new Sanpham();
    }
    public function Listsanpham(){
        $listSanPham = $this ->modelsanphamm->getAllSanPham();
        $listDanhmuc = $this->modelsanphamm->getAllDanhmuc();
        require_once './views/listsanpham/list.php';
        
    }

    public function ChitietSanpham(){
        $id = $_GET['id_san_pham'];
        // $san_phamsId = $_GET['id'] ?? null;
        $sanpham = $this->modelsanphamm->getOnesp($id);
        $listanhsanpham = $this->modelsanphamm->getListAnhsp($id);
        $listdanhmuctheosanpham = $this->modelsanphamm->getSanphamTheodanhmuc($sanpham['danh_muc_id']);
        // $sanpham = $this->modelsanphamm->getProductById($san_phamsId);
        require_once './views/listsanpham/ChitietSanpham.php';

    }
    

}