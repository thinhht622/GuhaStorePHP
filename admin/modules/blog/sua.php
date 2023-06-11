<?php
$sql_article_edit = "SELECT * FROM article WHERE article_id = '$_GET[article_id]' LIMIT 1";
$query_article_edit = mysqli_query($mysqli, $sql_article_edit);
?>
<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Sửa bài viết
        </h3>
        <a href="index.php?action=article&query=article_list" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<?php while ($row = mysqli_fetch_array($query_article_edit)) {
?>
    <form method="POST" action="modules/blog/xuly.php?article_id=<?php echo $row['article_id'] ?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="input-item form-group">
                            <label for="author" class="d-block">Tên tác giả</label>
                            <input id=author type="text" name="article_author" class="d-block form-control" value="<?php echo $row['article_author'] ?>" placeholder="">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Tiêu đề bài viết</label>
                            <input type="text" name="article_title" class="d-block form-control" value="<?php echo $row['article_title'] ?>" placeholder="">
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Nội dung tóm tắt</label>
                            <textarea name="article_summary"><?php echo $row['article_summary'] ?></textarea>
                        </div>
                        <div class="input-item form-group">
                            <label for="title" class="d-block">Nội dung chính bài viết</label>
                            <textarea name="article_content"><?php echo $row['article_content'] ?></textarea>
                        </div>

                        <button type="submit" name="article_edit" class="btn btn-primary btn-icon-text mg-t-16">
                            <i class="ti-file btn-icon-prepend"></i>
                            Lưu lại
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="over-flow-hidden">
                            <div class="main-pane-top">
                            </div>
                            <div class="input-item form-group">
                                <label for="article_status" class="d-block">Trang thái</label>
                                <select name="article_status" id="article_status" class="form-control">
                                    <option value="0" <?php if ($row['article_status'] == 0) {
                                                            echo "selected";
                                                        } ?>>Bản nháp</option>
                                    <option value="1" <?php if ($row['article_status'] == 1) {
                                                            echo "selected";
                                                        } ?>>Xuất bản</option>
                                </select>
                            </div>
                            <div class="input-item form-group">
                                <label for="image" class="">Image</label>
                                <img src="modules/blog/uploads/<?php echo $row['article_image'] ?>" class="article__image w-100 h-100" style="width: 100px; height: 100px;" alt="image">
                                <input type="file" name="article_image" value="<?php echo $row['article_image'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
<?php
}
?>
<script>
    CKEDITOR.replace('article_summary');
    CKEDITOR.replace('article_content');
</script>