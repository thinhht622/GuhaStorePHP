<?php
    include('../../config/config.php');
    $account_id = $_GET['account_id'];
    $account_name = $_POST['account_name'];
    $account_phone = $_POST['account_phone'];
    $account_type = $_POST['account_type'];
    $account_status = $_POST['account_status'];

    if (isset($_POST['account_edit'])) {
        $sql_update_account = "UPDATE account SET account_name = '$account_name', account_phone = '$account_phone', account_type = $account_type, account_status = $account_status WHERE account_id = $account_id";
        $query_update_account = mysqli_query($mysqli, $sql_update_account);
        header('Location:../../index.php?action=account&query=account_list');
    }

?>
