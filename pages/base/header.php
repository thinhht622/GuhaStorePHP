<?php 
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    unset($_SESSION['account_email']);
    unset($_SESSION['account_id']);
    header('Location:index.php');
}
?>
<header class="header">
    <div class="header__topbar">
        <div class="container p-relative d-flex space-between align-center">
            <p class="h5">Miễn ship cho tất cả các đơn hàng khu vực hà nội</p>
            <?php if (isset($_SESSION['account_email'])) {
            ?>
                <a class="h5 login-btn p-absolute" href="index.php?logout=1">ĐĂNG XUẤT</a>
            <?php
            }
            else{
            ?>
                <a class="h5 login-btn p-absolute" href="index.php?page=login">ĐĂNG NHẬP</a>
            <?php
            } 
            ?>
        </div>
    </div>
    <div class="header__main">
        <div class="container">
            <div class="header__container d-grid middle-left">
                <!-- menu button -->
                <div class="header__btn md-none d-flex align-center">
                    <div class="navbar__icons">
                        <div class="navbar__icon"></div>
                    </div>
                </div>
                <div class="header__logo d-flex justify-center align-center">
                    <a href="index.php" class="d-inline-block">
                        <img class="d-block w-100 svg__icon" src="./assets/images/logo/logo.png" alt="Logo" />
                    </a>
                </div>
                <nav class="header__nav space-between d-flex">
                    <ul class="nav__list md-flex">
                        <li class="nav__item md-none">
                            <a href="#" class="nav__anchor" style="content: ''"></a>
                        </li>
                        <li class="nav__item nav__items h7">
                            <span class="nav__anchor p-relative h7 d-flex align-center space-between w-100 cursor-pointer" href="#">
                                Cửa hàng
                                <img class="md-none svg__icon" src="./assets/images/icon/icon-nextlink.svg" alt="next" />
                                <img class="d-none md-block svg__icon" src="./assets/images/icon/icon-chevron-down.svg" alt="back" style="margin-left: 8px" />
                            </span>
                            <ul class="header__subnav p-absolute">
                                <li class="nav__item md-none h5">
                                    <span class="nav__anchor cursor-pointer d-flex align-center" style="content: ''">
                                        <img class="md-none svg__icon" src="./assets/images/icon/arrow-left.svg" alt="" style="margin-right: 8px" />
                                        Cửa hàng
                                    </span>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__anchor h7 d-flex align-center space-between" href="index.php?page=product_category">
                                        Tất cả sản phẩm
                                    </a>
                                </li>
                                <?php
                                $sql_category_list = "SELECT * FROM category ORDER BY category_id DESC";
                                $query_category_list = mysqli_query($mysqli, $sql_category_list);
                                while ($row_category = mysqli_fetch_array($query_category_list)) {
                                ?>
                                    <li class="nav__item">
                                        <a class="nav__anchor h7 d-flex align-center space-between" href="index.php?page=product_category&category_id=<?php echo $row_category['category_id'] ?>">
                                            <?php echo $row_category['category_name'] ?>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </li>
                        <li class="nav__item">
                            <a class="nav__anchor h7 d-flex align-center space-between" href="index.php?page=about">
                                Giới thiệu
                            </a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__anchor h7 d-flex align-center space-between" href="index.php?page=blog">
                                Blog
                            </a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__anchor h7 d-flex align-center space-between" href="index.php?page=contact">
                                Liên hệ
                            </a>
                        </li>
                    </ul>
                    <div class="flex-1"></div>
                    <div class="header__footer md-none">
                        <div class="person-login d-flex align-center">
                            <img class="svg__icon" src="./assets/images/icon/icon-person.svg" alt="person" />
                            <span>Đăng nhập</span>
                        </div>
                        <ul class="social__items d-flex align-center">
                            <li class="social__item">
                                <a class="" href="#">
                                    <img class="svg__icon d-block" src="./assets/images/icon/twitter.svg" alt="" />
                                </a>
                            </li>
                            <li class="social__item">
                                <a class="" href="#">
                                    <img class="svg__icon d-block" src="./assets/images/icon/facebook.svg" alt="" />
                                </a>
                            </li>
                            <li class="social__item">
                                <a class="" href="#">
                                    <img class="svg__icon d-block" src="./assets/images/icon/instagram.svg" alt="" />
                                </a>
                            </li>
                            <li class="social__item">
                                <a class="" href="#">
                                    <img class="svg__icon d-block" src="./assets/images/icon/tiktok.svg" alt="" />
                                </a>
                            </li>
                            <li class="social__item">
                                <a class="" href="#">
                                    <img class="svg__icon d-block" src="./assets/images/icon/youtube.svg" alt="" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="header__action d-flex align-center">
                    <div class="header__action--item d-flex align-center p-relative">
                        <form action="index.php?page=search" method="POST" class="d-flex align-center" id="search-box">
                            <input type="text" placeholder="Tìm kiếm sản phẩm ..." name="keyword" class="search__input" required>
                            <button type="submit"  name="search" class="header__action--link search-btn p-absolute d-inline-block">
                                <img class="action__icon svg__icon d-block" src="./assets/images/icon/icon-search.svg" alt="search" />
                            </button>
                            <button class="header__action--link voice-btn p-absolute d-inline-block">
                                <img class="action__icon svg__icon d-block" src="./assets/images/icon/voice-icon.png" alt="search" />
                            </button>
                        </form>
                    </div>
                    <div class="header__action--item align-center d-none md-flex">
                        <a class="header__action--link d-inline-block" href="<?php if (isset($_SESSION['account_email'])) { echo "index.php?page=my_account&tab=account_info";} else { echo "index.php?page=login"; } ?>">
                            <img class="action__icon svg__icon d-block" src="./assets/images/icon/icon-person.svg" alt="person" />
                        </a>
                    </div>
                    <div class="header__action--item d-flex align-center">
                        <a class="header__action--link d-inline-block" href="index.php?page=cart">
                            <?php
                            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                            ?>
                                <div class="icon-cart d-flex align-center justify-center p-relative">
                                    <img class="action__icon svg__icon d-block" src="./assets/images/icon/cart-open.svg" alt="cart">
                                    <span class="cart-count p-absolute d-flex align-center justify-center h6"><?php echo count($_SESSION['cart']) ?></span>
                                </div>
                            <?php
                            } else {
                            ?>
                                <img class="action__icon svg__icon d-block" src="./assets/images/icon/icon-cart.svg" alt="cart">
                            <?php
                            }
                            ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-nav-overlay"></div>
    </div>
</header>