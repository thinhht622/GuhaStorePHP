<?php
$sql_product_list = "SELECT * FROM product JOIN category ON product.product_category = category.category_id ORDER BY product.product_id DESC;";
$query_product_list = mysqli_query($mysqli, $sql_product_list);
?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center">
                    <h4 class="card-title" style="margin: 0;">Danh sách sản phẩm</h4>
                    <div class="input__search p-relative">
                        <form class="search-form" action="#">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                    <a href="?action=product&query=product_add" class="btn btn-outline-dark btn-fw">Thêm sản phẩm</a>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <label class="container" onclick="testChecked();">
                                        <input type="checkbox" id="checkAll">
                                        <span class="checkmark"></span>
                                    </label>
                                </th>
                                <th></th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Tình trạng</th>
                                <th class="text-center">Giá nhập sản phẩm</th>
                                <th>Giá bán sản phẩm</th>
                                <th>Sale</th>
                                <th>Mô tả sản phẩm</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($query_product_list)) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                        <label class="container" id="checkAll" onclick="testChecked();">
                                            <input type="checkbox" class="checkbox" id="<?php echo $row['product_id'] ?>">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td><img src="modules/product/uploads/<?php echo $row['product_image'] ?>" class="product_image" alt="image"></td>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td>
                                        <?php if ($row['product_status'] == 1) {
                                        ?>
                                            <div class="product__status product__status--active">
                                                <span class="show-status">Active</span>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="product__status product__status--pause">
                                                <span class="show-status">Pause</span>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo number_format($row['product_price_import']).' ₫' ?></td>
                                    <td><?php echo number_format($row['product_price']).' ₫'?></td>
                                    <td><?php echo $row['product_sale'] ?></td>
                                    <td><?php echo $row['product_description'] ?></td>
                                    <td>
                                        <a href="modules/product/xuly.php?product_id=<?php echo $row['product_id'] ?>">Delete</a>
                                        <a href="?action=product&query=product_edit&product_id=<?php echo $row['product_id'] ?>">Edit</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="dialog__control">
    <div class="control__box">
        <a class="button__control" id="btnDelete">Xóa</a>
        <a class="button__control" id="btnEdit">Sửa</a>
    </div>
</div>
<script>
    var checkAll = document.getElementById("checkAll");
    var checkboxes = document.getElementsByClassName("checkbox");
    var dialogControl = document.querySelector('.dialog__control');
    // Thêm sự kiện click cho checkbox checkAll
    checkAll.addEventListener("click", function() {
        // Nếu checkbox checkAll được chọn
        if (checkAll.checked) {
            // Đặt thuộc tính "checked" cho tất cả các checkbox còn lại
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        } else {
            // Bỏ thuộc tính "checked" cho tất cả các checkbox còn lại
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        }
    });

    console.log(checkboxes[0]);

    function testChecked() {
        var count = 0;
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                count++;
                console.log(count);
            }
        }
        if (count > 0) {
            dialogControl.classList.add('active');
        } else {
            dialogControl.classList.remove('active');
        }
    }
</script>