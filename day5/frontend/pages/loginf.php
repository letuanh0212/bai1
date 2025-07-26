
<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  $conn = connectDb();

  // Thêm lấy role
  $stmt = $conn->prepare("SELECT id, username, password, role FROM user WHERE username = ?");
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $user['role']; // Lưu role

      // Chuyển hướng theo role
      if ($user['role'] == 'admin') {
        header('Location: /demoshop/backend/functions/order/index.php');
      } else {
        header('Location: /demoshop/frontend/index.php');
      }
      exit();
    } else {
      $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
  } else {
    $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
  }
  $stmt->close();
  $conn->close();
}
?>