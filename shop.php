<?php include "inc/header.php"; ?>
<?php include "inc/pageheader.php"; ?>

<?php 
    
    $total_products = total_product();
    $product_per_page = 6;

    if(isset($_GET['current_page'])){
        $current_page = $_GET['current_page'];
    }else{
        $current_page = 1;   
    }
    

    $total_page = ceil($total_products/$product_per_page);

    $starting = ($current_page - 1) * $product_per_page;

?>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <?php include "inc/shopSidebar.php"; ?>
                </div>
                <div class="col-lg-9 col-md-7">


                    <?php 

                    $products = mysqli_query($db,"SELECT * FROM mart_products");
                    $totalProducts = mysqli_num_rows($products);

                    if($totalProducts > 0){

                        ?>

                        <div class="product__discount">
                            <div class="section-title product__discount__title">
                                <h2>Sale Off</h2>
                            </div>
                            <div class="row">
                                    
                                    <?php 

                                    $prd = mysqli_query($db,"SELECT * FROM mart_products WHERE p_status = '1' AND p_offer_price > '0' ORDER BY ID DESC LIMIT 3");

                                    while($row = mysqli_fetch_assoc($prd)){
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
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="admin/assets/img/products/<?php echo $p_featured_img;?>">
                                                <div class="product__discount__percent">
                                              
                                                <?php 

                                                $off = OfferPercentage($p_reg_price,$p_offer_price);
                                                echo '-'.$off.'%';
                                                ?></div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span><?php 
                              echo findval('c_name','mart_category','ID',$p_category);
                              ?></span>
                                                <h5><a href="single-product.php?pid=<?php echo $id;?>"><?php echo $p_name;?></a></h5>
                                                <div class="product__item__price">
                                                <?php if(empty($p_offer_price)){
                                        echo '$'.$p_reg_price;
                                      }else{
                                        echo '<span style="text-decoration:line-through">$'.$p_reg_price.'</span>$'.$p_offer_price;
                                      }?> <span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                            <?php
                                        
                                    }

                                    ?>
                                
                            </div>
                        </div>

                        <?php
                        
                    }else{
                        echo 'No Products Found!';
                    }

                    


                    ?>

                    
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>16</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        

                        <?php 

                        $prd2 = mysqli_query($db,"SELECT * FROM mart_products WHERE p_status = '1' LIMIT $starting,$product_per_page");

                            while($row = mysqli_fetch_assoc($prd2)){
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

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="admin/assets/img/products/<?php echo $p_featured_img;?>">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="single-product.php?pid=<?php echo $id;?>"><?php echo $p_name;?></a></h6>
                                    <h5>
                                    <?php if(empty($p_offer_price)){
                                        echo '$'.$p_reg_price;
                                      }else{
                                        echo '<span style="text-decoration:line-through">$'.$p_reg_price.'</span>$'.$p_offer_price;
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
                    <div class="product__pagination">

                        <?php 

                        if($current_page > 1){
                            $p = $current_page;
                            ?>
                            <a href="shop.php?current_page=<?php echo $p -= 1;?>"><i class="fa fa-long-arrow-left"></i></a>
                            <?php
                        }

                        for($serial = 1; $serial <= $total_page ; $serial++){
                            echo '<a href="shop.php?current_page='.$serial.'">'.$serial.'</a>';
                        }
                        
                        if($current_page < $total_page){
                            $p = $current_page;
                            ?>
                            <a href="shop.php?current_page=<?php echo $p+=1;?>"><i class="fa fa-long-arrow-right"></i></a>
                            <?php
                        }

                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

<?php include "inc/footer.php"; ?>