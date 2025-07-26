
<?php
session_start();
include_once(__DIR__ . '/../../../dbconnect.php');
$conn = connectDb();

// if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
//     echo "<div class='alert alert-danger'>Bạn không có quyền truy cập trang này!</div>";
//     exit;
// }

$id = $_POST['id'];
$shipping_address = $_POST['shipping_address'];
$status = $_POST['status'];

$sql = "UPDATE orders SET shipping_address = ?, status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $shipping_address, $status, $id);

if ($stmt->execute()) {
    header("Location: list.php");
} else {
    header("Location: edit.php?id=$id");
}
$stmt->close();
$conn->close();