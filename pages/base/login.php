<?php
    if (isset($_POST['login'])) {
        $account_email = $_POST['account_email'];
        $account_password = md5($_POST['account_password']);
        $sql_account = "SELECT * FROM account WHERE account_email='".$account_email."' AND account_password='".$account_password."'";
        $query_account = mysqli_query($mysqli, $sql_account);
        $count = mysqli_num_rows($query_account);
        if ($count>0) {
            $_SESSION['login'] = $account_email;
            header('Location:index.php');
        }else {
            echo '<script>alert("Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại");</script>';
        }
    }
?>
<section class="login pd-section">
    <div class="form-box">
        <div class="form-value">
            <form action="" autocomplete="on" method="POST">
                <h2 class="login-title">Đăng nhập</h2>
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
                <div class="forget">
                    <label for=""><input type="checkbox">Remember Me <a href="#">Forget Password</a></label>

                </div>
                <button type="submit" name="login">Đăng nhập</button>
                <div class="register">
                    <p>Chưa có tài khoản <a href="#">Đăng ký</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
