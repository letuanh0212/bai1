<!DOCTYPE html> 
<html lang="vi"> 
 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial
scale=1.0"> 
    <title>About</title> 
 
    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ 
trang web --> 
    <?php include_once(__DIR__ . '/../layout/styles.php'); ?> 
 
    <link href="/demoshop/assets/frontend/css/style.css" 
type="text/css" rel="stylesheet" /> 
</head> 
 
<body class="d-flex flex-column h-100"> <!-- Sử dụng d-flex và flex
column từ Bootstrap --> 
    <!-- header --> 
    <?php include_once(__DIR__ . '/../layout/partials/header.php'); 
?> 
    <!-- end header --> 
 
    <main role="main" class="mb-2 flex-fill"> <!-- Sử dụng flex-fill 
để main chiếm phần còn lại --> 
        <!-- Block content --> 
        <div class="container mt-2"> 
            <h1 class="text-center">About Us</h1> 
            <div class="row"> 
                <div class="col col-md-12"> 
                    <h5 class="text-center">DemoShop</h5> 
                    <h5 class="text-center">Simple Shopping cart</h5> 
                </div> 
            </div> 
            <div class="row mt-2"> 
                <div class="col col-md-12"> 
                    <iframe 
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1959.5632662918192!2d106.71337327857441!3d10.801619713616022!2m3!1f0!2f0!3f0!3m2!
 1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a459cb43ab%3A0x6c3d29d370b52a7e!
 2sHCMC%20University%20of%20Technology%20(HUTECH)%20%E2%80%93%20Sai%20G
 on%20Campus!5e0!3m2!1sen!2s!4v1752748161826!5m2!1sen!2s" width="100%" 
height="450" style="border:0;" allowfullscreen="" loading="lazy" 
referrerpolicy="no-referrer-when-downgrade"></iframe> 
                </div> 
            </div> 
        </div> 
        <!-- End block content --> 
    </main> 
 
    <!-- footer --> 
    <?php include_once(__DIR__ . '/../layout/partials/footer.php'); 
?> 
    <!-- end footer --> 
 
    <!-- Nhúng file quản lý phần SCRIPT JAVASCRIPT --> 
    <?php include_once(__DIR__ . '/../layout/scripts.php'); ?> 
 
</body> 
</html>
