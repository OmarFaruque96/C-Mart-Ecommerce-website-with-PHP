<?php include "inc/header.php"; ?>
<?php include "inc/pageheader.php"; ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Search Result</span>
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
                
                <div class="col-lg-12">

                    <div class="row">

                        <?php 

                        if(isset($_POST['searchbtn'])){
                            $searchval = $_POST['search'];
             
                            $sql = "SELECT * FROM mart_products WHERE p_status = '1' AND p_name LIKE '%$searchval%'";
                            $prd2 = mysqli_query($db,$sql);
                            $no_of_products = mysqli_num_rows($prd2);

                            if($no_of_products == 0){
                                echo '<h1>No Products Found!</h1>';
                            }else{
                                

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

                            }

                        
                        }
                        else{
                            header('location: 404.php');
                        }

                        ?>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

<?php include "inc/footer.php"; ?>