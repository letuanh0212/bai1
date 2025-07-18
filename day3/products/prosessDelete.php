<?php
include "connectDB.php";
$conn = connectDB();

// Kiểm tra id có tồn tại và là số
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID không hợp lệ");
}

$id = (int)$_GET['id'];  // ép kiểu để an toàn

$sql = "DELETE FROM products WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: accounts.php");
} else {
    echo "Lỗi khi xóa: " . $conn->error;
}

$conn->close();
?>
