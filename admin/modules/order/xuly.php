<?php
require '../../../carbon/autoload.php';
include('../../config/config.php');

use Carbon\Carbon;
use Carbon\CarbonInterval;

session_start();

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

            $total = 0;
            $quantity = 0;

            while ($row = mysqli_fetch_array($query_order_detail)) {
                $total += ($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale'])) * $row['product_quantity'];
                $quantity += $row['product_quantity'];
            }

            $sql_thongke = "SELECT * FROM metrics WHERE metric_date = '$now'";
            $query_thongke = mysqli_query($mysqli, $sql_thongke);

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

// Xoa san pham khoi don hang
if(isset($_SESSION['order']) && isset($_GET['delete'])) {
    $product_id = $_GET['delete'];
    foreach ($_SESSION['order'] as $order_item) {
        if ($order_item['product_id'] != $product_id) {
            $product[]= array('product_id'=>$order_item['product_id'], 'product_name'=>$order_item['product_name'],'product_quantity'=>$order_item['product_quantity'],'product_price'=>$order_item['product_price'],'product_sale'=>$row['product_sale'],'product_image'=>$order_item['product_image']);
        }
        $_SESSION['order'] = $product;
        header('Location:../../index.php?action=order&query=order_add');
    }
}
// xoa tat ca
if(isset($_GET['deleteall'])&&$_GET['deleteall']==1){
    unset($_SESSION['order']);
    header('Location:../../index.php?action=order&query=order_add');
}
// them sanpham vao don hang
if(isset($_POST['addtoorder'])){
    // session_destroy();
    $product_id=$_POST['product_id'];
    $product_quantity=$_POST['product_quantity'];
    $sql ="SELECT * FROM product WHERE product_id='".$product_id."' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_array($query);
    if($row){
        $new_product=array(array('product_id'=>$product_id, 'product_name'=>$row['product_name'],'product_quantity'=>$product_quantity,'product_price'=>$row['product_price'], 'product_sale'=>$row['product_sale'],'product_image'=>$row['product_image']));
        //kiem tra session phiếu nhập ton tai
        if(isset($_SESSION['order'])){
            $found = false;
            foreach($_SESSION['order'] as $order_item){
                //neu du lieu trung
                if($order_item['product_id']==$product_id){
                    $product[]= array('product_id'=>$order_item['product_id'], 'product_name'=>$order_item['product_name'],'product_quantity'=>$order_item['product_quantity']+$product_quantity,'product_price'=>$order_item['product_price'],'product_sale'=>$row['product_sale'],'product_image'=>$order_item['product_image']);
					$found = true;
                }else{
                    //neu du lieu khong trung
					$product[]= array('product_id'=>$order_item['product_id'], 'product_name'=>$order_item['product_name'],'product_quantity'=>$order_item['product_quantity'],'product_price'=>$order_item['product_price'],'product_sale'=>$row['product_sale'],'product_image'=>$order_item['product_image']);
                }
            }
            if($found == false){
                //lien ket du lieu new_product voi product
                $_SESSION['order']=array_merge($product,$new_product);
            }else{
                $_SESSION['order']=$product;
            }
        }else{
            $_SESSION['order'] = $new_product;
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

// them don hang
if (isset($_POST['order_add'])) {
    $account_id = $_SESSION['account_id'];
    $order_code = rand(0, 9999);
    $delivery_id = rand(0, 9999);
    $order_date = Carbon::now('Asia/Ho_Chi_Minh');
    $delivery_name = $_POST['customer_name'];
    $delivery_address = $_POST['customer_address'];
    $delivery_phone = $_POST['customer_phone'];
    $total_amount = 0;
    $order_type = 4;
    $account_id = $_SESSION['account_id'];

    $validate = 0;
    foreach ($_SESSION['order'] as $cart_item) {
        $product_id = $cart_item['product_id'];
        $query_get_product = mysqli_query($mysqli, "SELECT * FROM product WHERE product_id = $product_id");
        $product = mysqli_fetch_array($query_get_product);
        if ($product['product_quantity'] >= $cart_item['product_quantity']) {
            $validate = 1;
        }
    }

    if ($validate == 1) {
        $insert_delivery = "INSERT INTO delivery(delivery_id, account_id, delivery_name, delivery_phone, delivery_address) VALUE ($delivery_id, $account_id, '$delivery_name', $delivery_phone, '$delivery_address')";
        mysqli_query($mysqli, $insert_delivery);

        $insert_order = "INSERT INTO orders(order_code, order_date, account_id, delivery_id, total_amount, order_type, order_status) 
        VALUE ($order_code, '" . $order_date . "', $account_id, '" . $delivery_id . "', $total_amount, $order_type, 3)";
        
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

        unset($_SESSION['order']);
        header('Location:../../index.php?action=order&query=order_detail&order_code='.$order_code);
    } else {
        header('Location:../../index.php?page=404');
    }
}

?>
