<?php
function format_type($value)
{
  $text = '';
  if ($value == 0) {
    echo "Chờ thanh toán";
  } elseif ($value == 1) {
    echo "Đã thanh toán online";
  } else {
    echo "COD";
  }
  echo $text;
}

function format_status($value)
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
    $text = 'Customer';
  } else {
    $text = 'Admin';
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
