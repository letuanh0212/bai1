
<?php
session_start();
include_once(__DIR__ . '/../../../dbconnect.php');
$conn = connectDb();
// Kiểm tra quyền admin
// if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
//     echo "<div class='alert alert-danger'>Bạn không có quyền truy cập trang này!</div>";
//     exit;
// }

$sql = "SELECT o.*, u.username FROM orders o LEFT JOIN user u ON o.user_id = u.id ORDER BY o.ordered_at DESC";
$result = $conn->query($sql);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2>Quản lý đơn hàng</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã đơn</th>
                <th>Người đặt</th>
                <th>Tổng tiền</th>
                <th>Địa chỉ giao hàng</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($order = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= htmlspecialchars($order['username']) ?></td>
                    <td><?= number_format($order['total_amount'], 0, ",", ".") ?> vnđ</td>
                    <td><?= htmlspecialchars($order['shipping_address']) ?></td>
                    <td><?= htmlspecialchars($order['status']) ?></td>
                    <td><?= $order['ordered_at'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $order['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="detail.php?id=<?= $order['id'] ?>" class="btn btn-info btn-sm">Chi tiết</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>