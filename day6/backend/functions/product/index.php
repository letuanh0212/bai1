<?php
include_once(__DIR__ . '/../../../dbconnect.php');
$conn = connectDb();

// Lấy danh sách sản phẩm
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý sản phẩm</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-5">
    <h1 class="text-center mb-4">Danh sách sản phẩm</h1>

    <div class="mb-3 text-end">
      <a href="create.php" class="btn btn-success">+ Thêm sản phẩm</a>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Tồn kho</th>
            <th>Ảnh</th>
            <th>Danh mục</th>
            <th>Hành động</th>
          </tr>
        </thead>
        <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?= $row['id'] ?></td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['description']) ?></td>
              <td><?= number_format($row['price'], 0, ',', '.') ?>₫</td>
              <td><?= $row['stock_quantity'] ?></td>
              <td><img src="/myshop/assets/uploads/slider/<?= $row['image_url'] ?>" width="80" height="80" class="img-thumbnail"></td>
              <td><?= $row['category'] ?></td>
              <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xoá?')" class="btn btn-sm btn-danger">Xoá</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="8" class="text-center">Không có sản phẩm nào.</td>
          </tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
