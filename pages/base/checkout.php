<?php
$account_id = $_SESSION['account_id'];
$sql_account = "SELECT * FROM account WHERE account_id = '" . $account_id . "'";
$query_account = mysqli_query($mysqli, $sql_account);
?>
<!-- start checkout -->
<section class="checkout pd-section">
    <div class="container">
        <form action="pages/handle/checkout.php" method="POST">
            <div class="row">
                <div class="col" style="--w-md:8;">
                    <h2 class="checkout__title h4 d-flex align-center space-between">Thông tin người nhận hàng:</h2>
                    <div class="checkout__infomation">
                        <?php
                        while ($account = mysqli_fetch_array($query_account)) {
                        ?>
                            <div class="info__item d-flex">
                                <label class="info__title" for="">Tên khách hàng:</label>
                                <input type="text" class="info__input flex-1" name="delivery_name" value="<?php echo $account['account_name'] ?>" required></input>
                            </div>
                            <div class="info__item d-flex">
                                <label class="info__title" for="">Địa chỉ:</label>
                                <input type="text" class="info__input flex-1" name="delivery_address" value="" placeholder="Nhập vào địa chỉ nhận hàng" required></input>
                            </div>
                            <div class="info__item d-flex">
                                <label class="info__title" for="">Số điện thoại:</label>
                                <input type="text" class="info__input flex-1" name="delivery_phone" value="<?php echo $account['account_phone'] ?>" required></input>
                            </div>
                            <div class="info__item d-flex">
                                <label class="info__title" for="delivery_note">Ghi chú:</label>
                                <input id="delivery_note" type="text" class="info__input flex-1" placeholder="Nhập vào ghi chú với người bán ..." name="delivery_note" value=""></input>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


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
                                    <div class="h6 checkout__price"><?php echo (number_format($cart_item['product_price'] - ($cart_item['product_price'] / 100 * $cart_item['product_sale']))) . ' ₫' ?></div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                        <div class="checkout__bottom d-flex align-center space-between">
                            <h4 class="h4">Tổng tiền phải thanh toán:</h4>
                            <span class="h4 checkout__total"><?php echo number_format((float) $total) . '₫' ?></span>
                        </div>

                        <div class="checkout__payment">
                            <label class="payment__title h4 d-block" for="order_type">Phương thức thanh toán:</label>
                            <div class="payment__item d-flex align-center">
                                <input class="form-check-input" type="radio" name="order_type" id="order_type1" value="0" checked>
                                <label class="form-check-label" for="order_type1">
                                    Tiền mặt
                                </label>
                            </div>
                            <div class="payment__item d-flex align-center">
                                <input class="form-check-input" type="radio" name="order_type" id="order_type2" value="1">
                                <label class="form-check-label" for="order_type2">
                                    Chuyển khoản
                                </label>
                            </div>
                            <div class="payment__item d-flex align-center">
                                <input class="form-check-input" type="radio" name="order_type" id="order_type3" value="2">
                                <img src="assets/images/payment/momo.png" width="30" height="30" alt="">
                                <label class="form-check-label" for="order_type3">
                                    MoMo
                                </label>
                            </div>
                            <div class="payment__item d-flex align-center">
                                <input class="form-check-input" type="radio" name="order_type" id="order_type4" value="3">
                                <img src="assets/images/payment/vnpay.png" width="30" height="30" alt="">
                                <label class="form-check-label" for="order_type4">
                                    VnPay
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 pd-top text-left">
                <button type="submit" name="redirect" class="btn btn__solid">Đặt hàng</button>
                <a href="index.php?page=cart" class="btn anchor">Trở về giỏ hàng</a>
            </div>
        </form>
    </div>
</section>
<!-- end checkout -->