<?php
$sql_product_list = "SELECT * FROM product ORDER BY product_id DESC LIMIT 8";
$query_product_list = mysqli_query($mysqli, $sql_product_list);
?>
<div class="product-list">
    <div class="container pd-section">
        <div class="row">
            <div class="col">
                <div class="product__title">
                    <h2 class="h2">Product list</h2>
                    <p class="h9">Mô tả về danh sách bán hàng này</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
                while ($row = mysqli_fetch_array($query_product_list))
                {
            ?>
            <div class="col" style="--w: 6; --w-md: 3">
                <div class="product__card d-flex flex-column">
                    <div class="product__image p-relative">
                        <a href="index.php?page=product_detail&product_id=<?php echo $row['product_id'] ?>">
                            <img class="w-100 h-100 object-fit-cover" src="admin/modules/product/uploads/<?php echo $row['product_image'] ?>" alt="product image" />
                        </a>
                        <span class="product__sale h6 p-absolute"> Sale </span>
                    </div>
                    <div class="product__info">
                        <a href="index.php?page=product_detail&product_id=<?php echo $row['product_id'] ?>">
                            <h3 class="product__name h5"><?php echo $row['product_name'] ?></h3>
                        </a>
                        <a href="index.php?page=product_detail&product_id=<?php echo $row['product_id'] ?>">
                            <div class="product__price align-center">
                                <del class="product__price--old h5"><?php echo number_format($row['product_price']).' ₫' ?></del>
                                <span class="product__price--new h4"><?php echo (number_format($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale']))).' ₫' ?></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-center pd-top">
                    <a class="btn btn__view--all btn__outline" href="index.php?page=product_category">View all</a>
                </div>
            </div>
        </div>
    </div>
</div>