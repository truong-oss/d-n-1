<?php
class SanPham{
    public $conn;
    public function __construct()
    {
        $this->conn= connectDB();
    }
    public function getAllSanPham(){
        try {
           $sql = 'SELECT san_phams.*,danh_mucs.ten_danh_muc
            from san_phams
            inner join danh_mucs on san_phams.danh_muc_id = danh_mucs.id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
           echo "lỗi" . $e->getMessage();
        }
    }
   
    public function getListBanner(){
      try{
      $sql = 'select * from banners';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll();
      }catch(Exception $e){
          echo "lỗi" .$e->getMessage();
      }
     
  }
}
?>