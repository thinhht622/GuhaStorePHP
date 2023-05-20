<?php
require '../../../carbon/autoload.php';
include('../../config/config.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

if (isset($_GET['data'])) {
    $data = $_GET['data'];
    $order_codes = json_decode($data);
}


if (isset($_GET['confirm']) && $_GET['confirm'] == 1) {
    foreach ($order_codes as $code) {
        // Lay thong tin don hang
        $sql_order_get = "SELECT * FROM orders WHERE order_code = $code LIMIT 1";
        $query_order_get = mysqli_query($mysqli, $sql_order_get);
        $order = mysqli_fetch_array($query_order_get);
        $order_status = $order['order_status'];
        $order_status++;
        //Chuyen trang thai don hoan
        $sql_order_confirm = "UPDATE orders SET order_status = $order_status WHERE order_code = $code";
        mysqli_query($mysqli, $sql_order_confirm);

        if ($order['order_status'] == 0) {
            $sql_order_detail = "SELECT * FROM order_detail WHERE order_code = $code";
            $query_order_detail = mysqli_query($mysqli, $sql_order_detail);

            $sql_thongke = "SELECT * FROM metrics WHERE metric_date = '$now'";
            $query_thongke = mysqli_query($mysqli, $sql_thongke);

            $total = 0;
            $quantity = 0;

            while ($row = mysqli_fetch_array($query_order_detail)) {
                $total += ($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale'])) * $row['product_quantity'];
                $quantity += $row['product_quantity'];
            }

            if (mysqli_num_rows($query_thongke) == 0) {
                $metric_sales = $total;
                $metric_quantity = $quantity;
                $metric_order = 1;
                $sql_update_metrics = "INSERT INTO metrics (metric_date, metric_order, metric_sales, metric_quantity) 
                VALUE ('$now', '$metric_order', '$metric_sales', '$metric_quantity')";
                mysqli_query($mysqli, $sql_update_metrics);
            } elseif (mysqli_num_rows($query_thongke) != 0) {
                while ($row_tk = mysqli_fetch_array($query_thongke)) {
                    $metric_sales = $row_tk['metric_sales'] + $total;
                    $metric_quantity = $row_tk['metric_quantity'] + $quantity;
                    $metric_order = $row_tk['metric_order'] + 1;
                    $sql_update_metrics = "UPDATE metrics SET metric_order = '$metric_order', metric_sales = '$metric_sales', metric_quantity = '$metric_quantity' WHERE metric_date = '$now'";
                    mysqli_query($mysqli, $sql_update_metrics);
                }
            }
        }
    }

    header('Location: ../../index.php?action=order&query=order_list');
}

if (isset($_GET['cancel']) && $_GET['cancel'] == 1) {
    foreach ($order_codes as $code) {
        //Chuyen trang thai don hoan
        $sql_order_cancel = "UPDATE orders SET order_status = -1 WHERE order_code = $code";
        mysqli_query($mysqli, $sql_order_cancel);
    }
    header('Location: ../../index.php?action=order&query=order_list');
}
