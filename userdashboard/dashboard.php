<?php include "../admin/inc/connection.php"; ?>
<?php include "../admin/inc/functions.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Dashboard</title>
	<link href="ud-style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" >
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynav"
                aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">
                <div class="d-flex">
                    <div class="d-flex align-items-center logo bg-purple">
                        <div class="fab fa-joomla h2 text-white"></div>
                    </div>
                    <div class="ms-3 d-flex flex-column">
                        <div class="h4">Furfection</div>
                        <div class="fs-6">My pet App</div>
                    </div>
                </div>
            </a>
            <div class="collapse navbar-collapse" id="mynav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Categories <span
                                class="fas fa-th-large px-1"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Exclusive</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Collections</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <div class="cart bg-purple">
                                <span class="fas fa-shopping-cart text-white"></span>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> <span class="fas fa-user pe-2"></span> Hello Jhon</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


<?php 
	
	session_start();
	ob_start();

	if(empty($_SESSION['email'])){
		header('Location: ../admin/login.php');
	}else{
		$mail = $_SESSION['email'];
	}

?>

    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3 my-lg-0 my-md-1">
                <div id="sidebar" class="bg-purple">
                    <div class="h4 text-white">Account</div>
                    <ul>
                        <li class="active">
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-box pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Account</div>
                                    <div class="link-desc">View & Manage orders and returns</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-box-open pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Orders</div>
                                    <div class="link-desc">View & Manage orders and returns</div>
                                </div>
                            </a>
                        </li>
                      
                        <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="far fa-user pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Profile</div>
                                    <div class="link-desc">Change your profile details & password</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                <div class="fas fa-headset pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Help & Support</div>
                                    <div class="link-desc">Contact Us for help and support</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 my-lg-0 my-1">
                <div id="main-content" class="bg-white border">
                    <div class="d-flex flex-column">
                        <div class="h5">Hello</div>
                        <div>Logged in as: <?php echo $_SESSION['email'];?></div>
                    </div>
                    <div class="d-flex my-4 flex-wrap">
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Orders placed</div>
                                <div class="ms-auto number">
                                	<?php 

                                	$orders = mysqli_query($db,"SELECT * FROM mart_orders WHERE user_email='$mail'");

                                	echo mysqli_num_rows($orders);


                                	?>
                                </div>
                            </div>
                        </div>
                        <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Items in Cart</div>
                                <div class="ms-auto number">
                                	<?php 

                                if(!empty($_SESSION['cart'])){

                                    $count = 0;
                                
                                    foreach($_SESSION["cart"] as $keys => $values)
                                    {
                                        $count++;
                                    }

                                    echo $count;
                                }else{
                                	echo '0';
                                }

                                ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="box me-4 my-1 bg-light">
                            <img src="https://www.freepnglogos.com/uploads/love-png/love-png-heart-symbol-wikipedia-11.png"
                                alt="">
                            <div class="d-flex align-items-center mt-2">
                                <div class="tag">Wishlist</div>
                                <div class="ms-auto number">10</div>
                            </div>
                        </div> -->
                    </div>
                    <div class="text-uppercase">My recent orders</div>
                    <?php 

                    $orders = mysqli_query($db,"SELECT * FROM mart_orders WHERE user_email='$mail'");

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

                          ?>

                          <div class="order my-3 bg-light">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="d-flex flex-column justify-content-between order-summary">
                                    <div class="d-flex align-items-center">
                                        <div class="text-uppercase">Order ID <?php echo '#00'.$id; ?></div>
                                        <div class="green-label ms-auto text-uppercase"><?php 

                                        if($payment_method == 0){
                                        	echo 'COD';
                                        }
                                        if($payment_method == 1){
                                        	echo 'BKASH';
                                        }

                                    ?></div>
                                    </div>
                                    <div class="fs-8">Products 
                                    	<?php 
                                    	echo '<br>';
                            $products = explode(',', $products);

                            foreach($products as $product){
                              if(!empty($product)){
                              	echo '<a href="../single-product.php?pid='.$product.'">#'.findval("p_name","mart_products","ID",$product).'</a> ';
                              }

                            }

                            ?>
                                    </div>
                                    <div class="fs-8">Order Date:<?php echo $order_date;?></div>
                                    <div class="rating d-flex align-items-center pt-1">
                                        <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png"
                                            alt=""><span class="px-2">Rating:</span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="fas fa-star"></span>
                                        <span class="far fa-star"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                    <div class="status">Status : 
                                    <?php 

                                    if($order_status == 1){
                                    	echo 'Pending';
                                    }
                                    if($order_status == 2){
                                    	echo 'Processing';
                                    }
                                    if($order_status == 3){
                                    	echo 'Delivered';
                                    }

                                    ?></div>
                                    <div class="btn btn-primary text-uppercase"><a href="generatepdf.php?orderid=<?php echo $id;?>">Download PDF</a></div>
                                </div>
                                <div class="progressbar-track">
                                    <ul class="progressbar">
                                        <li id="step-1" class="text-muted green">
                                            <span class="fas fa-gift"></span>
                                        </li>
                                        <li id="step-2" class="text-muted <?php if($order_status >= 1) echo 'green';?>">
                                            <span class="fas fa-check"></span>
                                        </li>
                                        <li id="step-3" class="text-muted <?php if($order_status >= 2) echo 'green';?>">
                                            <span class="fas fa-box"></span>
                                        </li>
                                        <!-- <li id="step-4" class="text-muted">
                                            <span class="fas fa-truck"></span>
                                        </li> -->
                                        <li id="step-5" class="text-muted <?php if($order_status >= 3) echo 'green';?>">
                                            <span class="fas fa-box-open"></span>
                                        </li>
                                    </ul>
                                    <div id="tracker"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                          <?php

                          }

                    ?>
                    
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>
</html>



