<?php
$sql_order_list = "SELECT * FROM orders JOIN account ON orders.account_id = account.account_id WHERE orders.order_status < 0 OR orders.order_status >= 3 ORDER BY orders.order_id DESC";
$query_order_list = mysqli_query($mysqli, $sql_order_list);
?>
<div class="my-account__content">
    <h2 class="my-account__title h3">Danh sách đơn hàng</h2>
    <table class="table">
        <tr>
            <th></th>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt đơn</th>
            <th>Tổng tiền</th>
            <th>Loại đơn</th>
            <th>Tình trạng đơn hàng</th>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query_order_list)) {
            $i++;
        ?>
            <tr>
                <td>
                    <a href="index.php?page=order_detail&order_code=<?php echo $row['order_code'] ?>">
                        <div class="view-btn">
                            <img class="icon-view" src="./assets/images/icon/icon-view.png" alt="view">
                        </div>
                    </a>
                </td>
                <td><?php echo $row['order_code'] ?></td>
                <td><?php echo $row['order_date'] ?></td>
                <td><?php echo $row['total_amount'] ?></td>
                <td><?php echo format_type($row['order_type']); ?></td>
                <td class="h5 d-flex align-center">
                    <img class="icon-status" src="./assets/images/icon/processing.png" alt="" />
                    <?php echo format_status($row['order_status']); ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>