<?php include "inc/header.php"; ?>
<?php include "inc/pageheader.php"; ?>

<?php 

    $_SESSION['subtotal_price'] = 0;
    $_SESSION['total_price'] = 0;

    if(!empty($_SESSION['cart'])){              
        foreach($_SESSION["cart"] as $keys => $values)
        {
            $_SESSION['subtotal_price'] += subtotal(intval($keys),intval($values["quantity"]));
        }
        
    }

?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php 

                            if(!empty($_SESSION['cart'])){
                                
                                foreach($_SESSION["cart"] as $keys => $values)
                                {
                                    show_cart_product(intval($keys),intval($values["quantity"]));
                                }
                                //print_r ($_SESSION['cart']);
                            }

                            ?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="" method="POST">
                                <input type="text" placeholder="Enter your coupon code" name="couponcode">
                                <button type="submit" class="site-btn" name="applycoupon">APPLY COUPON</button>
                            </form>

                            <?php 

                                if(isset($_POST['applycoupon'])){
                                    $code = $_POST['couponcode'];

                                    $today = date("Y-m-d");

                                    $has_coupon = mysqli_query($db,"SELECT * FROM mart_coupon WHERE coupon='$code'");

                                    if(mysqli_num_rows($has_coupon) > 0){
                                        while($row = mysqli_fetch_assoc($has_coupon)){
                                              $amount         = $row['amount'];
                                              $dis_type       = $row['dis_type'];

                                              if($dis_type == 1){

                                                if($_SESSION['subtotal_price'] > $amount){
                                                    $_SESSION['total_price'] = $_SESSION['subtotal_price'] - $amount;
                                                }
                                                else{
                                                    echo 'Minimum amount is less than discount price!';
                                                    $_SESSION['total_price'] = $_SESSION['subtotal_price']; 
                                                }
                                              }else{
                                                $_SESSION['total_price'] = $_SESSION['subtotal_price'] - ($_SESSION['subtotal_price']*($amount/100));
                                              }

                                        }
                                    }else{
                                        echo 'Coupon Invalid!';
                                    }

                                }else{
                                  $_SESSION['total_price'] = $_SESSION['subtotal_price'];  
                                }

                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>
                                <?php 

                                if(!empty($_SESSION['cart'])){
                                    echo '$'.$_SESSION['subtotal_price'];
                                }else{
                                    echo '$0';
                                }

                                ?>
                            </span></li>
                            <li>Total <span>
                                <?php echo '$'.$_SESSION['total_price'];?>
                            </span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->

<?php include "inc/footer.php"; ?>