<?php
    include('../../config/config.php');
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
?>