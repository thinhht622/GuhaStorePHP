<?php
    require '../carbon/autoload.php';
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now = Carbon::now('Asia/Ho_Chi_Minh')->subdays(-1)->toDateString();
    $subdays = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $query_order = mysqli_query($mysqli, "SELECT * FROM orders WHERE order_date BETWEEN '$subdays' AND '$now'");
    $order_count = mysqli_num_rows($query_order);

    $sql_sales = "SELECT * FROM orders WHERE order_date BETWEEN '$subdays' AND '$now'";
    $query_sales = mysqli_query($mysqli, $sql_sales);
    $sales = 0;
    while ($order = mysqli_fetch_array($query_sales)) {
        $sales += $order['total_amount'];
    }

    $query_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_status = 1 ");
    $product_count = mysqli_num_rows($query_product);

    $query_customer = mysqli_query($mysqli, "SELECT * FROM customer");
    $customer_count = mysqli_num_rows($query_customer);
?>
<div class="row">
    <div class="col-lg-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="box-title">Sản Phẩm</h3>
                <span class="box-number color-t-yellow"><?php echo $product_count ?></span>
                <div class="box-number-new">
                    <p>Sản phẩm đang bán</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 grid-margin stretch-card">
        <div class="card">
            
            <div class="card-body">
                <h3 class="box-title">Số đơn hàng mới</h3>
                <span class="box-number color-t-blue"><?php echo $order_count ?></span>
                <div class="box-number-new">
                    <p>Đơn hàng trong ngày</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="box-title">Số khách hàng mới</h3>
                <span class="box-number color-t-red"><?php echo $customer_count ?></span>
                <div class="box-number-new">
                    <p>khách hàng của tháng</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="box-title">Doanh thu hôm nay</h3>
                <span class="box-number text-success"><?php echo number_format($sales) ?>đ</span>
                <div class="box-number-new">
                    <p>Thống kê ngày hôm qua</p>
                </div>
            </div>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div id="donutchart"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4>Thống kê doanh số</h4>
                <div id="linechart" style="height: 300px;"></div>
            </div>
        </div>
    </div>
</div>