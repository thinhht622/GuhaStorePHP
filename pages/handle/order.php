<?php
session_start();
include('../../admin/config/config.php');
$order_code = $_GET['order_code'];
$sql_get_order = "SELECT * FROM orders WHERE order_code = $order_code LIMIT 1";
$query_get_order = mysqli_query($mysqli, $sql_get_order);

$sql_get_order_detail = "SELECT * FROM order_detail WHERE order_code = $order_code";
$query_order_detail = mysqli_query($mysqli, $sql_get_order_detail);

$order = mysqli_fetch_array($query_get_order);
if ($order['order_status'] == 0) {
    print_r($order_detail);
    while ($item = mysqli_fetch_array($query_order_detail)) {
        $product_id = $item['product_id'];
        $query_get_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id");
        $product = mysqli_fetch_array($query_get_product);
        $quantity = $product['product_quantity'] + $item['product_quantity'];
        
        mysqli_query($mysqli, "UPDATE product SET product_quantity = $quantity WHERE product_id = $product_id");
    }
    $sql_cancel_order = "UPDATE orders SET order_status = -1 WHERE order_code = $order_code";
    mysqli_query($mysqli, $sql_cancel_order);

    header('Location:../../index.php?page=my_account&tab=account_order');
}
