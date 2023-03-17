<?php include "admin/inc/connection.php"; ?>
<!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul>
                            <?php 
                            $category_sql = "SELECT * FROM mart_category WHERE is_parent='0' AND c_status = '1'";
                            $category_res = mysqli_query($db,$category_sql);
                        
                            while($row = mysqli_fetch_assoc($category_res)){
                                $cat_id     = $row['ID'];
                                $cat_name   = $row['c_name'];
                                $cat_image = $row['c_image'];
                                $cat_parent = $row['is_parent'];
                                echo '<li><a href="category.php?id='.$cat_id.'">'.$cat_name.'</a></li>';
                            }

                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="search.php" method="POST">
                                <a class="hero__search__categories" href="./shop.php">
                                    All Products
                                    <span class="arrow_carrot-right"></span>
                                </a>
                                <input type="text" name="search" placeholder="What do yo u need?">
                                <button type="submit" name="searchbtn" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="./shop.php" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->