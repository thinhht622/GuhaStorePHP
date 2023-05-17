<section class="login pd-section">
    <div class="form-box">
        <div class="form-value">
            <form action="pages/handle/login.php" autocomplete="on" method="POST">
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
                    <p>Chưa có tài khoản <a href="index.php?page=register">Đăng ký</a></p>
                </div>
            </form>
        </div>
    </div>
</section>
