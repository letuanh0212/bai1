
<?php
session_start();
include_once(__DIR__ . '/../../../dbconnect.php');
$conn = connectDb();

// if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
//     echo "<div class='alert alert-danger'>Bạn không có quyền truy cập trang này!</div>";
//     exit;
// }

$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$order) {
    echo "<div class='alert alert-danger'>Không tìm thấy đơn hàng!</div>";
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2>Sửa đơn hàng #<?= $order['id'] ?></h2>
    <form method="POST" action="edit_process.php">
        <input type="hidden" name="id" value="<?= $order['id'] ?>">
        <div class="mb-3">
            <label for="shipping_address" class="form-label">Địa chỉ giao hàng</label>
            <input type="text" class="form-control" id="shipping_address" name="shipping_address" value="<?= htmlspecialchars($order['shipping_address']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Trạng thái</label>
            <select class="form-control" id="status" name="status">
                <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : '' ?>>Chờ xử lý</option>
                <option value="shipping" <?= $order['status'] == 'shipping' ? 'selected' : '' ?>>Đang giao</option>
                <option value="completed" <?= $order['status'] == 'completed' ? 'selected' : '' ?>>Hoàn thành</option>
                <option value="cancelled" <?= $order['status'] == 'cancelled' ? 'selected' : '' ?>>Đã hủy</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Cập nhật</button>
        <a href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>