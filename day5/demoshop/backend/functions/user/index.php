<?php
include_once(__DIR__ . '/../../../dbconnect.php');
$conn = connectDB();
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);
$users = [];
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $users[] = $row;
}
?>

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-5">
  <div class="card shadow">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">👥 Danh sách người dùng</h4>
      <a href="add.php" class="btn btn-success btn-sm">➕ Thêm người dùng</a>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped table-hover mb-0">
          <thead class="table-dark">
            <tr class="text-center">
              <th>#</th>
              <th>Tên đăng nhập</th>
              <th>Email</th>
              <th>Địa chỉ</th>
              <th>Vai trò</th>
              <th>Ngày tạo</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($users) > 0): ?>
              <?php foreach ($users as $index => $user): ?>
                <tr class="text-center align-middle">
                  <td><?= $index + 1 ?></td>
                  <td><?= htmlspecialchars($user['username']) ?></td>
                  <td><?= htmlspecialchars($user['email']) ?></td>
                  <td><?= htmlspecialchars($user['address']) ?></td>
                  <td>
                    <span class="badge <?= $user['role'] == 'admin' ? 'bg-danger' : 'bg-secondary' ?>">
                      <?= htmlspecialchars($user['role']) ?>
                    </span>
                  </td>
                  <td><?= date('d/m/Y H:i', strtotime($user['created_at'])) ?></td>
                  <td>
                    <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm me-1">
                      ✏️ Sửa
                    </a>
                    <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">
                      🗑️ Xóa
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center text-muted py-4">Không có người dùng nào trong hệ thống.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
