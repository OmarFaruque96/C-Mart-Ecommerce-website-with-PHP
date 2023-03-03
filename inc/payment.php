<?php 
include "../admin/inc/connection.php"; 
include "../admin/inc/functions.php"; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


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
	$products 	= $_POST['products'];

	if(!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($email) && !empty($country) && !empty($address) && !empty($city) && !empty($state) && !empty($zipcode)){

		$order_sql = "INSERT INTO mart_orders (user_email,phone,country,state,address,city,postCode,additional_info,payment_method,total_amount,payment_status,order_status,products) VALUES ('$email','$phone','$country','$state','$address','$city','$zipcode','$diffaddress','$cashon','$total','0','1','$products')";

		$order_res = mysqli_query($db,$order_sql);

		if($order_res){


			if(isset($_GET['user'])){
				$islogin = $_GET['user'];

				if($islogin == 0){
					// new user or guest use
					$email = $email;
					$encrypted = sha1($email);
					$username = $firstname.$lastname;

					$insertusersql = "INSERT INTO mart_users (firstname,lastname,username,email,pass,address,phone,status) VALUES ('$firstname','$lastname','$username','$email','$encrypted','$address','$phone','1')";

   					$insertuserres = mysqli_query($db,$insertusersql);

   					if($insertuserres){
   						$email = $email;
   					}else{
   						echo 'create guest account error!';
   					}
				}
				if($islogin == 1){
					// existing user
					$email = $_SESSION['email'];
				}


				$mail = new PHPMailer(true);

                  try {

                      $mail->isSMTP();
                      $mail->Host = 'smtp.gmail.com';
                      $mail->SMTPAuth = true;
                      $mail->Username = 'farukkuasha@gmail.com';
                      $mail->Password = '';
                      $mail->SMTPSecure = 'ssl';
                      $mail->Port = 465;

                      $mail->setFrom('farukkuasha@gmail.com');
                      $mail->addAddress($email);
                      $mail->isHTML(true);

                      $mail->Subject = 'Order Confirmation mail!';
                      $mail->Body = '
                      	Please login to your account to view order details. You can change your account information from there. If you are a new user please use your mail as username and password.

                      	Your Order No: 123
                      	Total Cost: 
                      '.$_SESSION['total_price'];

                      $mail->send();

                      header('location: forgetpassword.php?msg=Send Rest Link to your Email Address');

                  } catch (Exception $e) {
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                  }

			}



			unset($_SESSION['cart']);
			header('Location: ../thankyou.php');
		}else{
			header('location: ../checkout.php?error=Order processing error! Please try again!');
		}

	}else{
		header('location: ../checkout.php?error=Please Fill up all required fields!');
	}

}