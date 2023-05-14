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
                    <table class="table table-hover table-action">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="checkbox" id="checkAll">
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
                                        <a href="?action=account&query=account_edit&account_id=<?php echo $row['account_id'] ?>">
                                            <div class="icon-edit">
                                                <img class="w-100 h-100" src="images/icon-edit.png" alt="">
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $row['account_id'] ?>">
                                    </td>
                                    <td><?php echo $row['account_name'] ?></td>
                                    <td><?php echo $row['account_email'] ?></td>
                                    <td><?php echo format_account_type($row['account_type']) ?></td>
                                    <td><?php echo format_account_status($row['account_status']) ?></td>
                                    <td>
                                        <a href="modules/account/xuly.php?account_id=<?php echo $row['account_id'] ?>">Delete</a>
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
        <a href="" class="button__control" id="btnDelete">Tạm khóa</a>
        <a href="" class="button__control" id="btnEdit">Sửa</a>
    </div>
</div>
<script>
    var url;
    var btnDelete = document.getElementById("btnDelete");
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
        testChecked();
        getCheckedCheckboxes();
    });

    function testChecked() {
        var count = 0;
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                count++;
                console.log(count);
            }
        }
        if (count > 0) {
            dialogControl.classList.add('active');
        } else {
            dialogControl.classList.remove('active');
            checkAll.checked = false;
        }
    }

    function getCheckedCheckboxes() {
        var checkeds = document.querySelectorAll('.checkbox:checked');
        var checkedIds = [];
        for (var i = 0; i < checkeds.length; i++) {
            checkedIds.push(checkeds[i].id);
        }
        btnDelete.href = "modules/product/xuly.php?data="+ JSON.stringify(checkedIds);
    }
</script>