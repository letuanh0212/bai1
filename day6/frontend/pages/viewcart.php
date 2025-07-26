<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Demo Shop</title>

    <?php include_once(__DIR__ . '/../layout/styles.php'); ?>

    <link href="/demoshop/assets/frontend/css/style.css"
        type="text/css" rel="stylesheet" />

    <style>
        .image {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <!-- header -->
    <?php include_once(__DIR__ . '/../layout/partials/header.php'); ?>
    <!-- end header -->

    <main role="main" class="mb-2">
        <!-- Block content -->
        <?php
        include_once(__DIR__ . '/../../dbconnect.php');

        $cart = [];
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        } else {
            $cart = [];
        }
        ?>

        <div class="container mt-4">
            <!-- Vùng ALERT hiển thị thông báo -->
            <div id="alert-container" class="alert alert-warning alert-dismissible fade d-none" role="alert">
                <div id="message">&nbsp;</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h1 class="text-center">Cart</h1>
            <div class="row">
                <div class="col col-md-12">
                    <?php if (!empty($cart)) : ?>
                        <table id="tblCart" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="datarow">
                                <?php $no = 1; ?>
                                <?php foreach ($cart as $item) : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <?php if (empty($item['image'])) : ?>
                                                <img src="/demoshop/assets/uploads/slider/default-image_600.png" class="imgfluid image" />
                                            <?php else : ?>
                                                <img src="/demoshop/assets/uploads/slider/<?= $item['image'] ?>" class="img-fluid image" />
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $item['name'] ?></td>
                                        <td>
                                            <input type="number"
                                                class="form-control" id="quantity_<?= $item['id'] ?>" name="quantity"
                                                value="<?= $item['quantity'] ?>" />
                                            <button class="btn btn-primary btn-sm btn-update-quantity" data-id="<?= $item['id'] ?>">Update</button>
                                        </td>
                                        <td><?= number_format($item['price'], 2, ".", ",") ?> vnđ</td>
                                        <td><?= number_format($item['quantity'] * $item['price'], 2, ".", ",") ?> vnđ</td>
                                        <td>
                                            <a id="delete_<?= $no ?>"
                                                data-id="<?= $item['id'] ?>" class="btn btn-danger btn-delete-product">
                                                <i class="fa fa-trash"
                                                    aria-hidden="true"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <h2>Cart Empty</h2>
                    <?php endif; ?>
                    <a href="/demoshop/frontend" class="btn btn-warning btn-md">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Continue Shopping
                    </a>
                    <!-- Nút Đặt hàng -->
                    <a href="#" id="btnOrder" class="btn btn-info btn-md">
                        <i class="fa fa-check" aria-hidden="true"></i> Đặt hàng
                    </a>
                </div>
            </div>
        </div>

        <!-- End block content -->
    </main>

    <!-- footer -->
    <?php include_once(__DIR__ . '/../layout/partials/footer.php'); ?>
    <!-- end footer -->

    <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT -->
    <?php include_once(__DIR__ . '/../layout/scripts.php'); ?>

    <!-- Các file Javascript sử dụng riêng cho trang này, liên kết tại đây -->
    <script>
$(document).ready(function () {
    function removeProductItem(id) {
        $.ajax({
            url: '/demoshop/frontend/api/removeCartItem.php',
            method: "POST",
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                $('#message').html('<h1>Can not delete item</h1>');
                $('.alert').removeClass('d-none').addClass('show');
            }
        });
    }

    $('#tblCart').on('click', '.btn-delete-product', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        removeProductItem(id);
    });

    function updateCartItem(id, quantity) {
        $.ajax({
            url: '/demoshop/frontend/api/updateCartItem.php',
            method: "POST",
            dataType: 'json',
            data: { id: id, quantity: quantity },
            success: function (data) {
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                $('#message').html('<h1>Can not update item</h1>');
                $('.alert').removeClass('d-none').addClass('show');
            }
        });
    }

    $('#tblCart').on('click', '.btn-update-quantity', function (event) {
        event.preventDefault();
        var id = $(this).data('id');
        var quantity = $('#quantity_' + id).val();
        updateCartItem(id, quantity);
    });

    // Xử lý nút Đặt hàng
    $('#btnOrder').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/bai1/day6/frontend/api/order_process.php',
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    $('#message').html('<h4>' + data.message + '</h4>');
                    $('.alert').removeClass('d-none').addClass('show alert-success');
                    setTimeout(function() { location.reload(); }, 2000);
                } else {
                    $('#message').html('<h4>' + data.message + '</h4>');
                    $('.alert').removeClass('d-none').addClass('show alert-danger');
                }
            },
            error: function() {
                $('#message').html('<h4>Lỗi đặt hàng!</h4>');
                $('.alert').removeClass('d-none').addClass('show alert-danger');
            }
        });
    });
});
    </script>
</body>

</html>