
<?php
include_once(__DIR__ . '/../../../dbconnect.php');
$conn = connectDb();

$id = $_GET['id'] ?? 0;
$user = null;

if ($id > 0) {
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}

if (!$user) {
    echo "<div class='alert alert-danger'>Không tìm thấy người dùng!</div>";
    exit;
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-danger text-white">
            <h4>Xác nhận xóa người dùng</h4>
        </div>
        <div class="card-body">
            <p>Bạn có chắc chắn muốn xóa người dùng sau?</p>
            <ul>
                <li><strong>Tên đăng nhập:</strong> <?= htmlspecialchars($user['username']) ?></li>
                <li><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></li>
                <li><strong>Địa chỉ:</strong> <?= htmlspecialchars($user['address']) ?></li>
                <li><strong>Vai trò:</strong> <?= htmlspecialchars($user['role']) ?></li>
            </ul>
            <form method="get" action="delete_process.php">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
                <a href="index.php" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
</div>