
<?php
include_once(__DIR__ . '/../../../dbconnect.php');
$conn = connectDb();

// Lấy id từ URL
$id = $_GET['id'] ?? 0;

if ($id > 0) {
    $sql = "DELETE FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php");
    } else {
        header("Location: edit.php?id=$id");
    }

    $stmt->close();
}

$conn->close();