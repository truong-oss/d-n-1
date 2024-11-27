<?php
class Cart
{
    public $conn;
                                                                                                                                        
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllCartItems()
    {
        try {
            $sql = "SELECT 
                        cart.id AS cart_id, 
                        san_phams.ten_san_pham, 
                        san_phams.gia_khuyen_mai, 
                        san_phams.hinh_anh, 
                        cart.so_luongs 
                    FROM cart
                    INNER JOIN san_phams ON cart.san_pham_id = san_phams.id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public function addToCart($san_pham_id, $so_luongs)
    {
        if ($this->checkStock($san_pham_id, $so_luongs)) {
            try {
                $sql = "INSERT INTO cart (san_pham_id, so_luongs) 
                        VALUES (:san_pham_id, :so_luongs)
                        ON DUPLICATE KEY UPDATE so_luongs = so_luongs + :so_luongs";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':san_pham_id' => $san_pham_id,
                    ':so_luongs' => $so_luongs
                ]);
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Not enough stock available.";
        }
    }

    public function updateCartItem($cart_id, $so_luongs)
    {
        try {
            // Optionally check stock here
            $sql = "UPDATE cart SET so_luongs = :so_luongs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':so_luongs' => $so_luongs,
                ':id' => $cart_id
            ]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function removeCartItem($cart_id)
    {
        try {
            $sql = "DELETE FROM cart WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $cart_id]);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    private function checkStock($san_pham_id, $quantity)
    {
        try {
            $sql = "SELECT so_luong FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $san_pham_id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            return $product && $product['so_luong'] >= $quantity;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}