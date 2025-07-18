<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Update Product</h3>
                </div>
                <div class="card-body">
                    <?php 
                        include 'connectDB.php';
                        $conn = connectDB();
                        $id = $_GET['id'];
                        $SQL = "SELECT id, name, price, quantity, image FROM products WHERE id = $id";
                        $result = $conn->query($SQL);
                        if ($result->num_rows > 0 && $row = $result->fetch_array(MYSQLI_NUM)) {
                    ?>
                    <form action="processUpdate.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row[0]; ?>">

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row[1]; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price (VND)</label>
                            <input type="number" class="form-control" id="price" name="price" value="<?php echo $row[2]; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row[3]; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image URL</label>
                            <input type="text" class="form-control" id="image" name="image" value="<?php echo $row[4]; ?>" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4">Update</button>
                            <a href="index.php" class="btn btn-secondary px-4">Cancel</a>
                        </div>
                    </form>
                    <?php 
                        } else {
                            echo "<div class='alert alert-danger'>Product not found!</div>";
                        }
                        $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
