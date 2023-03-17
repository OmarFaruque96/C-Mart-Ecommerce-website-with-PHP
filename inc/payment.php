<?php 
include "../admin/inc/connection.php"; 
include "../admin/inc/functions.php"; 

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require '../PHPMailer/src/Exception.php';
// require '../PHPMailer/src/PHPMailer.php';
// require '../PHPMailer/src/SMTP.php';


if(isset($_POST['place-order'])){

	$firstname 	= $_POST['firstname'];
	$lastname 	= $_POST['lastname'];
	$phone 		= $_POST['phone'];
	$email 		= $_POST['email']; 
	$country 	= $_POST['country'];
	$address 	= $_POST['address'];
	$city 		= $_POST['city'];
	$state 		= $_POST['state'];
	$zipcode 	= $_POST['zipcode'];
	$ship_to 	= $_POST['ship_to'];
	$diffaddress = $_POST['diff-address'];
	$subtotal 	= $_POST['subtotal'];
	$total 		= $_POST['total'];
	$cashon 	= $_POST['cashon'];
	$bkash 	= $_POST['bkash'];
	$products 	= $_POST['products'];

	if(!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($email) && !empty($country) && !empty($address) && !empty($city) && !empty($state) && !empty($zipcode)){

		$order_sql = "INSERT INTO mart_orders (user_email,phone,country,state,address,city,postCode,additional_info,payment_method,total_amount,payment_status,order_status,products,order_date) VALUES ('$email','$phone','$country','$state','$address','$city','$zipcode','$diffaddress','$cashon','$total','0','1','$products',now())";

		$order_res = mysqli_query($db,$order_sql);

		if($order_res){

			if(!empty($bkash)){
				header('Location: ../bkash/payment.php');
			}


			// if(isset($_GET['user'])){
			// 	$islogin = $_GET['user'];

			// 	if($islogin == 0){
			// 		// new user or guest use
			// 		$email = $email;
			// 		$encrypted = sha1($email);
			// 		$username = $firstname.$lastname;

			// 		$insertusersql = "INSERT INTO mart_users (firstname,lastname,username,email,pass,address,phone,userrole,status) VALUES ('$firstname','$lastname','$username','$email','$encrypted','$address','$phone','1','1')";

   			// 		$insertuserres = mysqli_query($db,$insertusersql);

   			// 		if($insertuserres){
   			// 			$email = $email;
   			// 		}else{
   			// 			echo 'create guest account error!';
   			// 		}
			// 	}
			// 	if($islogin == 1){
			// 		// existing user
			// 		$email = $_SESSION['email'];
			// 	}


			// 	// $mail = new PHPMailer(true);
			// }



			//unset($_SESSION['cart']);
			//header('Location: ../thankyou.php');
		}else{
			header('location: ../checkout.php?error=Order processing error! Please try again!');
		}

	}else{
		header('location: ../checkout.php?error=Please Fill up all required fields!');
	}

}