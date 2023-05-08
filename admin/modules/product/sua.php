<?php
$sql_product_edit = "SELECT * FROM product JOIN category ON product.product_category = category.category_id WHERE product_id = '$_GET[product_id]' LIMIT 1";
$query_product_edit = mysqli_query($mysqli, $sql_product_edit);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Sửa sản phẩm
        </h3>
        <a href="index.php?action=product&query=product_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<?php while ($row = mysqli_fetch_array($query_product_edit)) {
?>
    <form method="POST" action="modules/product/xuly.php?product_id=<?php echo $row['product_id'] ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="d-block form-control" value="<?php echo $row['product_name'] ?>" placeholder="product name">
                        </div>

                        <div class="input-item form-group">
                            <label for="title" class="d-block">Giá nhập vào sản phẩm</label>
                            <input class="d-block form-control" name="product_price_import" type="text" value="<?php echo $row['product_price_import'] ?>" placeholder="product price inport">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Giá bán ra sản phẩm</label>
                            <input class="d-block form-control" name="product_price" type="text" value="<?php echo $row['product_price'] ?>" placeholder="product price">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Sale (%)</label>
                            <input class="d-block form-control" name="product_sale" type="number" value="<?php echo $row['product_sale'] ?>" placeholder="product sale">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Mô tả danh mục</label>
                            <textarea class="d-block form-control" cols="30" rows="10" name="product_description" type="text" value="" placeholder="product description" style="height: auto;"><?php echo $row['product_description'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="input-item form-group">
                            <label for="image" class="">Image</label>
                            <img src="modules/product/uploads/<?php echo $row['product_image'] ?>" class="product__image w-100 h-100" style="width: 100px; height: 100px;" alt="image">
                            <input type="file" name="product_image" value="<?php echo $row['product_image'] ?>">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Trạng thái</label>
                            <select name="product_status" id="product_status" class="form-control">
                                <option value="1" <?php if ($row['product_status'] == 1) {
                                                        echo "selected";
                                                    } ?>>Bán ra sản phẩm</option>
                                <option value="0" <?php if ($row['product_status'] == 0) {
                                                        echo "selected";
                                                    } ?>>Tạm dừng bán</option>
                            </select>
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Danh mục sản phẩm</label>
                            <select name="product_category" id="product_category" class="form-control">
                                <?php
                                $sql_category_list = "SELECT * FROM category ORDER BY category_id DESC";
                                $query_category_list = mysqli_query($mysqli, $sql_category_list);
                                while ($row_category = mysqli_fetch_array($query_category_list)) {
                                    if ($row['category_id'] == $row_category['category_id']) {
                                ?>
                                        <option value="<?php echo $row_category['category_id'] ?>" selected><?php echo $row_category['category_name'] ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name'] ?></option>

                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100" style="float: left;">
            <button type="submit" name="product_edit" class="btn btn-primary btn-icon-text">
                <i class="ti-file btn-icon-prepend"></i>
                Sửa
            </button>
        </div>
    </form>
<?php
}
?>