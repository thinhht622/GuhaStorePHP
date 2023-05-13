<div class="main-panel">
    <div class="content-wrapper">
        <?php
        if (isset($_GET['action']) && $_GET['query']) {
            $action = $_GET['action'];
            $query = $_GET['query'];

        } else {
            $action = '';
            $query = '';
        }

        if ($action == 'order') {
            include("./modules/order/lietke.php");
        }
        elseif($action =='category' && $query == 'category_add') {
            include("./modules/category/them.php");
        }
        elseif($action =='category' && $query == 'category_list') {
            include("./modules/category/lietke.php");
        }
        elseif($action =='category' && $query == 'category_edit') {
            include("./modules/category/sua.php");
        } 
        elseif($action =='product' && $query == 'product_add') {
            include("./modules/product/them.php");
        }
        elseif($action =='product' && $query == 'product_list') {
            include("./modules/product/lietke.php");
        }
        elseif($action =='product' && $query == 'product_edit') {
            include("./modules/product/sua.php");
        }
        elseif($action =='account' && $query == 'my_account') {
            include("./modules/account/my_account.php");
        }
        elseif($action =='account' && $query == 'password_change') {
            include("./modules/account/password_change.php");
        }
        elseif($action =='account' && $query == 'account_list') {
            include("./modules/account/lietke.php");
        }
        elseif($action =='account' && $query == 'account_edit') {
            include("./modules/account/sua.php");
        }
        else {
            include("./modules/dashboard.php");
        }
        ?>
    </div>
</div>