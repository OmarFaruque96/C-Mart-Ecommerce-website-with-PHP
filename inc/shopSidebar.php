<div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                <?php 
                            $category_sql = "SELECT * FROM mart_category WHERE is_parent='0' AND c_status = '1'";
                            $category_res = mysqli_query($db,$category_sql);
                        
                            while($row = mysqli_fetch_assoc($category_res)){
                                $cat_id     = $row['ID'];
                                $cat_name   = $row['c_name'];
                                $cat_image = $row['c_image'];
                                $cat_parent = $row['is_parent'];
                                echo '<li><a href="#">'.$cat_name.'</a></li>';
                            }

                            ?>
                            </ul>
                        </div>
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div> -->
                        <!-- <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div> -->
                        <div class="sidebar__item">
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
                    </div>