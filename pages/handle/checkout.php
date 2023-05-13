<?php
session_start();
include('../../admin/config/config.php');
if (isset($_POST['checkout'])) {
    $account_id = $_SESSION['account_id'];
    $order_code = rand(0, 9999);
    $order_date = '';
    $account_name = $_POST['account_name'];
    $account_address = $_POST['account_address'];
    $account_phone = $_POST['account_phone'];
    $total_amount = 0;
    $order_type = $_POST['order_type'];
    $insert_order = "INSERT INTO orders(order_code, order_date, account_id, account_address, account_phone, total_amount, order_type, order_status) 
    VALUE ($order_code, '" . $order_date . "', $account_id, '" . $account_address . "', '" . $account_phone . "', $total_amount, $order_type, 0)";
    $query_insert_order = mysqli_query($mysqli, $insert_order);
    if ($query_insert_order) {
        foreach($_SESSION['cart'] as $cart_item) {
            $product_id = $cart_item['product_id'];
            $product_quantity = $cart_item['product_quantity'];
            $product_price = $cart_item['product_price'];
            $product_sale = $cart_item['product_sale'];
            $insert_order_detail = "INSERT INTO order_detail(order_code, product_id, product_quantity, product_price, product_sale) VALUE ('" . $order_code . "', '" . $product_id . "', '" . $product_quantity . "', '" . $product_price . "', '" . $product_sale . "')";
            mysqli_query($mysqli, $insert_order_detail);
        }
    }
    unset($_SESSION['cart']);
    header('Location:index.php?page=thanhkiu');
}
