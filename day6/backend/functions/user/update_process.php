
<?php
include_once(__DIR__ . '/../../../dbconnect.php');
$conn = connectDb();

// Lấy dữ liệu từ form
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'] ?? '';
$email = $_POST['email'];
$address = $_POST['address'];
$role = $_POST['role'];

// Nếu password không nhập thì giữ nguyên
if ($password == '') {
    $sql = "UPDATE user SET 
                username = ?, 
                email = ?, 
                address = ?, 
                role = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $username, $email, $address, $role, $id);
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET 
                username = ?, 
                password = ?, 
                email = ?, 
                address = ?, 
                role = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $username, $hashed_password, $email, $address, $role, $id);
}

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    header("Location: update.php?id=$id");
}

$stmt->close();
$conn->close();