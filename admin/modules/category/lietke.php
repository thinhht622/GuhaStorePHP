<?php
$sql_category_list = "SELECT * FROM category ORDER BY category_id DESC";
$query_category_list = mysqli_query($mysqli, $sql_category_list);
?>
<div class="row">
    <div class="col">
        <div class="header__list d-flex space-between align-center">
            <h3 class="card-title" style="margin: 0;">Danh mục sản phẩm</h3>
            <div class="action_group">
                <a href="?action=category&query=category_add" class="button button-dark">Thêm danh mục</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-content">
                    <div class="main-pane-top d-flex justify-center align-center">
                    <div class="input__search p-relative">
                        <form method="POST" class="search-form" action="?action=category&query=category_search">
                            <i class="icon-search p-absolute"></i>
<<<<<<< HEAD
                            <input type="search" class="form-control" placeholder="Tìm kiếm" title="Tìm kiếm">
=======
                            <input type="search" class="form-control" name="category_search" placeholder="Search Here" title="Search here">
>>>>>>> 7e9a9bbe000abd6007cd84ac5f34719bd1af4114
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-action">
                        <thead>
                            <tr>
                            <th></th>
                                <th>
                                    <input type="checkbox" id="checkAll">
                                </th>
                                <th></th>
                                <th>Tiêu đề</th>
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
                                        <a href="?action=category&query=category_edit&category_id=<?php echo $row['category_id'] ?>">
                                            <div class="icon-edit">
                                                <img class="w-100 h-100" src="images/icon-edit.png" alt="">
                                            </div>
                                        </a>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" onclick="testChecked(); getCheckedCheckboxes();" id="<?php echo $row['category_id'] ?>">
                                    </td>
                                    <td><img src="modules/category/uploads/<?php echo $row['category_image'] ?>" alt=""></td>
                                    <td><?php echo $row['category_name'] ?></td>
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
</div>
<div class="dialog__control">
    <div class="control__box">
        <a href="#" class="button__control" id="btnDelete">Xóa</a>
    </div>
</div>
<script>
    var btnDelete = document.getElementById("btnDelete");
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
        testChecked();
        getCheckedCheckboxes();
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
            checkAll.checked = false;
        }
    }

    function getCheckedCheckboxes() {
        var checkeds = document.querySelectorAll('.checkbox:checked');
        var checkedIds = [];
        for (var i = 0; i < checkeds.length; i++) {
            checkedIds.push(checkeds[i].id);
        }
        btnDelete.href = "modules/category/xuly.php?data="+ JSON.stringify(checkedIds);
    }
</script>