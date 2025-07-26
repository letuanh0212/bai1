<?php
ob_start();
include_once(__DIR__ . '/../../../dbconnect.php');
$conn = connectDb();

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$address = $_POST['address'] ?? '';
$role = $_POST['role'] ?? 'user';

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (username, password, email, address, role) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $username, $hashed_password, $email, $address, $role);

if ($stmt->execute()) {
    header("Location: index.php");
    exit();
} else {
    echo "Lỗi: " . $stmt->error;
}
$stmt->close();
$conn->close();