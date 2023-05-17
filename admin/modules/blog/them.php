<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thêm bài viết
        </h3>
        <a href="index.php?action=article&query=article_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<form method="POST" action="modules/blog/xuly.php" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Tiêu đề bài viết</label>
                        <input type="text" name="article_title" class="d-block form-control" value="" placeholder="">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Nội dung tóm tắt</label>
                        <textarea class="d-block form-control" cols="30" rows="10" name="article_summary" type="text" value="" placeholder="" style="height: auto;"></textarea>
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Nội dung chính bài viết</label>
                        <textarea class="d-block form-control" cols="30" rows="10" name="article_content" type="text" value="" placeholder="" style="height: auto;"></textarea>
                    </div>
                    
                    <button type="submit" name="article_add" class="btn btn-primary btn-icon-text mg-t-16">
                        <i class="ti-file btn-icon-prepend"></i>
                        Thêm
                    </button>
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
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Trang thái</label>
                        <select name="product_status" id="product_status" class="form-control">
                            <option value="0">Bản nháp</option>
                            <option value="1">Xuất bản</option>
                        </select>
                    </div>
                    <div class="input-item form-group">
                        <label for="image" class="d-block">Image</label>
                        <input type="file" class="" name="article_image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>