<!-- start cart -->
<?php 
    // unset($_SESSION['account_email']);
?>
<section class="cart pd-section">
    <div class="container">
        <div class="cart__header d-flex space-between align-center">
            <h1 class="h2">Giỏ hàng của bạn</h1>
            <a class="h4" href="index.php?page=product_category">Quay lại cửa hàng</a>
        </div>
        <?php
        if (isset($_SESSION['cart'])) {
            $total = 0;
        ?>
            <div class="cart__container">
                <div class="cart__heading">
                    <div class="cart__item d-grid">
                        <div class="cart__image">
                            <span class="h6">TÊN SẢN PHẨM</span>
                        </div>
                        <div class="cart__title"></div>
                        <div class="cart__quantity">
                            <span class="d-none lg-initital">Số lượng</span>
                        </div>
                        <div class="cart__total">
                            <span class="h6">GIÁ TIỀN</span>
                        </div>
                    </div>
                </div>
                <div class="cart__content">
                    <?php
                        foreach($_SESSION['cart'] as $cart_item)
                        {
                            $total += ($cart_item['product_price'] - ($cart_item['product_price'] / 100 * $cart_item['product_sale'])) * $cart_item['product_quantity'];
                    ?>
                    <div class="cart__item d-grid">
                        <div class="cart__image">
                            <img class="w-100" src="admin/modules/product/uploads/<?php echo $cart_item['product_image'] ?>" alt="product" />
                        </div>
                        <div class="cart__title">
                            <h3 class="cart__name h4"><?php echo $cart_item['product_name'] ?></h3>
                            <span class="cart__color"><?php echo "Dung tích" ?></span>
                        </div>
                        <div class="cart__quantity">
                            <div class="cart__quantity--container d-flex align-center">
                                <div class="select__number p-relative">
                                    <a href="pages/handle/addtocart.php?div=<?php echo $cart_item['product_id'] ?>" class="select__number--minus cursor-pointer p-absolute d-flex align-center justify-center">
                                        <img src="./assets/images/icon/minus.svg" alt="" />
                                    </a>
                                    <input type="text" value="<?php echo $cart_item['product_quantity'] ?>" class="select__number--value heading-6 w-100 h-100" />
                                    <a href="pages/handle/addtocart.php?sum=<?php echo $cart_item['product_id'] ?>" class="select__number--plus cursor-pointer p-absolute d-flex align-center justify-center">
                                        <img src="./assets/images/icon/plus.svg" alt="" />
                                    </a>
                                </div>
                                <div class="cart__delete cursor-pointer d-flex align-center justify-center">
                                    <a href="pages/handle/addtocart.php?delete=<?php echo $cart_item['product_id'] ?>">
                                        <img src="./assets/images/icon/delete.svg" alt="delete" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="cart__total h4"><?php echo (number_format($cart_item['product_price'] - ($cart_item['product_price'] / 100 * $cart_item['product_sale']))).' ₫' ?></div>
                    </div>
                    <?php
                        } 
                    ?>
                </div>
            </div>
            <div class="cart__footer w-100 h-100">
                <div class="cart__footer--total h4">
                    Tổng tiền: <?php echo number_format((float) $total).'₫' ?>
                </div>
                <p class="cart__footer--context">
                    Thuế và phí vận chuyển được tính khi thanh toán
                </p>
                <?php
                    if (isset($_SESSION['account_email'])) {
                ?>
                        <a href="index.php?page=checkout" class="btn cart__btn btn__solid text-center">Đặt hàng</a>
                <?php } 
                else 
                {
                ?>
                    <a href="index.php?page=login"><button class="btn cart__btn btn__outline">Đăng nhập đặt hàng</button></a>
                <?php
                    } 
                ?>
                
            </div>
        <?php
        } else {
        ?>
            <p>Hiện không có sản phẩm nào trong giỏ hàng </p>
        <?php
        }
        ?>
    </div>
</section>
<!-- end cart -->