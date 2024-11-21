<?php
class DashboardModel {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function getTotalUsers() {
        $query = "SELECT COUNT(*) as total FROM tai_khoans";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getTotalCategories() {
        $query = "SELECT COUNT(*) as total FROM danh_mucs";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getTotalProducts() {
        $query = "SELECT COUNT(*) as total FROM san_phams";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getTotalOrders() {
        $query = "SELECT COUNT(*) as total FROM thanh_toans";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
}
