<?php

include '../admin/inc/connection.php';
    
ob_end_clean();
require('../fpdf/fpdf.php');
  

$datas = '';
// Instantiate and use the FPDF class 
$pdf = new FPDF();
  
//Add a new page
$pdf->AddPage();
  
// Set the font for the text
$pdf->SetFont('Arial', 'B', 18);
  
if(isset($_GET['orderid'])){
	$orderid = $_GET['orderid'];
	// find all values
	$orders = mysqli_query($db,"SELECT * FROM mart_orders WHERE ID='$orderid'");

	while($row = mysqli_fetch_assoc($orders)){
	  $id                 = $row['ID'];
	  $user_email         = $row['user_email'];
	  $phone              = $row['phone'];
	  $country            = $row['country'];
	  $state              = $row['state'];
	  $address            = $row['address'];
	  $city               = $row['city'];
	  $postCode           = $row['postCode'];
	  $additional_info    = $row['additional_info'];
	  $payment_method     = $row['payment_method'];
	  $total_amount       = $row['total_amount'];
	  $order_status       = $row['order_status'];
	  $products           = $row['products'];
	  $order_date           = $row['order_date'];

	  //array_push($data,$user_email,$total_amount);

	  $datas .= 'Name: '.$user_email;
	  $datas .= 'Amount'.$total_amount;

	}


	// Prints a cell with given text 
	$pdf->Cell(60,20,$datas);
}else{
	// Prints a cell with given text 
	$pdf->Cell(60,20,'No Order Information Found!');
}




  
// return the generated output
$pdf->Output();
  
?>