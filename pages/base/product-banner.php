<?php
if (isset($_GET['category_id'])) {
    $sql_category = "SELECT * FROM category WHERE category_id = '" . $_GET['category_id'] . "' LIMIT 1";
    $query_category = mysqli_query($mysqli, $sql_category);
}

?>
<div class="product__banner pd-top">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product__title d-flex align-center">
                    <?php
                    if (isset($_GET['category_id'])) {
                        while ($row = mysqli_fetch_array($query_category)) {
                    ?>
                            <h2 class="h2"><?php echo $row['category_name'] ?></h2>
                        <?php
                        }
                    } else {
                        ?>
                        <h2 class="h2">Sản phẩm của cửa hàng</h2>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>