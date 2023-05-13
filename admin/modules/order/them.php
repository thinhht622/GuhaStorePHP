<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thêm danh mục sản phẩm
        </h3>
        <a href="index.php?action=category&query=category_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="modules/category/xuly.php" enctype="multipart/form-data">
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Tên danh mục</label>
                        <input type="text" name="category_name" class="d-block form-control" value="" placeholder="collection name">
                    </div>
                    <div class="input-item form-group">
                        <label for="keyword" class="d-block">Từ khóa phân loại</label>
                        <input type="text" name="category_keyword" id="keyword" class="d-block form-control" value="" placeholder="keyword">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Mô tả danh mục</label>
                        <textarea class="d-block form-control" style="height: auto;" name="category_description" type="text" value="" placeholder="collection name"></textarea>
                    </div>
                    <div class="input-item form-group">
                        <label for="image" class="d-block">Image</label>
                        <input type="file" class="" name="category_image">
                    </div>
                    <button type="submit" name="category_add" class="btn btn-primary btn-icon-text mg-t-16">
                        <i class="ti-file btn-icon-prepend"></i>
                        Thêm
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top">
                    <h4 class="card-title">Sản phẩm theo danh mục</h4>
                    <h6></h6>
                </div>

            </div>
        </div>
    </div>
</div>