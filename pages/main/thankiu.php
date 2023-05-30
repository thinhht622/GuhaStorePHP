<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
if (isset($_GET['vnp_Amount'])) {
    $vnp_Amount = $_GET['vnp_Amount'];
    $vnp_BankCode = $_GET['vnp_BankCode'];
    $vnp_BankTranNo = $_GET['vnp_BankTranNo'];
    $vnp_CardType = $_GET['vnp_CardType'];
    $vnp_OrderInfo = $_GET['vnp_OrderInfo'];
    $vnp_PayDate = $_GET['vnp_PayDate'];
    $vnp_TmnCode = $_GET['vnp_TmnCode'];
    $vnp_TransactionNo = $_GET['vnp_TransactionNo'];
    $order_code=$_SESSION['order_code'];

    //insert vnpay
    $insert_vnpay = "INSERT INTO vnpay(
        vnp_amount, vnp_bankcode, vnp_banktranno, vnp_cardtype, vnp_orderinfo, vnp_paydate, vnp_tmncode, vnp_transactionno, order_code)
        VALUE('".$vnp_Amount."','".$vnp_BankCode."','".$vnp_BankTranNo."','".$vnp_CardType."','".$vnp_OrderInfo."','".$vnp_PayDate."','".$vnp_TmnCode."','".$vnp_TransactionNo."', '".$order_code."')";
    $query_vnpay = mysqli_query($mysqli, $insert_vnpay);
    if ($query_vnpay) {
        echo '<h3>Giao dịch VNPAY thành công</h3>';
    } else {
        echo 'Giao dịch thất bại';
    }
} elseif(isset($_GET['partnerCode'])) {
    $partnerCode = $_GET['partnerCode'];
    $orderId = $_GET['orderId'];
    $amount = $_GET['amount'];
    $orderInfo = $_GET['orderInfo'];
    $orderType = $_GET['orderType'];
    $transId = $_GET['transId'];
    $payType = $_GET['payType'];

    $account_id = $_SESSION['account_id'];
    $delivery_id = $_SESSION['delivery_id'];
    $order_date = $_SESSION['order_date'];
    $delivery_name = $_SESSION['delivery_name'];
    $delivery_address = $_SESSION['delivery_address'];
    $delivery_phone = $_SESSION['delivery_phone'];
    $delivery_note = $_SESSION['delivery_note'];
    $order_type = $_SESSION['order_type'];

    // echo $account_id;
    // echo $delivery_id;
    // echo $order_date;
    // echo $delivery_name;
    // echo $delivery_address;
    // echo $delivery_phone;
    // echo $delivery_note;
    // echo $order_type;


    // insert don hang
    $insert_order = "INSERT INTO orders(order_code, order_date, account_id, delivery_id, total_amount, order_type, order_status) 
    VALUE ('" . $orderId . "', '" . $order_date . "', $account_id, '" . $delivery_id . "', '" . $amount . "', $order_type, 1)";

    

    $query_insert_order = mysqli_query($mysqli, $insert_order);
    if ($query_insert_order) {
        //them chi tiet don hang
        foreach ($_SESSION['cart'] as $cart_item) {
            $product_id = $cart_item['product_id'];
            $query_get_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id");
            $product = mysqli_fetch_array($query_get_product);
            if ($product['product_quantity'] >= $cart_item['product_quantity']) {
                $product_quantity = $cart_item['product_quantity'];
                $quantity = $product['product_quantity'] - $product_quantity;
                $product_price = $cart_item['product_price'];
                $product_sale = $cart_item['product_sale'];
                $insert_order_detail = "INSERT INTO order_detail(order_code, product_id, product_quantity, product_price, product_sale) VALUE ('" . $order_code . "', '" . $product_id . "', '" . $product_quantity . "', '" . $product_price . "', '" . $product_sale . "')";
                mysqli_query($mysqli, $insert_order_detail);
                mysqli_query($mysqli, "UPDATE product SET product_quantity = $quantity WHERE product_id = $product_id");
            }
        }
        $update_total_amount = "UPDATE orders SET total_amount = $total_amount WHERE order_code = $order_code";
        $query_total_amount = mysqli_query($mysqli, $update_total_amount);

        unset($_SESSION['cart']);
    }

    //insert momo
    $insert_momo = "INSERT INTO momo(
        partner_code, order_code, momo_amount, order_info, order_type, trans_id, pay_type)
        VALUE('".$partnerCode."','".$orderId."','".$amount."','".$orderInfo."','".$orderType."','".$transId."','".$payType."')";
    $query_momo = mysqli_query($mysqli, $insert_momo);
    if ($query_momo) {
        echo '<h3>Giao dịch MOMO thành công</h3>';
    } else {
        echo 'Giao dịch thất bại';
    }
}
?>
<p>Cảm ơn bạn đã mua hàng chúng tôi sẽ liên hệ cho bạn sớm nhất</p>