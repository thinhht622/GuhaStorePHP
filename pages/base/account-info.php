<?php
$account_id = $_SESSION['account_id'];
$sql_account = "SELECT * FROM account WHERE account_id = '" . $account_id . "'";
$query_account = mysqli_query($mysqli, $sql_account);
?>
<div class="my-account__content">
    <h2 class="my-account__title d-flex space-between h3">
        Thông tin tài khoản<a href="index.php?page=my_account&tab=account_settings" class="btn">Thay đổi</a>
    </h2>
    <div class="checkout__infomation">
        <?php
        while ($account = mysqli_fetch_array($query_account)) {
        ?>
            <div class="info__item d-flex">
                <label class="info__title" for="">Tên khách hàng:</label>
                <span class="info__content flex-1"><?php echo $account['account_name'] ?></span>
            </div>
            <div class="info__item d-flex">
                <label class="info__title" for="">Email:</label>
                <span class="info__content flex-1"><?php echo $account['account_email'] ?></span>
            </div>
            <div class="info__item d-flex">
                <label class="info__title" for="">Số điện thoại:</label>
                <span class="info__content flex-1"><?php echo $account['account_phone'] ?></span>
            </div>
        <?php
        }
        ?>
    </div>
</div>