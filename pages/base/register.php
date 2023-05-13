<?php
if (isset($_POST['register'])) {
    $account_name = $_POST['account_name'];
    $account_email = $_POST['account_email'];
    $account_password = md5($_POST['account_password']);

    $sql_getacc = "SELECT * FROM account WHERE account_email = '" . $account_email . "'";
    $query_getacc = mysqli_query($mysqli, $sql_getacc);
    $count = mysqli_num_rows($query_getacc);

    if ($count == 0) {
        $sql_resgister = "INSERT INTO account(account_name, account_email, account_password, account_type) VALUE('" . $account_name . "', '" . $account_email . "', '" . $account_password . "', 0)";
        $query_register = mysqli_query($mysqli, $sql_resgister);
        if ($query_register) {
            echo '<script>alert("Đăng ký thành công");</script>';
            // header('Location:index.php?page=login');
        }
    }
    else {
        echo '<script>alert("Email đã sử dụng vui lòng nhập lại email khác");</script>';
    }


    
}
?>
<section class="login pd-section">
    <div class="form-box">
        <div class="form-value">
            <form action="" autocomplete="on" method="POST">
                <h2 class="login-title">Đăng ký</h2>
                <div class="inputbox">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="account_name" required>
                    <label for="">Tên</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="account_email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="account_password" required>
                    <label for="">Password</label>
                </div>
                <button type="submit" name="register">Đăng ký</button>
                <div class="register">
                    <p>Đã có tài khoản <a href="index.php?page=login">Đăng nhập</a></p>
                </div>
            </form>
        </div>
    </div>
</section>