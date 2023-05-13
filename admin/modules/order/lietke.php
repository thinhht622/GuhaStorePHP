<?php
$sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id ORDER BY orders.order_id DESC";
$query_order_list = mysqli_query($mysqli, $sql_order_list);
?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center">
                    <h4 class="card-title" style="margin: 0;">Danh sách đơn hàng</h4>
                    <div class="input__search p-relative">
                        <form class="search-form" action="#">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                    <a href="?action=order&query=order_add" class="btn btn-outline-dark btn-fw">Thêm đơn hàng</a>
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
                                <th>Mã đơn hàng</th>
                                <th>Thời gian</th>
                                <th>Tên người đặt</th>
                                <th>Loại đơn hàng</th>
                                <th>Tình trạng đơn hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($query_order_list)) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                    <label class="container" id="checkAll" onclick="testChecked();">
                                        <input type="checkbox" class="checkbox" id="<?php echo $row['order_id'] ?>">
                                        <span class="checkmark"></span>
                                    </label>
                                    </td>
                                    <td><?php echo $row['order_code'] ?></td>
                                    <td><?php echo $row['order_date'] ?></td>
                                    <td><?php echo $row['account_name'] ?></td>
                                    <td><?php echo $row['order_type'] ?></td>
                                    <td><?php echo $row['order_status'] ?></td>
                                    <td>
                                        <a href="modules/order/xuly.php?order_id=<?php echo $row['order_code'] ?>">Xem chi tiết</a>
                                         | <a href="?action=order&query=order_edit&order_id=<?php echo $row['order_code'] ?>">Duyệt</a>
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