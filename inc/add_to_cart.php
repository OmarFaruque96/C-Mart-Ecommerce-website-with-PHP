<?php 
include "../admin/inc/connection.php"; 
include "../admin/inc/functions.php"; 

session_start();

if(isset($_GET['product_id']) && isset($_GET['quantity'])){

	$id = $_GET['product_id'];
	$quantity = $_GET['quantity'];

	// delete an item
	if(isset($_GET['action']) && $_GET['action'] == 'delete'){
		unset($_SESSION['cart'][$id]);
	}else{
		if(isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]['quantity']++;
		}else{
			$_SESSION['cart'][$id] = array('quantity' => $quantity);
		}	
	}
	
}



