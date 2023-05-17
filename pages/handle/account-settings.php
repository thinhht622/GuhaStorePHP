<?php
    session_start();
	include('../../admin/config/config.php');
    $account_id = $_SESSION['account_id'];
    $account_name = $_POST['account_name'];
    $account_phone = $_POST['account_phone'];
    $account_address = $_POST['account_address'];

    if (isset($_POST['info_change'])) {
        $sql_update = "UPDATE account SET account_name='".$account_name."', account_phone='".$account_phone."', account_address = '".$account_address."'  WHERE account_id = $account_id";
        
        mysqli_query($mysqli, $sql_update);
        header('Location: ../../index.php?page=my_account&tab=account_info');
    }
?>  