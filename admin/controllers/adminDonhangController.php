<?php 

class adminDonhangController
{
    public $modelDonHang;
    public function __construct()
    {
        $this->modelDonHang = new AdminDonHang();
    }
    public function danhSachDonhang(){
    // Lấy danh sách đơn hàng từ model
        $listdonhang = $this->modelDonHang->getAllDonHang();
    require_once './views/donhang/listDonHang.php';
    }
    public function detaiDonHang($don_hang_id){
        // $don_hang_id=$_GET['id_don_hang'];
    
        $donHang=$this->modelDonHang->getDetailDonHang($don_hang_id);
         $sanPhamDonHang=$this->modelDonHang->getListSpDonHang($don_hang_id);
        require_once './views/donhang/chitietdonhang.php';
    }
    public function formEditDonHang(){
       
        $id=$_GET['id_don_hang'];
        $donHang = $this->modelDonHang->getDetailDonHang($id);
        $listTrangThaiDonHang =$this->modelDonHang->getAllTrangThaiDonHang(($id));
        $listTrangThaiThanhtoan =$this->modelDonHang->getAllTrangThaithanhtoan(($id));
        if($donHang){
            require_once './views/DonHang/editDonHang.php';
            deleteSessionError();
        }else{
            header("location: " . BASE_URL_ADMIN .'?act=don-hang' );
                exit();
        }
    }
    public function postEditDonHang(){
        // hàm này dùng để xử lý dữ liệu
       
        //kiểm tra xem dữ liệu có phải được submit lên ko
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lấy ra dữ liệu
            //lấy ra dữ liệu cũ của sản phẩm
            $don_hang_id = $_POST['don_hang_id'] ?? '';
           
            $trang_thai_don_hang_id = $_POST['trang_thai_don_hang_id'] ?? '';
            $trang_thai_thanh_toan_id = $_POST['trang_thai_thanh_toan_id'] ?? '';
            
           

            

            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if(empty($trang_thai_don_hang_id)){
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }
            

            $_SESSION['error'] = $errors;
            if(empty($errors)){
               $this->modelDonHang->updateDonHang($don_hang_id,
                                                 $trang_thai_don_hang_id,
                                                 $trang_thai_thanh_toan_id
                                                );
                                              
                header("location: " . BASE_URL_ADMIN .'?act=don-hang' );
                exit();
                
            }else{
                //trả về form và lỗi
                //đặt chỉ thị xóa session sau khi hiển thị form
                $_SESSION['flash'] =true;
                header("location: " . BASE_URL_ADMIN .'?act=form-sua-don-hang&id_don_hang=' .$don_hang_id );
                exit();
            }
        }
    }



}