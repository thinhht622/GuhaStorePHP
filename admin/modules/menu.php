<?php 
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    else {
        $action = "-1";
    }

    if (isset($_GET['query'])) {
        $query = $_GET['query'];
    }
    else {
        $query = "-1";
    }
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item <?php if ($action === 'order') { echo "active"; } ?>">
            <a class="nav-link" data-bs-toggle="collapse" href="#orders" aria-expanded="<?php if ($action === 'order') { echo "true"; } else { echo "false"; } ?>" aria-controls="orders">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Đơn hàng</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?php if ($action === 'order') { echo "show"; } ?>" id="orders">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="index.php?action=order&query=order">Đang xử lý</a></li>
                    <li class="nav-item"> <a class="nav-link" href="index.php?action=order&query=order">Đã hoàn thành</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item <?php if ($action === 'product' or $action === 'category') { echo "active"; } ?>">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="<?php if ($action === 'product' or $action === 'category') { echo "true"; } else { echo "false"; } ?>" aria-controls="products">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Sản phẩm</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse <?php if ($action === 'product' or $action === 'category') { echo "show"; } ?>" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item <?php if ($query === 'product_list') { echo "active"; } ?>"> <a class="nav-link" href="index.php?action=product&query=product_list">Danh sách sản phẩm</a></li>
                    <li class="nav-item <?php if ($query === 'category_list') { echo "active"; } ?>"> <a class="nav-link" href="index.php?action=category&query=category_list">Danh mục sản phẩm</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Hàng tồn kho</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Thẻ quà tặng</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=customer&query=customer_list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Khách hàng</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=account&query=account_list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Tài khoản</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=blog&query=blog_list">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Bài viết</span>
            </a>
        </li>
    </ul>
</nav>