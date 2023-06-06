<?php
    include('../../config/config.php');
    $account_id = $_GET['account_id'];
    if (isset($_POST['account_edit'])) {
        $account_name = $_POST['account_name'];
        $account_phone = $_POST['account_phone'];
        $account_address = $_POST['account_address'];
        $customer_gender = $_POST['customer_gender'];

        $sql_update_account = "UPDATE account SET account_name = '$account_name', account_phone = '$account_phone' WHERE account_id = $account_id";
        $query_update_account = mysqli_query($mysqli, $sql_update_account);

        $sql_update_customer = "UPDATE customer SET customer_name = '$account_name', customer_phone = '$account_phone', customer_gender = '$customer_gender', customer_address = '$account_address' WHERE account_id = $account_id";
        $query_update_customer = mysqli_query($mysqli, $sql_update_customer);


        header('Location:../../index.php?action=account&query=my_account&message=success');
    }


    if (isset($_POST['account_change'])) {
        $account_type = $_POST['account_type'];
        $account_status = $_POST['account_status'];
        $sql_update_account = "UPDATE account SET account_type = $account_type, account_status = $account_status WHERE account_id = $account_id";
        $query_update_account = mysqli_query($mysqli, $sql_update_account);
        
        header('Location:../../index.php?action=account&query=account_list&message=success');
    }
?>
