<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="main-pane-top d-flex space-between align-center">
                    <h4 class="card-title" style="margin: 0;">Thống kê đơn hàng theo <span id="text-date"></span></h4>
                    <a href="#" class="btn btn-outline-dark btn-fw">Export</a>
                </div>
                <div class="option-date d-flex space-between" style="margin-bottom: 20px;">
                    <select id="select-date">
                        <option value="">Chọn thời gian</option>
                        <option value="7ngay">7 ngày qua</option>
                        <option value="28ngay">28 ngày qua</option>
                        <option value="90ngay">90 ngày qua</option>
                        <option value="365ngay">365 ngày qua</option>
                    </select>
                    <div class="date-filter">
                        <label for="date-from">Từ</label>
                        <input type="date" name="date-from" id="date-from">
                        <label for="date-to">Đến</label>
                        <input type="date" name="date-to" id="date-to">
                    </div>
                </div>
                <div id="linechart" style="height: 350px;" class="w-100"></div>
            </div>
        </div>
    </div>
</div>