<?php
$sql_product_detail = "SELECT * FROM product WHERE product_id = '".$_GET['product_id']."' LIMIT 1";
$query_product_detail = mysqli_query($mysqli, $sql_product_detail);
while ($row_product_detail = mysqli_fetch_array($query_product_detail)) {
?>

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
                    <div class="product-detail__slide-control d-flex justify-center">
                        <div class="slide-control__slide p-relative">
                            <button class="slide-control__slide--prev cursor-pointer p-absolute">
                                <img src="./assets/images/icon/chevron-left.svg" alt="sub" />
                            </button>
                            <input type="text" value="1/2" class="slide-control__slide--value heading-6 w-100 h-100" />
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
                                <del class="product__price--old h5"><?php echo number_format($row_product_detail['product_price']) . ' ₫' ?></del>
                                <span class="product__price--new h4"><?php echo (number_format($row_product_detail['product_price'] - ($row_product_detail['product_price'] / 100 * $row_product_detail['product_sale']))).' ₫' ?></span>
                                <span class="product__sale h6"> Sale </span>
                            </div>
                            <!-- <div class="product-detail__variants">
                                <div class="product-detail__variant">
                                    <h3 class="product-detail__variant--title h6">
                                        Dung tích
                                    </h3>
                                    <div class="product-detail__variant--items d-flex">
                                        <input class="custom-radio" type="radio" name="size" id="1" checked="checked" />
                                        <label class="custom-label product-detail__variant--item" for="1">
                                            100ml
                                        </label>
                                        <input class="custom-radio" type="radio" name="size" id="2" checked="checked" />
                                        <label class="custom-label product-detail__variant--item" for="2">
                                            200ml
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="product-detail__quantity">
                                <h3 class="quantity__heading h6">Số lượng</h3>
                                <div class="select__number p-relative">
                                    <button type="button" class="select__number--minus cursor-pointer p-absolute" onclick="decreaseQuantity()">
                                        <img src="./assets/images/icon/minus.svg" alt="sub" />
                                    </button>
                                    <input type="text" name="product_quantity" min="1" value="1" class="select__number--value heading-6 w-100 h-100" />
                                    <button type="button" class="select__number--plus cursor-pointer p-absolute" onclick="increaseQuantity()">
                                        <img src="./assets/images/icon/plus.svg" alt="sum" />
                                    </button>
                                </div>
                            </div>
                            <input class="btn product-detail__addtocart w-100" type="submit" name="addtocart" value="Thêm giỏ hàng" />

                            <input class="btn product-detail__buynow w-100" type="submit" name="buynow" value="Mua ngay" />

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