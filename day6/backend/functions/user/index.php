
<?php include_once(__DIR__ . '/../../layouts/config.php'); ?>
<?php include_once(__DIR__ . '/../../../dbconnect.php'); ?>

<?php
$conn = connectDb();
$sql = "SELECT * FROM user ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách User</title>
    <?php include_once(__DIR__ . '/../../layouts/head.php'); ?>
</head>
<body class="d-flex flex-column h-100">
    <?php include_once(__DIR__ . '/../../layouts/partials/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include_once(__DIR__ . '/../../layouts/partials/sidebar.php'); ?>
            <main role="main" class="col-md-10 ml-sm-auto px-4 mb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Danh sách User</h1>
                    <a href="create.php" class="btn btn-success btn-sm">➕ Thêm User</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr class="text-center">
                                <th>#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php while ($user = $result->fetch_assoc()): ?>
                                <tr class="text-center align-middle">
                                    <td><?= $i++ ?></td>
                                    <td><?= htmlspecialchars($user['username']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td><?= htmlspecialchars($user['address']) ?></td>
                                    <td>
                                        <span class="badge <?= $user['role'] == 'admin' ? 'bg-danger' : 'bg-secondary' ?>">
                                            <?= htmlspecialchars($user['role']) ?>
                                        </span>
                                    </td>
                                    <td><?= date('d/m/Y H:i', strtotime($user['created_at'])) ?></td>
                                    <td>
                                        <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm me-1">✏️ Sửa</a>
                                        <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa user này?')">🗑️ Xóa</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    <?php include_once(__DIR__ . '/../../layouts/partials/footer.php'); ?>
    <?php include_once(__DIR__ . '/../../layouts/scripts.php'); ?>
</body>
</html>