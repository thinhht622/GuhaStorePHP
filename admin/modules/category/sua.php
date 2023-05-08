<?php
$sql_category_edit = "SELECT * FROM category WHERE category_id = '$_GET[category_id]' LIMIT 1";
$query_category_edit = mysqli_query($mysqli, $sql_category_edit);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Sửa danh mục sản phẩm
        </h3>
        <a href="index.php?action=category&query=category_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="modules/category/xuly.php?category_id=<?php echo $_GET['category_id'] ?>">
                    <?php
                    while ($item = mysqli_fetch_array($query_category_edit)) {
                    ?>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tên danh mục</label>
                            <input type="text" name="category_name" class="form-control" value="<?php echo $item['category_name'] ?>" placeholder="collection name">
                        </div>
                        <div class="input-item form-group">
                            <label for="keyword" class="d-block">Từ khóa phân loại</label>
                            <input type="text" name="category_keyword" id="keyword" class="form-control" value="<?php echo $item['category_keyword'] ?>" placeholder="keyword">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Mô tả danh mục</label>
                            <textarea class="form-control" name="category_description" type="text" value="" placeholder="collection name" style="height: auto;"><?php echo $item['category_description'] ?></textarea>
                        </div>
                        <div class="input-item form-group">
                            <label for="image" class="d-block">Image</label>
                            <input type="file" name="category_image" value="<?php echo $row['category_image'] ?>">
                            <img src="modules/category/uploads/<?php echo $item['category_image'] ?>" class="category_image" style="width: 100px; height: 100px;" alt="image">
                        </div>
                        <button type="submit" name="category_edit" class="btn btn-primary btn-icon-text">
                            <i class="ti-file btn-icon-prepend"></i>
                            Sửa
                        </button>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>