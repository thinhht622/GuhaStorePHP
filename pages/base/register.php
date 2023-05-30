<?php
if (isset($_POST['register'])) {
    $account_name = $_POST['account_name'];
    $customer_address = $_POST['customer_address'];
    $account_phone = $_POST['account_phone'];
    $account_email = $_POST['account_email'];
    $account_password = md5($_POST['account_password']);
    if (isset($_POST['account_gender'])) {
        $account_gender = $_POST['account_gender'];
    } else {
        $account_gender = 0;
    }

    $sql_getacc = "SELECT * FROM account WHERE account_email = '" . $account_email . "'";
    $query_getacc = mysqli_query($mysqli, $sql_getacc);
    $count = mysqli_num_rows($query_getacc);

    if ($count == 0) {
        $sql_resgister = "INSERT INTO account(account_name, account_email, account_password, account_type) VALUE('" . $account_name . "', '" . $account_email . "', '" . $account_password . "', 0)";
        $query_register = mysqli_query($mysqli, $sql_resgister);
        
        $sql_account = "SELECT * FROM account WHERE account_email = '$account_email'";
        $get_register = mysqli_query($mysqli, $sql_account);
        
        $account = mysqli_fetch_array($get_register);

        $sql_customer = "INSERT INTO customer(account_id, customer_name, customer_gender, customer_email, customer_phone, customer_address) VALUE('" . $account['account_id'] . "','" . $account_name . "', '" . $account_gender . "', '" . $account_email . "', '" . $account_phone . "', '" . $customer_address . "')";
        $query_customer = mysqli_query($mysqli, $sql_customer);
        if ($query_register) {
            echo '<script>alert("Đăng ký thành công");</script>';
            header('Location:index.php?page=login');
        }
    } else {
        echo '<script>alert("Email đã sử dụng vui lòng nhập lại email khác");</script>';
    }
}
?>
<script src="./assets/js/form_register.js"></script>
<section class="register pd-bottom">
    <div class="container">
        <div class="w-100 text-center p-relative">
            <div class="title">Đăng ký tài khoản</div>
            <div class="title-line"></div>
        </div>
        <div class="content">
            <form class="register__form" action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Họ Tên</span>
                        <input class="input-form" onchange="getInputChange();" type="text" name="account_name" placeholder="Nhập vào tên của bạn" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Địa chỉ</span>
                        <input class="input-form" onchange="getInputChange();" type="text" name="customer_address" placeholder="Nhập vào địa chỉ của bạn" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input class="input-form" onchange="getInputChange();" type="email" name="account_email" placeholder="Nhập vào địa chỉ email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Số điện thoại</span>
                        <input class="input-form" onchange="getInputChange();" type="text" name="account_phone" placeholder="Nhập vào số điện thoại" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Mật khẩu</span>
                        <input class="input-form" onchange="getInputChange();" type="text" name="account_password" placeholder="Nhập vào mật khẩu" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Nhập lại mật khẩu</span>
                        <input class="input-form" onchange="getInputChange();" type="text" name="account_password_confirn" placeholder="Nhập lại mật khẩu" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="account_gender" value="0" id="dot-1" checked>
                    <input type="radio" name="account_gender" value="1" id="dot-2">
                    <input type="radio" name="account_gender" value="2" id="dot-3">
                    <span class="gender-title">Giới tính</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Không xác định</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Nam</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Nữ</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="register" value="Đăng ký">
                </div>
            </form>
            <div class="w-100 text-center">
                <p class="h4">Đã có tài khoản <a class="text-login" href="index.php?page=login">Đăng nhập</a></p>
            </div>
        </div>
    </div>
</section>
