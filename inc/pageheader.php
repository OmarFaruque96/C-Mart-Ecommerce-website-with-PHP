<section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
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
                </div>
            </div>
        </div>
    </section>