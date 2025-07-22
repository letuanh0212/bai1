<?php
include_once(__DIR__ . '/../../../dbconnect.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Không tìm thấy sản phẩm cần sửa.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? 0;
    $stock_quantity = $_POST['stock_quantity'] ?? 0;
    $image_url = $_POST['image_url'] ?? '';
    $category = $_POST['category'] ?? '';

    $sql = "UPDATE products 
            SET name = ?, description = ?, price = ?, stock_quantity = ?, image_url = ?, category = ?
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdiisi", $name, $description, $price, $stock_quantity, $image_url, $category, $id);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Lỗi cập nhật: " . $stmt->error;
    }

    $stmt->close();
}

$sqlSelect = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sqlSelect);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "Không tìm thấy sản phẩm.";
    exit;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">Update Product</h1>

    <form action="update.php?id=<?= $id ?>" method="post">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"><?= htmlspecialchars($product['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" step="0.01" value="<?= $product['price'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock Quantity</label>
            <input type="number" class="form-control" name="stock_quantity" value="<?= $product['stock_quantity'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" class="form-control" name="image_url" value="<?= htmlspecialchars($product['image_url']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" class="form-control" name="category" value="<?= htmlspecialchars($product['category']) ?>">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>
