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
}
?>
<p>Cảm ơn bạn đã mua hàng chúng tôi sẽ liên hệ cho bạn sớm nhất</p>