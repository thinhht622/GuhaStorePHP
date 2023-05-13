<?php
$sql_account_edit = "SELECT * FROM account WHERE account_email = '" . $_SESSION['login'] . "' LIMIT 1";
$query_account_edit = mysqli_query($mysqli, $sql_account_edit);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thông tin tài khoản
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
                <?php
                while ($row = mysqli_fetch_array($query_account_edit)) {
                ?>
                    <form method="POST" action="modules/account/xuly.php?account_id=<?php echo $row['account_id'] ?>">
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tên tài khoản</label>
                            <input type="text" name="account_name" class="form-control" value="<?php echo $row['account_name'] ?>">
                        </div>
                        <div class="input-item form-group">
                            <label for="keyword" class="d-block">Email đăng nhập</label>
                            <input type="text" name="account_keyword" id="keyword" class="form-control" value="<?php echo $row['account_email'] ?>" readonly>
                        </div>
                        <div class="input-item form-group">
                            <label for="keyword" class="d-block">Số điện thoại</label>
                            <input type="text" name="account_keyword" id="keyword" class="form-control" value="<?php echo $row['account_phone'] ?>">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Địa chỉ</label>
                            <textarea class="form-control" name="account_description" type="text" value="" style="height: auto;"><?php echo $row['account_address'] ?></textarea>
                        </div>
                        <button type="submit" name="account_edit" class="btn btn-primary btn-icon-text">
                            <i class="ti-file btn-icon-prepend"></i>
                            Lưu
                        </button>
                        <a href="index.php?action=account&query=password_change" class="btn btn-primary btn-icon-text">
                            <i class="ti-file btn-icon-prepend"></i>
                            Đổi mật khẩu
                        </a>

                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>