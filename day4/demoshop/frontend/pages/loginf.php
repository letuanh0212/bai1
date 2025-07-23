<?php
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  $conn = connectDb();

  $stmt = $conn->prepare("SELECT id, username, password FROM user WHERE username = ?");
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['username'] = $user['username'];
      header('Location: /demoshop/frontend/index.php');
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
