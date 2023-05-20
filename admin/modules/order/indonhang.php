<?php
include('../../config/config.php');
require('../../../tfpdf/tfpdf.php');

$order_code = $_GET['order_code'];
$sql_order_detail_list = "SELECT od.order_detail_id, p.product_id, p.product_name, od.order_code, od.product_quantity, od.product_price, od.product_sale, p.product_image FROM order_detail od JOIN product p ON od.product_id = p.product_id WHERE od.order_code = '" . $order_code . "' ORDER BY od.order_detail_id DESC";
$query_order_detail_list = mysqli_query($mysqli, $sql_order_detail_list);

$pdf = new tFPDF();
$pdf->AddPage("0");
// $pdf->SetFont('Arial','B',16);

$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);


$pdf->Write(10,'Cửa hàng nước hoa Guha Perfume');
	$pdf->Ln(10);

    $pdf->Write(10,'Mã đơn hàng:' .$order_code);
	$pdf->Ln(10);

	$width_cell=array(5,35,150,20,30,40);

	$pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Mã hàng',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[3],10,'Số lượng',1,0,'C',true); 
	$pdf->Cell($width_cell[4],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[5],10,'Tổng tiền',1,1,'C',true); 
	$pdf->SetFillColor(231,231,231); 
	$fill=false;
	$i = 0;
    $total = 0;
	while($row = mysqli_fetch_array($query_order_detail_list)){
    $total += ($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale'])) * $row['product_quantity'];
	$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['order_code'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['product_name'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$row['product_quantity'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale'])),1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,number_format(($row['product_price'] - ($row['product_price'] / 100 * $row['product_sale']))*$row['product_quantity']),1,1,'C',$fill);
	$fill = !$fill;

	}
    $pdf->Write(10,'Tổng giá trị đơn hàng là:' .number_format($total) .'đ');
	$pdf->Ln(10);
	$pdf->Write(10,'Cảm ơn bạn đã tin tưởng và mua hàng.');
	$pdf->Ln(10);

    $pdf->Output();
?>