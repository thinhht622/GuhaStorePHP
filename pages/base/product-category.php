<?php
if (isset($_GET['pagenumber'])) {
    $page = $_GET['pagenumber'];
} else {
    $page = '';
}


if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 8) - 8;
}

if (isset($_GET['category_id'])) {
    $sql_product_list = "SELECT * FROM product JOIN category ON product.product_category = category.category_id WHERE product.product_category = '" . $_GET['category_id'] . "' ORDER BY product_id DESC LIMIT $begin,8";
    $query_product_list = mysqli_query($mysqli, $sql_product_list);
} else {
    $sql_product_list = "SELECT * FROM product ORDER BY product_id DESC LIMIT $begin,8";
    $query_product_list = mysqli_query($mysqli, $sql_product_list);
}
?>
<div class="product-list">
    <div class="container pd-section">
        <div class="row">
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query_product_list)) {
                $i++;
            ?>
                <div class="col" style="--w: 6; --w-md: 3">
                    <div class="product__card d-flex flex-column">
                        <div class="product__image p-relative">
                            <a href="index.php?page=product_detail&product_id=<?php echo $row['product_id'] ?>">
                                <img class="w-100 h-100 object-fit-cover" src="admin/modules/product/uploads/<?php echo $row['product_image'] ?>" alt="product image" />
                            </a>
                            <?php
                            if ($row['product_sale'] > 0) {
                            ?>
                                <span class="product__sale h6 p-absolute"> Sale <?php echo $row['product_sale'] ?>%</span>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="product__info">
                            <a href="index.php?page=product_detail&product_id=<?php echo $row['product_id'] ?>">
                                <h3 class="product__name h5"><?php echo $row['product_name'] ?></h3>
                            </a>
                            <a href="index.php?page=product_detail&product_id=<?php echo $row['product_id'] ?>">
                                <div class="product__price align-center">
                                    <del class="product__price--old h5"><?php echo number_format($row['product_price']) . ' ₫' ?></del>
                                    <span class="product__price--new h4"><?php echo (number_format($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale']))) . ' vnđ' ?></span>
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
                <div class="pagination">
                    <?php
                    if (isset($_GET['category_id'])) {
                        $query_pages = mysqli_query($mysqli, "SELECT * FROM product JOIN category ON product.product_category = category.category_id WHERE product_category = '" . $_GET['category_id'] . "' ORDER BY product_id DESC");
                    } else {
                        $query_pages = mysqli_query($mysqli, "SELECT * FROM product ORDER BY product_id DESC");
                    }
                    $row_count = mysqli_num_rows($query_pages);
                    $totalpage = ceil($row_count / 8);
                    ?>
                    <ul class="pagination__items d-flex align-center justify-center">
                        <li class="pagination__item">
                            <a class="d-flex align-center" href="#">
                                <img src="./assets/images/icon/arrow-left.svg" alt="">
                            </a>
                        </li>
                        <?php
                        $currentLink = $_SERVER['REQUEST_URI'];
                        for ($i = 1; $i <= $totalpage; $i++) {
                        ?>
                            <li class="pagination__item">
                                <a class="pagination__anchor <?php if ($page = $i) {
                                                                    echo "active";
                                                                } ?>" href="<?php echo $currentLink ?>&pagenumber=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="pagination__item">
                            <a class="d-flex align-center" href="#">
                                <img src="./assets/images/icon/icon-nextlink.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="text-center pd-top">
                    <a class="btn btn__view--all btn__outline" href="index.php?page=product_category">Xem tất cả</a>
                </div>
            </div>
        </div>
    </div>
</div>