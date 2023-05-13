<?php
$sql_account_list = "SELECT * FROM account ORDER BY account_id DESC";
$query_account_list = mysqli_query($mysqli, $sql_account_list);
?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center">
                    <h4 class="card-title" style="margin: 0;">Danh sách tài khoản</h4>
                    <div class="input__search p-relative">
                        <form class="search-form" action="#">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                    <a href="?action=account&query=account_add" class="btn btn-outline-dark btn-fw">Thêm tài khoản</a>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <label class="container" onclick="testChecked();">
                                        <input type="checkbox" id="checkAll">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Loại tài khoản</th>
                                <th>Tình trạng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($query_account_list)) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                    <label class="container" id="checkAll" onclick="testChecked();">
                                        <input type="checkbox" class="checkbox" id="<?php echo $row['account_id'] ?>">
                                        <span class="checkmark"></span>
                                    </label>
                                    </td>
                                    <td><?php echo $row['account_name'] ?></td>
                                    <td><?php echo $row['account_email'] ?></td>
                                    <td><?php echo $row['account_type'] ?></td>
                                    <td><?php echo $row['account_status'] ?></td>
                                    <td>
                                        <a href="modules/account/xuly.php?account_id=<?php echo $row['account_id'] ?>">Delete</a>
                                        <a href="?action=account&query=account_edit&account_id=<?php echo $row['account_id'] ?>">Edit</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dialog__control">
    <div class="control__box">
        <a class="button__control" id="btnDelete">Xóa</a>
        <a class="button__control" id="btnEdit">Sửa</a>
    </div>
</div>
<script>
    var checkAll = document.getElementById("checkAll");
    var checkboxes = document.getElementsByClassName("checkbox");
    var dialogControl = document.querySelector('.dialog__control');
    // Thêm sự kiện click cho checkbox checkAll
    checkAll.addEventListener("click", function() {
        // Nếu checkbox checkAll được chọn
        if (checkAll.checked) {
            // Đặt thuộc tính "checked" cho tất cả các checkbox còn lại
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        } else {
            // Bỏ thuộc tính "checked" cho tất cả các checkbox còn lại
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        }
    });

    console.log(checkboxes[0]);

    function testChecked() {
        var count = 0;
        for (let i = 0; i < checkboxes.length; i++) {
            if(checkboxes[i].checked)
            {
                count++;
                console.log(count);
            }
        }
        if (count > 0) {
            dialogControl.classList.add('active');
        }
        else {
            dialogControl.classList.remove('active');
        }
    }
</script>