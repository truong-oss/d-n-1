<?php

class CartController {
    public $modelCart;

    public function __construct()
    {
        $this->modelCart = new Cart();
    }

    public function giohang()
    {
        $cartItems = $this->modelCart->getAllCartItems();
        require_once './views/cart/cart.php'; // Gọi view để hiển thị
    }

    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $san_pham_id = $_GET['id_san_pham'] ?? null;
            $so_luongs = $_POST['so_luongs'] ?? 1;
            // Kiểm tra dữ liệu hợp lệ
            if ($san_pham_id && is_numeric($so_luongs) && $so_luongs > 0) {
                try {
                    $this->modelCart->addToCart($san_pham_id, $so_luongs);
                    header("Location: " . BASE_URL . '?act=gio_hang');
                    exit;
                } catch (Exception $e) {
                    // Xử lý lỗi nếu cần
                    echo "Error adding product: " . $e->getMessage();
                }
            } else {
                http_response_code(400); // Bad Request
                echo "Invalid product ID or quantity.";
            }
        } else {
            http_response_code(405); // Phương thức không được cho phép
            echo "Method not allowed.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cart_id = $_POST['id'] ?? [];
            $so_luongs = $_POST['so_luongs'] ?? [];
            var_dump($_POST['id'], $_POST['so_luongs']);
            foreach ($cart_id as $index => $cartId) {
                $quantity = isset($so_luongs[$index]) ? (int)$so_luongs[$index] : 1;

                if (is_numeric($quantity) && $quantity > 0) {
                    try {
                        $this->modelCart->updateCartItem($cartId, $quantity);
                    } catch (Exception $e) {
                        // Xử lý lỗi nếu cần
                        echo "Error updating product: " . $e->getMessage();
                    }
                }
            }

            header("Location: " . BASE_URL . '?act=gio_hang'); // Quay lại giỏ hàng
            exit;
        } else {
            http_response_code(405); // Method not allowed
        }
    }

    public function removeProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cart_id = $_POST['id'][0] ?? null; // Lấy cart_id từ mảng

            if ($cart_id) {
                try {
                    $this->modelCart->removeCartItem($cart_id);
                    header("Location: " . BASE_URL . '?act=gio_hang');
                    exit;
                } catch (Exception $e) {
                    echo "Error removing product: " . $e->getMessage();
                }
            } else {
                http_response_code(400); // Bad Request
                echo "Invalid cart ID.";
            }
        } else {
            http_response_code(405); // Method not allowed
        }
    }
}