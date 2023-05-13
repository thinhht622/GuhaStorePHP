<?php
$sql_account_edit = "SELECT * FROM account WHERE account_id = '$_GET[account_id]' LIMIT 1";
$query_account_edit = mysqli_query($mysqli, $sql_account_edit);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Sửa đổi thông tin tài khoản
        </h3>
        <a href="index.php?action=account&query=account_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="modules/account/xuly.php?account_id=<?php echo $_GET['account_id'] ?>">
                    <?php
                    while ($item = mysqli_fetch_array($query_account_edit)) {
                    ?>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tên danh mục</label>
                            <input type="text" name="account_name" class="form-control" value="<?php echo $item['account_name'] ?>" placeholder="collection name">
                        </div>
                        <div class="input-item form-group">
                            <label for="keyword" class="d-block">Từ khóa phân loại</label>
                            <input type="text" name="account_keyword" id="keyword" class="form-control" value="<?php echo $item['account_keyword'] ?>" placeholder="keyword">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Mô tả danh mục</label>
                            <textarea class="form-control" name="account_description" type="text" value="" placeholder="collection name" style="height: auto;"><?php echo $item['account_description'] ?></textarea>
                        </div>
                        <div class="input-item form-group">
                            <label for="image" class="d-block">Image</label>
                            <input type="file" name="account_image" value="<?php echo $row['account_image'] ?>">
                            <img src="modules/account/uploads/<?php echo $item['account_image'] ?>" class="account_image" style="width: 100px; height: 100px;" alt="image">
                        </div>
                        <button type="submit" name="account_edit" class="btn btn-primary btn-icon-text">
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