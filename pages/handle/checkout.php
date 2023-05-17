<?php
session_start();
include('../../admin/config/config.php');
if (isset($_POST['checkout'])) {
    $account_id = $_SESSION['account_id'];
    $order_code = rand(0, 9999);
    $order_date = date('Y-m-d', time());
    $account_name = $_POST['account_name'];
    $account_address = $_POST['account_address'];
    $account_phone = $_POST['account_phone'];
    $total_amount = 0;
    $order_type = $_POST['order_type'];

    $validate = 0;
    foreach ($_SESSION['cart'] as $cart_item) {
        $product_id = $cart_item['product_id'];
        $query_get_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id");
        $product = mysqli_fetch_array($query_get_product);
        if ($product['product_quantity'] >= $cart_item['product_quantity']) {
            $validate = 1;
        }
    }

    if ($validate == 1) {
        $insert_order = "INSERT INTO orders(order_code, order_date, account_id, account_address, account_phone, total_amount, order_type, order_status) 
        VALUE ($order_code, '" . $order_date . "', $account_id, '" . $account_address . "', '" . $account_phone . "', $total_amount, $order_type, 0)";
        $query_insert_order = mysqli_query($mysqli, $insert_order);
        if ($query_insert_order) {
            foreach ($_SESSION['cart'] as $cart_item) {
                $product_id = $cart_item['product_id'];
                $query_get_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id");
                $product = mysqli_fetch_array($query_get_product);
                if ($product['product_quantity'] >= $cart_item['product_quantity']) {
                    $product_quantity = $cart_item['product_quantity'];
                    $quantity = $product['product_quantity'] - $product_quantity;
                    $product_price = $cart_item['product_price'];
                    $product_sale = $cart_item['product_sale'];
                    $total_amount += ($product_price - ($product_price / 100 * $product_sale)) * $product_quantity;
                    $insert_order_detail = "INSERT INTO order_detail(order_code, product_id, product_quantity, product_price, product_sale) VALUE ('" . $order_code . "', '" . $product_id . "', '" . $product_quantity . "', '" . $product_price . "', '" . $product_sale . "')";
                    mysqli_query($mysqli, $insert_order_detail);
                    mysqli_query($mysqli, "UPDATE product SET product_quantity = $quantity WHERE product_id = $product_id");
                }
            }
        }
        $update_total_amount = "UPDATE orders SET total_amount = $total_amount WHERE order_code = $order_code";
        $query_total_amount = mysqli_query($mysqli, $update_total_amount);
        unset($_SESSION['cart']);
        header('Location:../../index.php?page=my_account&tab=account_order');
    }
    else {
        header('Location:../../index.php?page=404');
    }
}
