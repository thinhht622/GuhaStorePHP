<?php
$account_id = $_SESSION['account_id'];
$sql_account = "SELECT * FROM account WHERE account_id = '" . $account_id . "'";
$query_account = mysqli_query($mysqli, $sql_account);
?>
<div class="my-account__content">
    <h2 class="my-account__title d-flex space-between h3">
        Sửa đổi thông tin tài khoản
    </h2>
    <form action="pages/handle/account-settings.php" method="POST">
        <div class="checkout__infomation">

            <?php
            while ($account = mysqli_fetch_array($query_account)) {
            ?>
                <div class="info__item d-flex">
                    <label class="info__title" for="">Tên khách hàng:</label>
                    <input class="info__content flex-1" name="account_name" value="<?php echo $account['account_name'] ?>">
                </div>
                <div class="info__item d-flex">
                    <label class="info__title" for="">Email:</label>
                    <input class="info__content flex-1" name="account_email" value="<?php echo $account['account_email'] ?>" disabled>
                </div>
                <div class="info__item d-flex">
                    <label class="info__title" for="">Số điện thoại:</label>
                    <input class="info__content flex-1" name="account_phone" value="<?php echo $account['account_phone'] ?>">
                </div>
            <?php
            }
            ?>
        </div>
        <button type="submit" name="info_change" class="btn btn__solid">Lưu thay đổi</button>
        <a href="index.php?page=password_change" class="btn btn__outline">Đổi mật khẩu</a>
    </form>
</div>