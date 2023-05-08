<?php
$sql_category_list = "SELECT * FROM category ORDER BY category_id DESC";
$query_category_list = mysqli_query($mysqli, $sql_category_list);
?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center">
                    <h4 class="card-title" style="margin: 0;">Danh mục sản phẩm</h4>
                    <div class="input__search p-relative">
                        <form class="search-form" action="#">
                            <i class="icon-search p-absolute"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </div>
                    <a href="?action=category&query=category_add" class="btn btn-outline-dark btn-fw">Thêm danh mục</a>
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
                                <th>Tiêu đề</th>
                                <th>Từ khóa sắp xếp</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            while ($row = mysqli_fetch_array($query_category_list)) {
                                $i++;
                            ?>
                                <tr>
                                    <td>
                                    <label class="container" id="checkAll" onclick="testChecked();">
                                        <input type="checkbox" class="checkbox" id="<?php echo $row['category_id'] ?>">
                                        <span class="checkmark"></span>
                                    </label>
                                    </td>
                                    <td><img src="modules/category/uploads/<?php echo $row['category_image'] ?>" alt=""></td>
                                    <td><?php echo $row['category_name'] ?></td>
                                    <td><?php echo $row['category_keyword'] ?></td>
                                    <td>
                                        <a href="modules/category/xuly.php?category_id=<?php echo $row['category_id'] ?>">Delete</a>
                                        <a href="?action=category&query=category_edit&category_id=<?php echo $row['category_id'] ?>">Edit</a>
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
            if(checkboxes[i].checked)
            {
                count++;
                console.log(count);
            }
        }
        if (count > 0) {
            dialogControl.classList.add('active');
        }
        else {
            dialogControl.classList.remove('active');
        }
    }
</script>