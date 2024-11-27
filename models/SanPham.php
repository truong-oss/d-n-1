<?php 

class Sanpham 
{
    public  $conn;
    
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham(){
        try {
            $sql = 'SELECT san_phams .*,danh_mucs.ten_danh_muc
            from san_phams
            INNER JOIN danh_mucs on san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt-> execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function getAllDanhmuc(){
        try {
            $sql = 'SELECT * from danh_mucs 
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt-> execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function getOnesp($id){
        try {
            $sql = 'SELECT san_phams .*,danh_mucs.ten_danh_muc
            from san_phams
            INNER JOIN danh_mucs on san_phams.danh_muc_id = danh_mucs.id
            where san_phams.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt-> execute([':id'=>$id]);
            return $stmt->fetch();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getListAnhsp($id){
        try {
            $sql = 'SELECT * from list_anh_san_phams where san_pham_id=:id';
            $stmt = $this->conn->prepare($sql);
            $stmt-> execute([':id'=>$id]);
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function getSanphamTheodanhmuc($danh_muc_id){
        try {
            $sql = 'SELECT san_phams .*,danh_mucs.ten_danh_muc
            from san_phams
            INNER JOIN danh_mucs on san_phams.danh_muc_id = danh_mucs.id
            where san_phams.danh_muc_id= '.$danh_muc_id;
            $stmt = $this->conn->prepare($sql);
            $stmt-> execute();
            return $stmt->fetchAll();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    // public function getProductById($id) {
    //     try {
    //         $sql = "SELECT * FROM san_phams WHERE id = :id";
    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->execute(['id' => $id]);
    //         return $stmt->fetch();
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //         return null;
    //     }
    // }
    

}