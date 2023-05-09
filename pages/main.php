<!-- start header -->
<?php
include("./pages/base/header.php");
?>
<!-- end header -->

<?php
    if (isset($_GET['page'])) {
        $action = $_GET['page'];
    }else {
        $action = '';
    }

    if ($action == 'about') {
        include("./pages/main/about.php");
    }
    elseif ($action == 'blog') {
        include("./pages/main/blog.php");
    }
    elseif ($action == 'contact') {
        include("./pages/main/contact.php");
    }
    elseif ($action == 'cart') {
        include("./pages/main/cart.php");
    }
    elseif ($action == 'product_category') {
        include("./pages/main/product.php");
    }
    elseif ($action == 'product_detail'){
        include("./pages/main/product-detail.php");
    }
    elseif ($action == 'login'){
        include("./pages/main/login.php");
    }
    else {
        include("./pages/main/home.php");
    }
?>

<!-- start footer -->
<?php
include("./pages/base/footer.php");
?>
<!-- end footer -->