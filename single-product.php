<?php include "inc/header.php"; ?>
<?php include "inc/pageheader.php"; ?>

    <?php 

        if(isset($_GET['pid'])){

            $id = $_GET['pid'];

            $singleProductSql = "SELECT * FROM mart_products WHERE ID='$id' AND p_status='1'";
            $productRes = mysqli_query($db,$singleProductSql);

            if(mysqli_num_rows($productRes) > 0){
                while($row = mysqli_fetch_assoc($productRes)){
                  $p_name         = $row['p_name'];
                  $p_short_desc   = $row['p_short_desc'];
                  $p_big_desc     = $row['p_big_desc'];
                  $p_reg_price    = $row['p_reg_price'];
                  $p_offer_price  = $row['p_offer_price'];
                  $p_featured_img = $row['p_featured_img'];
                  $p_image_gallery= $row['p_image_gallery'];
                  $p_quantity     = $row['p_quantity'];
                  $p_category     = $row['p_category'];
                  $p_brand        = $row['p_brand'];
              }
              ?>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?php echo $p_name;?></h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <a href="#"><?php echo findval('c_name','mart_category','ID',$p_category);?></a>
                            <span><?php echo $p_name;?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="img/product/details/product-details-1.jpg" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="img/product/details/thumb-4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $p_name;?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">$
                            <?php 

                                      if(empty($p_offer_price)){
                                        echo $p_reg_price;
                                      }else{
                                        echo '<span style="text-decoration:line-through">'.$p_reg_price.'</span>'.$p_offer_price;
                                      }

                                    ?>
                        </div>
                        <p><?php echo $p_short_desc;?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>
                                <?php if($p_quantity > 0) echo 'In Stock'; else 'Out of Stock';?>
                            </span></li>
                            <!-- <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li> -->
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p><?php echo $p_big_desc;?></p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac d.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <?php 

                 $products = mysqli_query($db,"SELECT * FROM mart_products WHERE p_status = '1' AND p_category = '$p_category' ORDER BY ID DESC LIMIT 4");
                    $totalProducts = mysqli_num_rows($products);

                    while($row = mysqli_fetch_assoc($products)){
                          $id3             = $row['ID'];
                          $p_name         = $row['p_name'];
                          $p_reg_price    = $row['p_reg_price'];
                          $p_offer_price  = $row['p_offer_price'];
                          $p_featured_img = $row['p_featured_img'];
                          $p_quantity     = $row['p_quantity'];
                          ?>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="admin/assets/img/products/<?php echo $p_featured_img;?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="single-product.php?pid=<?php echo $id3;?>"><?php echo $p_name;?></a></h6>
                            <h5>$<?php 

                                      if(empty($p_offer_price)){
                                        echo $p_reg_price;
                                      }else{
                                        echo '<span style="text-decoration:line-through">'.$p_reg_price.'</span>'.$p_offer_price;
                                      }

                                    ?></h5>
                        </div>
                    </div>
                </div>

                          <?php
                      }

                ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->



              <?php
            }else{
                header('Location: 404.php');
            }

        }else{
            header('Location: 404.php');
        }

    ?>


<?php include "inc/footer.php"; ?>