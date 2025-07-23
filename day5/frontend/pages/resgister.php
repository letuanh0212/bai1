<?php
session_start();
include_once(__DIR__ . '/../../dbconnect.php');
$conn = connectDb();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = "Vui lòng điền đầy đủ thông tin.";
    } elseif ($password !== $confirm_password) {
        $error = "Mật khẩu xác nhận không khớp.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email đã được sử dụng.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $role = 'user';
            $insert = $conn->prepare("INSERT INTO user (username, email, password, role) VALUES (?, ?, ?, ?)");
            $insert->bind_param("ssss", $username, $email, $hashedPassword, $role);

            if ($insert->execute()) {
                $success = "Đăng ký thành công. Bạn có thể đăng nhập.";
            } else {
                $error = "Đăng ký thất bại. Vui lòng thử lại.";
            }
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng ký - MyShop</title>
  <?php include_once(__DIR__ . '/../layout/styles.php'); ?>
  <style>
    body {
      background: #f2f5f7;
    }

    .register-container {
      max-width: 500px;
      margin: 60px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .form-label {
      font-weight: 500;
    }

    .btn-primary {
      border-radius: 30px;
    }

    .alert {
      border-radius: 8px;
    }
  </style>
</head>

<body>
  <?php include_once(__DIR__ . '/../layout/partials/header.php'); ?>

  <div class="container">
    <div class="register-container mt-5">
      <h2 class="text-center text-primary mb-4">Đăng ký tài khoản</h2>

      <?php if (!empty($error)) : ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
      <?php elseif (!empty($success)) : ?>
        <div class="alert alert-success text-center"><?= htmlspecialchars($success) ?></div>
      <?php endif; ?>

      <form method="POST" novalidate>
        <div class="mb-3">
          <label for="username" class="form-label">Tên đăng nhập</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Mật khẩu</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
          <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Đăng ký</button>
        </div>
      </form>

      <div class="text-center mt-3">
        <p>Đã có tài khoản? <a href="/myshop/frontend/pages/login.php">Đăng nhập</a></p>
      </div>
    </div>
  </div>

  <?php include_once(__DIR__ . '/../layout/partials/footer.php'); ?>
  <?php include_once(__DIR__ . '/../layout/scripts.php'); ?>
</body>

</html>
