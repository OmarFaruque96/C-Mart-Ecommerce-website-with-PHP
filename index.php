<?php include "inc/header.php"; ?>
<?php include "inc/herosection.php"; ?>

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php 
                        $category_sql = "SELECT * FROM mart_category WHERE is_parent='0' AND c_status = '1'";
                        $category_res = mysqli_query($db,$category_sql);
                    
                        while($row = mysqli_fetch_assoc($category_res)){
                            $cat_id     = $row['ID'];
                            $cat_name   = $row['c_name'];
                            $cat_image = $row['c_image'];
                            $cat_parent = $row['is_parent'];
                            ?>
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" data-setbg="admin/assets/img/products/category/<?php echo $cat_image;?>">
                                    <h5><a href="#"><?php echo $cat_name;?></a></h5>
                                </div>
                            </div>
                            <?php
                        }

                    ?>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php 
                            $category_sql = "SELECT * FROM mart_category WHERE is_parent='0' AND c_status = '1'";
                            $category_res = mysqli_query($db,$category_sql);
                        
                            while($row = mysqli_fetch_assoc($category_res)){
                                $cat_id     = $row['ID'];
                                $cat_name   = $row['c_name'];
                                $cat_image  = $row['c_image'];
                                $cat_parent = $row['is_parent'];
                                echo '<li data-filter=".'.strtolower($cat_name).'">'.$cat_name.'</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                
                <?php 

                    $products = mysqli_query($db,"SELECT * FROM mart_products WHERE p_status = '1' LIMIT 8");
                    $totalProducts = mysqli_num_rows($products);

                    while($row = mysqli_fetch_assoc($products)){
                          $id             = $row['ID'];
                          $p_name         = $row['p_name'];
                          $p_reg_price    = $row['p_reg_price'];
                          $p_offer_price  = $row['p_offer_price'];
                          $p_featured_img = $row['p_featured_img'];
                          $p_quantity     = $row['p_quantity'];
                          $p_category     = $row['p_category'];
                          ?>
                        
                        <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo strtolower(findval('c_name','mart_category','ID',$p_category));?>">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="admin/assets/img/products/<?php echo $p_featured_img;?>">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="inc/add_to_cart.php?product_id=<?php echo $id;?>&&quantity=1"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="single-product.php?pid=<?php echo $id;?>"><?php echo $p_name;?></a></h6>
                                    <h5>
                                    <?php 

                                      if(empty($p_offer_price)){
                                        echo $p_reg_price;
                                      }else{
                                        echo '<span style="text-decoration:line-through">'.$p_reg_price.'</span>'.$p_offer_price;
                                      }

                                    ?>
                                  
                              </h5>
                                </div>
                            </div>
                        </div>

                          <?php
                    }

                ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="./shop.php"><img src="img/banner/banner-1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="./shop.php"><img src="img/banner/banner-2.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                
                                <?php 

                                $products = mysqli_query($db,"SELECT * FROM mart_products WHERE p_status = '1' ORDER BY ID DESC LIMIT 3");
                                  $totalProducts = mysqli_num_rows($products);

                                  while($row = mysqli_fetch_assoc($products)){
                                      $id             = $row['ID'];
                                      $p_name         = $row['p_name'];
                                      $p_short_desc   = $row['p_short_desc'];
                                      $p_big_desc     = $row['p_big_desc'];
                                      $p_reg_price    = $row['p_reg_price'];
                                      $p_offer_price  = $row['p_offer_price'];
                                      $p_featured_img = $row['p_featured_img'];
                                      $p_image_gallery= $row['p_image_gallery'];
                                      $p_quantity     = $row['p_quantity'];
                                      $p_status       = $row['p_status'];
                                      $p_category     = $row['p_category'];
                                      $p_brand        = $row['p_brand'];
                                      ?>

                                      <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="admin/assets/img/products/<?php echo $p_featured_img;?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $p_name;?></h6>
                                                <span>$
                                                    <?php 
                                                    if(empty($p_offer_price)){
                                        echo $p_reg_price;
                                      }else{
                                        echo '<span style="text-decoration:line-through">'.$p_reg_price.'</span>'.$p_offer_price;
                                      }
                                                ?></span>
                                            </div>
                                        </a>

                                      <?php
                                  }

                                ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php 

                                $products = mysqli_query($db,"SELECT * FROM mart_products WHERE p_status = '1' ORDER BY ID DESC LIMIT 3,3");
                                  $totalProducts = mysqli_num_rows($products);

                                  while($row = mysqli_fetch_assoc($products)){
                                      $id             = $row['ID'];
                                      $p_name         = $row['p_name'];
                                      $p_short_desc   = $row['p_short_desc'];
                                      $p_big_desc     = $row['p_big_desc'];
                                      $p_reg_price    = $row['p_reg_price'];
                                      $p_offer_price  = $row['p_offer_price'];
                                      $p_featured_img = $row['p_featured_img'];
                                      $p_image_gallery= $row['p_image_gallery'];
                                      $p_quantity     = $row['p_quantity'];
                                      $p_status       = $row['p_status'];
                                      $p_category     = $row['p_category'];
                                      $p_brand        = $row['p_brand'];
                                      ?>

                                      <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="admin/assets/img/products/<?php echo $p_featured_img;?>" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $p_name;?></h6>
                                                <span>$
                                                    <?php 
                                                    if(empty($p_offer_price)){
                                        echo $p_reg_price;
                                      }else{
                                        echo '<span style="text-decoration:line-through">'.$p_reg_price.'</span>'.$p_offer_price;
                                      }
                                                ?></span>
                                            </div>
                                        </a>

                                      <?php
                                  }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->


<?php include "inc/footer.php"; ?>