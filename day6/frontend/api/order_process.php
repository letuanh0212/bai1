<?php
session_start();
include_once(__DIR__ . '/../../dbconnect.php');
$conn = connectDb();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Bạn cần đăng nhập!']);
    exit();
}

$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống!']);
    exit();
}

// Tạo đơn hàng
$user_id = $_SESSION['user_id'];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}
$sqlOrder = "INSERT INTO orders (user_id, total, ordered_at) VALUES (?, ?, NOW())";
$stmtOrder = $conn->prepare($sqlOrder);
$stmtOrder->bind_param("id", $user_id, $total);
$stmtOrder->execute();
$order_id = $stmtOrder->insert_id;
$stmtOrder->close();

// Thêm sản phẩm vào order_items
$sqlItem = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";
$stmtItem = $conn->prepare($sqlItem);
foreach ($cart as $item) {
    $stmtItem->bind_param("iiid", $order_id, $item['id'], $item['quantity'], $item['price']);
    $stmtItem->execute();
}
$stmtItem->close();

// Xóa giỏ hàng
unset($_SESSION['cart']);

$conn->close();

echo json_encode(['success' => true, 'message' => 'Đặt hàng thành công!']);