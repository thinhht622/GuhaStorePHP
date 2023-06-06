<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thêm sản phẩm
        </h3>
        <a href="index.php?action=product&query=product_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<form method="POST" action="modules/product/xuly.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Tên sản phẩm</label>
                        <input type="text" name="product_name" class="d-block form-control" value="" placeholder="product name">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Thương hiệu sản phẩm</label>
                        <select name="product_brand" id="product_brand" class="form-control select_brand">
                            <?php
                            $sql_brand_list = "SELECT * FROM brand ORDER BY brand_id DESC";
                            $query_brand_list = mysqli_query($mysqli, $sql_brand_list);
                            while ($row_brand = mysqli_fetch_array($query_brand_list)) {
                            ?>
                                <option value="<?php echo $row_brand['brand_id'] ?>"><?php echo $row_brand['brand_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Dung tích sản phẩm</label>
                        <select name="product_capacity" id="product_capacity" class="form-control select_capacity">
                            <?php
                            $sql_capacity_list = "SELECT * FROM capacity ORDER BY capacity_id ASC";
                            $query_capacity_list = mysqli_query($mysqli, $sql_capacity_list);
                            while ($row_capacity = mysqli_fetch_array($query_capacity_list)) {
                            ?>
                                <option value="<?php echo $row_capacity['capacity_id'] ?>"><?php echo $row_capacity['capacity_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Giá nhập vào sản phẩm</label>
                        <input class="d-block form-control" name="product_price_import" type="text" value="" placeholder="product price">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Giá bán ra sản phẩm</label>
                        <input class="d-block form-control" name="product_price" type="text" value="" placeholder="product price">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Mô tả sản phẩm</label>
                        <textarea class="d-block form-control" cols="30" rows="10" name="product_description" type="text" value="" placeholder="product description" style="height: auto;"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="main-pane-top">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="input-item form-group">
                        <label class="d-block" for="image">Image</label>
                        <input type="file" class="" name="product_image">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Sale (%)</label>
                        <input class="d-block form-control" name="product_sale" type="number" value="" placeholder="product sale">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Trang thái</label>
                        <select name="product_status" id="product_status" class="form-control">
                            <option value="1">Bán ra sản phẩm</option>
                            <option value="0">Tạm dừng bán</option>
                        </select>
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Danh mục sản phẩm</label>
                        <select name="product_category" id="product_category" class="form-control select_category">
                            <?php
                            $sql_category_list = "SELECT * FROM category ORDER BY category_id DESC";
                            $query_category_list = mysqli_query($mysqli, $sql_category_list);
                            while ($row_category = mysqli_fetch_array($query_category_list)) {
                            ?>
                                <option value="<?php echo $row_category['category_id'] ?>"><?php echo $row_category['category_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100" style="text-align: left;">
        <button type="submit" name="product_add" class="btn btn-primary btn-icon-text">
            <i class="ti-file btn-icon-prepend"></i>
            Thêm
        </button>
    </div>
</form>

<script>
    $('.select_brand').chosen();
    $('.select_capacity').chosen();
    $('.select_category').chosen();
</script>