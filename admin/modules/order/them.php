<div class="row" style="margin-bottom: 10px;">
    <div class="col d-flex" style="justify-content: space-between; align-items: flex-end;">
        <h3>
            Thêm đơn hàng
        </h3>
        <a href="index.php?action=order&query=order_live" class="btn btn-outline-dark btn-fw">
            <i class="mdi mdi-reply"></i>
            Quay lại
        </a>
    </div>
</div>
<form method="POST" action="modules/order/xuly.php" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="input-item form-group">
                        <label for="title" class="d-block">Tên khách hàng</label>
                        <input type="text" name="order_name" class="d-block form-control" value="" placeholder="collection name">
                    </div>
                    <div class="input-item form-group">
                        <label for="keyword" class="d-block">Số điện thoại</label>
                        <input type="text" name="category_keyword" id="keyword" class="d-block form-control" value="" placeholder="keyword">
                    </div>
                    <div class="input-item form-group">
                        <label for="title" class="d-block">Địa chỉ</label>
                        <textarea class="d-block form-control" style="height: auto;" name="order_address" type="text" value="" placeholder="collection name"></textarea>
                    </div>
                    <button type="submit" name="category_add" class="btn btn-primary btn-icon-text mg-t-16">
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
                    <h4 class="card-title">Danh sách sản phẩm</h4>
                    <h6></h6>
                </div>

            </div>
        </div>
    </div>
</div>
</form>