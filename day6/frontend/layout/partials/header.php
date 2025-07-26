<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Tính tổng số lượng sản phẩm trong giỏ hàng
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalCartItems = 0;
foreach ($cart as $item) {
    $totalCartItems += $item['quantity'];
}
?>

<header data-bs-theme="dark">
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow">
    <div class="container-fluid">
      <!-- Logo -->
      <a class="navbar-brand fw-bold" href="/bai1/day6/frontend/index.php">🛒 Demo Shop</a>

      <!-- Toggle button for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu items -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/bai1/day6/frontend/index.php">Trang chủ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/bai1/day6/frontend/pages/about.php">About</a>
          </li>

          <!-- Link giỏ hàng -->
          <li class="nav-item">
            <a class="nav-link" href="/bai1/day6/frontend/pages/viewcart.php">
              🛒 Giỏ hàng 
              <?php if ($totalCartItems > 0): ?>
                <span class="badge bg-danger"><?= $totalCartItems ?></span>
              <?php endif; ?>
            </a>
          </li>

          <!-- Nếu là admin thì hiện Dashboard -->
          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link" href="/bai1/day6/backend/pages/dashboard.php">Dashboard</a>
            </li>
          <?php endif; ?>

          <!-- Hiển thị người dùng -->
          <?php if (isset($_SESSION['username'])): ?>
            <li class="nav-item">
              <a class="nav-link disabled">👋 Xin chào, <?= htmlspecialchars($_SESSION['username']) ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/bai1/day6/frontend/pages/logout.php">Đăng xuất</a>
            </li>
          <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="/bai1/day6/frontend/pages/login.php">Đăng nhập</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/bai1/day6/frontend/pages/resgister.php">Đăng ký</a>
            </li>
          <?php endif; ?>
        </ul>

        <!-- Search -->
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Tìm</button>
        </form>
      </div>
    </div>
  </nav>
</header>