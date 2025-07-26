
<?php
session_start();
include_once(__DIR__ . '/../../dbconnect.php');
include_once(__DIR__ . '/loginf.php'); // xử lý đăng nhập trước khi hiển thị giao diện
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập - MyShop</title>
  <?php include_once(__DIR__ . '/../layout/styles.php'); ?>
  <style>
    body { background: #f2f5f7; }
    .login-container { max-width: 500px; margin: 60px auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 0 15px rgba(0,0,0,0.1);}
    .form-label { font-weight: 500; }
    .btn-primary { border-radius: 30px; }
    .alert { border-radius: 8px; }
  </style>
</head>
<body>
  <?php include_once(__DIR__ . '/../layout/partials/header.php'); ?>
  <div class="container">
    <div class="login-container mt-5">
      <h2 class="text-center text-primary mb-4">Đăng nhập</h2>
      <?php if (!empty($error)) : ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <form method="POST" novalidate>
        <div class="mb-3">
          <label for="username" class="form-label">Tên đăng nhập</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Đăng nhập</button>
        </div>
      </form>
      <div class="text-center mt-3">
        <p>Chưa có tài khoản? <a href="/myshop/frontend/pages/register.php">Đăng ký</a></p>
      </div>
    </div>
  </div>
  <?php include_once(__DIR__ . '/../layout/partials/footer.php'); ?>
  <?php include_once(__DIR__ . '/../layout/scripts.php'); ?>
</body>
</html>