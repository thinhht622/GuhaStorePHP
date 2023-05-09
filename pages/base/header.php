<header class="header">
    <div class="header__topbar">
        <div class="container text-center">
            <p class="h5">Free shipping available on all orders!</p>
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
                                Shop
                                <img class="md-none svg__icon" src="./assets/images/icon/icon-nextlink.svg" alt="next" />
                                <img class="d-none md-block svg__icon" src="./assets/images/icon/icon-chevron-down.svg" alt="back" style="margin-left: 8px" />
                            </span>
                            <ul class="header__subnav p-absolute">
                                <li class="nav__item md-none h5">
                                    <span class="nav__anchor cursor-pointer d-flex align-center" style="content: ''">
                                        <img class="md-none svg__icon" src="./assets/images/icon/arrow-left.svg" alt="" style="margin-right: 8px" />
                                        Shop
                                    </span>
                                </li>
                                <li class="nav__item">
                                    <a class="nav__anchor h7 d-flex align-center space-between" href="index.php?page=product_category">
                                        Shop all
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
                                About
                            </a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__anchor h7 d-flex align-center space-between" href="index.php?page=blog">
                                Blog
                            </a>
                        </li>
                        <li class="nav__item">
                            <a class="nav__anchor h7 d-flex align-center space-between" href="index.php?page=contact">
                                Contact
                            </a>
                        </li>
                    </ul>
                    <div class="flex-1"></div>
                    <div class="header__footer md-none">
                        <div class="person-login d-flex align-center">
                            <img class="svg__icon" src="./assets/images/icon/icon-person.svg" alt="person" />
                            <span>Log in</span>
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
                    <div class="header__action--item d-flex align-center">
                        <a class="header__action--link d-inline-block" href="#">
                            <img class="action__icon svg__icon d-block" src="./assets/images/icon/icon-search.svg" alt="search" />
                        </a>
                    </div>
                    <div class="header__action--item align-center d-none md-flex">
                        <a class="header__action--link d-inline-block" href="index.php?page=login">
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
                            }else
                            {
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