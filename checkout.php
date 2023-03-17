<?php include "inc/header.php"; ?>
<?php include "inc/pageheader.php"; ?>

<?php 
    
    if(!empty($_SESSION['email'])){
        $is_guest = true;
        $usermail = $_SESSION['email'];
    }else{
        $is_guest = false;
    }

    $checkout_products = '';

?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   
                        <?php 
                        if(isset($_GET['error'])){
                            echo $_GET['error'];
                        }
                        ?>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="inc/payment.php?user=<?php echo $is_guest;?>" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="firstname" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="lastname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="<?php if(!empty($_SESSION['email']))echo $usermail;?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="address" required>
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city" required>
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state" required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="zipcode" required>
                            </div>
                        
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" id="diff-acc" name="ship_to" >
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery." name="diff-address">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>

                                    <?php 


                                    if(!empty($_SESSION['cart'])){
                                        
                                        foreach($_SESSION["cart"] as $keys => $values)
                                        {
                                            show_checkout_product(intval($keys),intval($values["quantity"]));
                                          //  array_push($checkout_products, intval($keys));

                                            $checkout_products .= strval($keys).',';
                                        }
                                    }

                                    ?>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>
                                    <?php echo '$'.$_SESSION['subtotal_price'];?>
                                </span></div>
                                <div class="checkout__order__total">Total <span>
                                    <?php echo '$'.$_SESSION['total_price'];?>
                                </span></div>
                                <input type="hidden" name="subtotal" value="<?php echo $_SESSION['subtotal_price'];?>">
                                <input type="hidden" name="total" value="<?php echo $_SESSION['total_price'];?>">
                                <input type="hidden" name="products" value="<?php echo $checkout_products;?>">
                                <p>Choose your payment system</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Cash on delivery
                                        <input type="checkbox" id="payment" name="cashon">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Bkash
                                        <input type="checkbox" id="paypal" name="bkash">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn" name="place-order">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

   <?php include "inc/footer.php"; ?>