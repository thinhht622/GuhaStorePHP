<?php
$product_id = $_GET['product_id'];
$sql_product_detail = "SELECT * FROM product JOIN capacity ON product.capacity_id = capacity.capacity_id WHERE product.product_id = '" . $_GET['product_id'] . "' LIMIT 1";
$query_product_detail = mysqli_query($mysqli, $sql_product_detail);
while ($row_product_detail = mysqli_fetch_array($query_product_detail)) {
?>

<div id="toast_message"></div>
    <!-- start product detail -->
    <div class="product-detail">
        <div class="product-detail__container background-default pd-section">
            <div class="container">
                <div class="row">
                    <div class="col p-relative" style="--w-md: 8">
                        <img class="p-absolute icon-zoom" src="./assets/images/icon/icon-zoom.svg" alt="" />
                        <div class="product-detail__media">
                            <div class="media__items d-flex">
                                <div class="media__item w-100">
                                    <img class="w-100" src="admin/modules/product/uploads/<?php echo $row_product_detail['product_image'] ?>" alt="image product" />
                                </div>
                            </div>
                        </div>
                        <div class="product-detail__slide-control d-flex justify-center md-none">
                            <div class="slide-control__slide p-relative">
                                <button class="slide-control__slide--prev cursor-pointer p-absolute">
                                    <img src="./assets/images/icon/chevron-left.svg" alt="sub" />
                                </button>
                                <input type="text" value="1/1" class="slide-control__slide--value heading-6 w-100 h-100" />
                                <button class="slide-control__slide--next cursor-pointer p-absolute">
                                    <img src="./assets/images/icon/chevron-right.svg" alt="sum" />
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col" style="--w-md: 4">
                        <div class="product-detail__info">
                            <form method="POST" action="pages/handle/addtocart.php?product_id=<?php echo $row_product_detail['product_id'] ?>">
                                <span class="h6">Mã sản phẩm: <?php echo $row_product_detail['product_id'] ?></span>
                                <h1 class="product-detail__name"><?php echo $row_product_detail['product_name'] ?></h1>
                                <div class="product-detail__price d-flex align-center">
                                    <?php
                                    if ($row_product_detail['product_sale'] > 0) {
                                    ?>
                                        <del class="product__price--old h5"><?php echo number_format($row_product_detail['product_price']) . ' ₫' ?></del>
                                    <?php
                                    }
                                    ?>

                                    <span class="product__price--new h4"><?php echo (number_format($row_product_detail['product_price'] - ($row_product_detail['product_price'] / 100 * $row_product_detail['product_sale']))) . ' ₫' ?></span>
                                    <?php
                                    if ($row_product_detail['product_sale'] > 0) {
                                    ?>
                                        <span class="product__sale h6"> - <?php echo $row_product_detail['product_sale'] ?>%</span>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="product-detail__variants">
                                    <div class="product-detail__variant">
                                        <h3 class="product-detail__variant--title h6">
                                            Dung tích
                                        </h3>
                                        <div class="product-detail__variant--items d-flex">
                                            <input class="custom-radio" type="radio" name="size" id="1" checked="checked" />
                                            <label class="custom-label product-detail__variant--item" for="1">
                                                <?php echo $row_product_detail['capacity_name'] ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-detail__quantity">
                                    <h3 class="quantity__heading h6">Số lượng</h3>
                                    <div class="d-flex align-center">
                                        <div class="select__number p-relative">
                                            <button type="button" class="select__number--minus cursor-pointer p-absolute" onclick="decreaseQuantity()">
                                                <img src="./assets/images/icon/minus.svg" alt="sub" />
                                            </button>
                                            <input type="text" name="product_quantity" min="1" value="1" class="select__number--value heading-6 w-100 h-100" />
                                            <button type="button" class="select__number--plus cursor-pointer p-absolute" onclick="increaseQuantity()">
                                                <img src="./assets/images/icon/plus.svg" alt="sum" />
                                            </button>
                                        </div>
                                        <span class="h6" style="margin-left: 10px;"><?php if ($row_product_detail['product_quantity'] > 0) { ?> còn <span class="quantity-total"> <?php echo $row_product_detail['product_quantity'] ?> </span> sản phẩm <?php } else { ?>Hiện sản phẩm đã hết hàng<?php } ?></span>
                                    </div>
                                </div>
                                <?php if ($row_product_detail['product_quantity'] > 0) { ?>
                                    <input class="btn product-detail__addtocart w-100" type="submit" name="addtocart" value="Thêm giỏ hàng" />

                                    <input class="btn product-detail__buynow w-100" type="submit" name="buynow" value="Mua ngay" />
                                <?php } else { ?>
                                    <a href="tel:+84878398141" class="btn product-detail__buynow w-100 text-center">Liên hệ</a>
                                <?php } ?>
                                <div class="product-detail__description">
                                    <?php echo $row_product_detail['product_description'] ?>
                                </div>
                            </form>
                            <div class="describe__item describe__item--share">
                                <a class="product-detail__anchor" href="#">
                                    <div class="d-flex align-center">
                                        <img class="describe-icon" src="./assets/images/icon/share.svg" alt="" />
                                        Chia sẻ
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end product detail -->
<?php
}
?>
<script>
    function showSuccessMessage() {
        toast({
            title: "Success",
            message: "Thêm sản phẩm vào giỏ hàng thành công",
            type: "success",
            duration: 3000,
        });
    }
    function showErrorMessage() {
        toast({
            title: "Error",
            message: "Không thể thêm sản phẩm vào trong giỏ hàng",
            type: "error",
            duration: 3000,
        });
    }
</script>
<?php
if (isset($_GET['message']) && $_GET['message'] == 'success') {
    echo '<script>';
    echo 'showSuccessMessage();';
    echo 'window.history.pushState(null, "", "index.php?page=product_detail&product_id='.$product_id.'");';
    echo '</script>';
} elseif (isset($_GET['message']) && $_GET['message'] == 'error') {
    echo '<script>';
    echo 'showErrorMessage();';
    echo 'window.history.pushState(null, "", "index.php?page=product_detail&product_id='.$product_id.'");';
    echo '</script>';
}
?>