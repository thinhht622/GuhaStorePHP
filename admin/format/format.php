<?php
function format_order_type($value)
{
  $text = '';
  if ($value == 0) {
    echo "Thanh toán tiền mặt";
  } elseif ($value == 1) {
    echo "Chuyển khoản";
  } elseif ($value == 2) {
    echo "MoMo";
  } elseif ($value == 3) {
    echo "VNPAY";
  } elseif ($value == 4) {
    echo "Mua hàng trực tiếp";
  }
  echo $text;
}

function format_order_status($value)
{
  $text = '';
  if ($value == -1) {
    $text = 'Đơn hàng đã hủy';
  } elseif ($value == 0) {
    $text = 'Đang xử lý';
  } elseif ($value == 1) {
    $text = 'Đang chuyển bị';
  } elseif ($value == 2) {
    $text = 'Đang giao hàng';
  } else {
    $text = 'Đã hoàn thành';
  }
  echo $text;
}

function format_collection_type($value)
{
  $text = '';
  if ($value == 0) {
    $text = 'Tùy chọn sản phẩm';
  } else {
    $text = 'Sắp xếp theo từ khóa';
  }
  echo $text;
}

function format_account_type($value)
{
  $text = '';
  if ($value == 0) {
    $text = 'Khách hàng';
  } elseif ($value == 1) {
    $text = 'Nhân viên';
  } 
  else {
    $text = 'Quản trị viên';
  }
  echo $text;
}

function format_account_status($value)
{
  $text = '';
  if ($value == -1) {
    $text = 'Tạm khóa';
  } else {
    $text = 'Đang hoạt động';
  }
  echo $text;
}


function format_article_status($value)
{
  $text = '';
  if ($value == 0) {
    $text = 'Bản nháp';
  } else {
    $text = 'Xuất bản';
  }
  echo $text;
}
