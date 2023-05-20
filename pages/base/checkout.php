<?php
$account_id = $_SESSION['account_id'];
$sql_account = "SELECT * FROM account WHERE account_id = '" . $account_id . "'";
$query_account = mysqli_query($mysqli, $sql_account);
?>
<!-- start checkout -->
<section class="checkout pd-section">
    <div class="container">
        <div class="row">
            <div class="col" style="--w-md:8;">
                <h2 class="checkout__title h4 d-flex align-center space-between">Thông tin khách hàng <a href="index.php?page=my_account&tab=account_settings" class="btn">Thay đổi</a></h2>

                <form action="pages/handle/checkout.php" method="POST">
                    <div class="checkout__infomation">
                        <?php
                        while ($account = mysqli_fetch_array($query_account)) {
                        ?>
                            <div class="info__item d-flex">
                                <label class="info__title" for="">Tên khách hàng:</label>
                                <input type="text" class="info__input flex-1" name="account_name" value="<?php echo $account['account_name'] ?>" readonly></input>
                            </div>
                            <div class="info__item d-flex">
                                <label class="info__title" for="">Địa chỉ:</label>
                                <input type="text" class="info__input flex-1" name="account_address" value="" placeholder="Nhập vào địa chỉ nhận hàng"></input>
                            </div>
                            <div class="info__item d-flex">
                                <label class="info__title" for="">Số điện thoại:</label>
                                <input type="text" class="info__input flex-1" name="account_phone" value="<?php echo $account['account_phone'] ?>"></input>

                            </div>
                            <div class="info__item d-flex">
                                <label class="info__title" for="order_type">Phương thức:</label>
                                <select id="order_type" name="order_type">
                                    <option value="0">
                                        Thanh toán khi nhận hàng
                                    </option>
                                    <option value="1">
                                        Thanh toán trực tuyến
                                    </option>
                                </select>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <button type="submit" name="checkout" class="btn btn__solid">Tiến hành đặt hàng</button>
                    <a href="#" class="btn anchor">Trở về giỏ hàng</a>
                </form>
            </div>
            <div class="col" style="--w-md:4;">
                <div class="checkout__cart">
                    <div class="checkout__items">
                        <?php
                        $total = 0;
                        foreach ($_SESSION['cart'] as $cart_item) {
                            $total += ($cart_item['product_price'] - ($cart_item['product_price'] / 100 * $cart_item['product_sale'])) * $cart_item['product_quantity'];
                        ?>
                            <div class="checkout__item d-flex align-center">
                                <div class="checkout__image p-relative">
                                    <div class="product-quantity align-center d-flex justify-center p-absolute"><span class="h6"><?php echo $cart_item['product_quantity'] ?></span></div>
                                    <img class="w-100 d-block object-fit-cover ratio-1" src="admin/modules/product/uploads/<?php echo $cart_item['product_image'] ?>" alt="">
                                </div>
                                <div class="checkout__name flex-1">
                                    <h3 class="h6"><?php echo $cart_item['product_name'] ?></h3>
                                </div>
                                <div class="h6 checkout__price"><?php echo (number_format($cart_item['product_price'] - ($cart_item['product_price'] / 100 * $cart_item['product_sale']))).' ₫' ?></div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="checkout__bottom d-flex align-center space-between">
                        <h4 class="h4">Tổng tiền:</h4>
                        <span class="h4 checkout__total"><?php echo number_format((float) $total).'₫' ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end checkout -->