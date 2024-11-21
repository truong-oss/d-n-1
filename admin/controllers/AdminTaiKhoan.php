<?php

class AdminTaiKhoanController
{
    public $modelTaiKhoan;
    public $modelDonHang;
    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
        $this->modelDonHang =new AdminDonHang();
    }
    public function danhSachQuanTri()
    {
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
      
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }
    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';
        deleteSessionError();
    }
    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $dien_thoai = $_POST['so_dien_thoai'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'tên không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'tên không được để trống';
            }
            if (empty($dien_thoai)) {
                $errors['$so_dien_thoai'] = 'tên không được để trống';
            }
            if (empty($dien_thoai)) {
                $errors['$so_dien_thoai'] = 'tên không được để trống';
            }
            

            if (empty($errors)) {
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                // var_dump($password);die();
                $chuc_vu = 1;
                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $dien_thoai,$ngay_sinh, $gioi_tinh,$chuc_vu);
              
                header("location: " . BASE_URL_ADMIN . '?act=quan-tri-tai-khoan');
                exit();
            } else {
                //trả về form và lỗi
                $_SESSION['flash'] = true;
                header("location: " . BASE_URL_ADMIN . '?act=form-them-quan-tri');
                exit();
            }
        }
    }

    public function postDeleteTaiKhoan()
    {
        // Lấy id của tài khoản cần xóa từ tham số GET
        $id_quan_tri = $_GET['id_quan_tri'] ?? null;

        if ($id_quan_tri) {
            // Gọi phương thức xóa tài khoản từ Model
            $result = $this->modelTaiKhoan->deleteTaiKhoan($id_quan_tri);

            if ($result) {
                // Nếu xóa thành công, chuyển hướng về danh sách tài khoản
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-tri-tai-khoan');
                exit();
            }
        }
    }
    public function formEditQuanTri(){
        $id_quan_tri = $_GET['id_quan_tri'];
        $quantri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        $listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1); // Nếu cần lấy tất cả tài khoản admin
        require_once './views/taikhoan/quantri/editQuanTri.php';
        deleteSessionError(); // Xóa session lỗi cũ sau khi load form
    }
    
    public function postEditQuanTri(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin từ POST
            $id_quan_tri = $_POST['id_quan_tri'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
    
            // Tạo mảng lỗi
            $errors = [];
            
            // Kiểm tra các trường bắt buộc
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'Tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'Email người dùng không được để trống';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'Ngày sinh không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'Giới tính không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Vui lòng chọn trạng thái';
            }
            
            // Nếu có lỗi, lưu vào session và quay lại form
            $_SESSION['error'] = $errors;
            
            if (empty($errors)) {
                // Gọi model để cập nhật thông tin quản trị
                $this->modelTaiKhoan->UpdatTaiKhoan(
                    $id_quan_tri,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $trang_thai
                );
    
                // Redirect về trang quản lý tài khoản
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-tri-tai-khoan');
                exit();
            } else {
                // Nếu có lỗi, redirect về form chỉnh sửa và hiển thị lỗi
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-quan-tri&id_quan_tri=' . $id_quan_tri);
                exit();
            }
        }
    }
    
    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/taikhoan/khachhang/listKhachhang.php';
    }
    public function formEditKhachhang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        // var_dump($id_khach_hang);die;
        require_once './views/taikhoan/khachhang/EditKhachHang.php';
        deleteSessionError();
    }
    public function deltailKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        $listDonHang=$this->modelDonHang->getDonHangFromKhachHang($id_khach_hang);
        require_once './views/taikhoan/khachhang/deltaiKhachHang.php';
    }
    public function postEditKhachHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $khach_hang_id = $_POST['khach_hang_id'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $ngay_sinh = $_POST['ngay_sinh'] ?? '';
            $gioi_tinh = $_POST['gioi_tinh'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';


            //tạo 1 mảng trống để chứa dữ liệu
            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = 'tên người dùng không được để trống';
            }
            if (empty($email)) {
                $errors['email'] = 'email người dùng không được để trống';
            }
            if (empty($ngay_sinh)) {
                $errors['ngay_sinh'] = 'ngay_sinh người dùng không được để trống';
            }
            if (empty($gioi_tinh)) {
                $errors['gioi_tinh'] = 'gioi tinh người dùng không được để trống';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'vui lòng trọn trạng thái';
            }


            $_SESSION['error'] = $errors;
           
            if (empty($errors)) {
                
                $this->modelTaiKhoan->UpdateKhachHang(
                    $khach_hang_id,
                    $ho_ten,
                    $email,
                    $so_dien_thoai,
                    $ngay_sinh,
                    $gioi_tinh,
                    $dia_chi,
                    $trang_thai,    
                );
            

                header('Location: ' . BASE_URL_ADMIN . '?act=quan-tri-tai-khoan-khach-hang');
                
                exit();
            } else {
                $_SESSION['flash'] = true;
                header('Location: ' . BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khach_hang_id);
                exit();
            }
        }
    }
    public function postDeletekhachhang()
    {
        // Lấy id của tài khoản cần xóa từ tham số GET
        $id_khach_hang = $_GET['id_khach_hang'] ?? null;

        if ($id_khach_hang) {
            // Gọi phương thức xóa tài khoản từ Model
            $result = $this->modelTaiKhoan->deleteKhachHang($id_khach_hang);

            if ($result) {
                // Nếu xóa thành công, chuyển hướng về danh sách tài khoản
                header('Location: ' . BASE_URL_ADMIN . '?act=quan-tri-tai-khoan-khach-hang');
                exit();
            }
        }
    }
    public function formLogin(){
        require_once './views/login/login.php';
        deleteSessionError();

    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lẤY email và pass gửi lên từ form
            $email = $_POST['email'];
            $password = $_POST['password'];
            //   var_dump($password);die;
            // xử lý kiểm tra thông tin đăng nhập
            $user = $this->modelTaiKhoan->checkLogin($email,$password);
                //var_dump($user);die;
            if($user == $email){     
                // trường hợp đăng nhập thành công
                // lưu thông tin cào session
                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN);

                exit();
            }else{
                // neu loi thi luu loi vao session
                $_SESSION['error'] = $user;
                 //var_dump($_SESSION['error']);die;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit(); 
            }
            
        }
    }
    public function logout(){
        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']);
            header('location: ' . BASE_URL_ADMIN . '?act=login-admin');
            exit();
        }
    }
}
