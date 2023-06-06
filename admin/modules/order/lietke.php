<?php
if (isset($_GET['pagenumber'])) {
    $page = $_GET['pagenumber'];
} else {
    $page = '';
}


if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 10) - 10;
}

if (isset($_GET['order_status'])) {
    $order_status = $_GET['order_status'];
    $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status = $order_status ORDER BY orders.order_id DESC LIMIT $begin,10";
    $query_order_list = mysqli_query($mysqli, $sql_order_list);
} else {
    $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status >= 0 AND orders.order_status < 3 ORDER BY orders.order_id DESC LIMIT $begin,10";
    $query_order_list = mysqli_query($mysqli, $sql_order_list);
}
?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center">
                    <h4 class="card-title" style="margin: 0;">Danh sách đơn hàng</h4>
                    <div class="input__search p-relative">
                        <form class="search-form" action="?action=order&query=order_search" method="POST">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" name="order_search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                    <div class="dropdown dropdown__item">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuSizeButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tình trạng
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                            <a class="dropdown-item" href="index.php?action=order&query=order_list">Tất cả</a>
                            <a class="dropdown-item" href="index.php?action=order&query=order_list&order_status=0">Đang xử lý</a>
                            <a class="dropdown-item" href="index.php?action=order&query=order_list&order_status=1">Đang chuyển bị hàng</a>
                            <a class="dropdown-item" href="index.php?action=order&query=order_list&order_status=2">Đang giao hàng</a>
                            <a class="dropdown-item" href="index.php?action=order&query=order_list&order_status=3">Đã hoàn thành</a>
                            <a class="dropdown-item" href="index.php?action=order&query=order_list&order_status=-1">Đã hủy</a>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover table-action">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <input type="checkbox" id="checkAll">
                                </th>
                                <th>Mã đơn hàng</th>
                                <th>Thời gian</th>
                                <th>Tên người đặt</th>
                                <th>Loại đơn hàng</th>
                                <th class="text-center">Tình trạng đơn hàng</th>
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
                                        <a href="?action=order&query=order_detail&order_code=<?php echo $row['order_code'] ?>">
                                            <div class="icon-edit">
                                                <img class="w-100 h-100" src="images/icon-view.png" alt="">
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $row['order_code'] ?>">
                                    </td>
                                    <td><?php echo $row['order_code'] ?></td>
                                    <td><?php echo $row['order_date'] ?></td>
                                    <td><?php echo $row['account_name'] ?></td>
                                    <td><?php echo format_order_type($row['order_type']); ?></td>
                                    <td class="text-center"><span class="col-span <?php echo format_status_style($row['order_status']) ?>"><?php echo format_order_status($row['order_status']); ?></span></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination d-flex justify-center">
                    <?php
                    if (isset($_GET['order_status'])) {
                        $order_status = $_GET['order_status'];
                        $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status = $order_status ORDER BY orders.order_id DESC";
                        $query_pages = mysqli_query($mysqli, $sql_order_list);
                    } else {
                        $sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status >= 0 AND orders.order_status < 3 ORDER BY orders.order_id DESC";
                        $query_pages = mysqli_query($mysqli, $sql_order_list);
                    }
                    $row_count = mysqli_num_rows($query_pages);
                    $totalpage = ceil($row_count / 10);
                    ?>
                    <ul class="pagination__items d-flex align-center justify-center">
                        <li class="pagination__item">
                            <a class="d-flex align-center" href="#">
                                <img src="images/arrow-left.svg" alt="">
                            </a>
                        </li>
                        <?php
                        $currentLink = $_SERVER['REQUEST_URI'];
                        for ($i = 1; $i <= $totalpage; $i++) {
                        ?>
                            <li class="pagination__item">
                                <a class="pagination__anchor <?php if ($page = $i) {
                                                                    echo "active";
                                                                } ?>" href="<?php echo $currentLink ?>&pagenumber=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="pagination__item">
                            <a class="d-flex align-center" href="#">
                                <img src="images/icon-nextlink.svg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dialog__control">
    <div class="control__box">
        <a href="modules/order/xuly.php?confirm=1" class="button__control" id="btnConfirm">Duyệt đơn hàng</a>
        <a href="modules/order/xuly.php?cancel=1" class="button__control" id="btnCancel">Hủy đơn hàng</a>
    </div>
</div>
<script>
    var btnConfirm = document.getElementById("btnConfirm");
    var btnCancel = document.getElementById("btnCancel");
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
        btnConfirm.href = "modules/order/xuly.php?confirm=1&data=" + JSON.stringify(checkedIds);
        btnCancel.href = "modules/order/xuly.php?cancel=1&data=" + JSON.stringify(checkedIds);
    }
</script>