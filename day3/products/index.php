<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Products List</h1>

    <!-- Search Form -->
    <form class="row mb-4" method="get" action="">
        <div class="col-md-4">
            <input type="text" class="form-control" name="name" placeholder="Search by product name" value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
        </div>
        <div class="col-md-2">
            <button type="submit" name="btnSearch" class="btn btn-primary">Search</button>
        </div>
        <div class="col-md-6 text-end">
            <a href="createproducts.php" class="btn btn-success">Create New Product</a>
        </div>
    </form>

    <!-- Products Table -->
    <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price (VND)</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'connectDB.php';
            $conn = connectDB();

            $sql = "SELECT id, Name, Price, Quantity, Image FROM products";

            if (isset($_GET['btnSearch']) && !empty($_GET['name'])) {
                $name = $conn->real_escape_string($_GET['name']);
                $sql .= " WHERE Name LIKE '%$name%'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array(MYSQLI_NUM)) {
        ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo htmlspecialchars($row[1]); ?></td>
                <td><?php echo number_format($row[2]); ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><img src="<?php echo $row[4]; ?>" style="width: 100px;"></td>
                <td>
                    <a href="updateProducts.php?id=<?php echo $row[0]; ?>" class="btn btn-sm btn-outline-primary">Update</a>
                    <a href="deleteProducts.php?id=<?php echo $row[0]; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
                </td>
            </tr>
        <?php
                }
                $result->free_result();
            } else {
        ?>
            <tr>
                <td colspan="6">No data found</td>
            </tr>
        <?php
            }
            $conn->close();
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
