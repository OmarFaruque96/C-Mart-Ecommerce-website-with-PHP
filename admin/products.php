<?php include 'inc/header.php'; ?>
<?php include 'inc/menubar.php'; ?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Products</li>
      </ol>
    </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <!-- your main code here -->
      <?php
      $data = isset($_GET['data']) ? $_GET['data'] : 'view';
      if($data == 'view'){
      // view
      ?>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Products</h5>
              
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="dataTable-top">
                  <div class="dataTable-dropdown">
                    <label>
                      <select class="dataTable-selector">
                        <option value="5">5</option>
                        <option value="10" selected="">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                      </select> entries per page</label>
                    </div>
                    <div class="dataTable-search">
                      <input class="dataTable-input" placeholder="Search..." type="text">
                    </div>
                  </div>
                  <div class="dataTable-container">
                    <table class="table datatable dataTable-table">
                      <thead>
                        <tr>
                          <th scope="col" style="width: 3%;">#</th>
                          <th scope="col" data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Image</a></th>
                          <th scope="col" data-sortable="" style="width: 20%;"><a href="#" class="dataTable-sorter">Name</a></th>
                          <th scope="col" data-sortable="" style="width: 13%;"><a href="#" class="dataTable-sorter">Price</a></th>
                          <th scope="col" data-sortable="" style="width: 13%;"><a href="#" class="dataTable-sorter">Category</a></th>
                          <th scope="col" data-sortable="" style="width: 15%;"><a href="#" class="dataTable-sorter">Brand</a></th>
                          <th scope="col" data-sortable="" style="width: 6%;"><a href="#" class="dataTable-sorter">Quantity</a></th>
                          <th scope="col" data-sortable="" style="width: 10%;"><a href="#" class="dataTable-sorter">Status</a></th>
                          <th scope="col" style="width: 10%;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        

                      <?php 
                      $serial = 0;
                      $products = mysqli_query($db,"SELECT * FROM mart_products");
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
                          $serial++;
                          ?>
                          <tr>
                            <th scope="row"><?php echo $serial;?></th>
                            <td>
                              <?php 
                            if(empty($p_featured_img)){
                                ?>
                                <img src="assets/img/products/brand/letter-b.png" width="50"/>
                                <?php
                            }else{
                                ?>
                                <img src="assets/img/products/<?php echo $p_featured_img;?>" width="50">
                                <?php
                            }
                            ?>
                            </td>
                            <td><?php echo $p_name;?></td>
                            <td>
                              <?php 

                              if(empty($p_offer_price)){
                                echo $p_reg_price;
                              }else{
                                echo '<span style="text-decoration:line-through">'.$p_reg_price.'</span>'.$p_offer_price;
                              }

                              ?>
                            </td>
                            <td>
                              <?php 
                              echo findval('c_name','mart_category','ID',$p_category);
                              ?>
                            </td>
                            <td>
                              <?php 
                              echo findval('b_name','mart_brand','ID',$p_brand);
                              ?>
                            </td>
                            <td>
                              <?php 
                              echo $p_quantity;
                              ?>
                            </td>
                            <td>
                              <?php 
                            if($p_status == 1){
                                echo '<span class="badge bg-success">Active</span>';
                            }else{
                                echo '<span class="badge bg-danger">Inactive</span>'; 
                            }
                            ?>
                            </td>
                            <td>
                              <a href="products.php?data=edit&editid=<?php echo $id;?>"><i class="bi bi-pencil-square text-dark"></i></a>
                              <a href="" data-bs-toggle="modal" data-bs-target="#deleteid<?php echo $id;?>"><i class="bi bi-trash text-danger"></i></a>
                                    <!-- Modal -->
                              <div class="modal fade" id="deleteid<?php echo $id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center py-5">
                                        <h2 class="mb-2">Are you sure?</h2>
                                        <a class="btn btn-md btn-danger" href="products.php?data=delete&deleteid=<?php echo $id;?>">Confirm</a>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    </div>
                                </div>
                              </div>
                            </td>
                          </tr>

                          <?php
                      } 
                          if($totalProducts == 0){
                            echo '<tr><td colspan="7">No Products available!</td></tr>';
                          }

                      ?>

                      </tbody>
                    </table>
                  </div>
                  <div class="dataTable-bottom">
                    <div class="dataTable-info">Showing 1 to 5 of 5 entries</div>
                    <nav class="dataTable-pagination">
                    <ul class="dataTable-pagination-list"></ul></nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        }
        if($data == 'add'){
        // add
        ?>
        <form method="POST" enctype="multipart/form-data" action="core/insert.php">
          <div class="row" style="overflow-x: hidden;">
            <div class="col-lg-9">
              <div class="card p-3">
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label>Product Name</label>
                    <input type="text" placeholder="Product Name" class="form-control" name="product-name" required>
                  </div>
                  <div class="form-group mb-3">
                    <label>Product Description</label>
                    <textarea rows="8" class="form-control" placeholder="Short Description" name="long_description">
                      
                    </textarea>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6"> 
                      <label for="inputEmail5" class="form-label">Regular Price</label> <input type="number" class="form-control" id="inputEmail5" name="regular_price" required>
                    </div>
                    <div class="col-md-6"> 
                      <label for="inputEmail5" class="form-label">Offer Price</label> 
                      <input type="number" class="form-control" id="inputEmail5" name="offer_price">
                    </div>
                    <div class="col-md-6"> 
                      <label for="inputEmail5" class="form-label">Stock</label> 
                      <input type="number" class="form-control" id="inputEmail5" name="stock">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Product Short Description</label>
                    <textarea rows="4" class="form-control" placeholder="Short Description" name="short_description">
                      
                    </textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card p-3">
                <div class="card-body">
                  <div class="form-group mb-3">
                    <label class="mb-2">Select Category</label>
                    <select class="form-control" name="category" required>
                      <?php 
                        $category_sql = "SELECT * FROM mart_category WHERE c_status='1'";
                        $category_res = mysqli_query($db,$category_sql);
                        $serial = 0;
                        while($row = mysqli_fetch_assoc($category_res)){
                            $cat_id     = $row['ID'];
                            $cat_name   = $row['c_name'];
                            $cat_parent = $row['is_parent'];
                            ?>
                            <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
                            <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label class="mb-2">Select Brand</label>
                    <select class="form-control" name="brand" required>
                      <?php 
                        $allBrandsSql = "SELECT * FROM mart_brand WHERE b_status='1'";
                $allBrandsSqlResult = mysqli_query($db, $allBrandsSql);
                while($row = mysqli_fetch_assoc($allBrandsSqlResult)){
                    $brand_id       = $row['ID'];
                    $brand_name     = $row['b_name'];
                    $brand_logo     = $row['b_logo'];
                    $brand_status   = $row['b_status'];
                   
                            ?>
                            <option value="<?php echo $brand_id;?>"><?php echo $brand_name;?></option>
                            <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <div class="image-input c-img">
                        <small class="mb-2 d-inline-block">Select Featured Images</small><br>
                        <input type="file" id="choose-file" name="choose-file" accept="image/*" required />
                        <label for="choose-file">Select File</label>
                        <div id="img-preview"></div>
                    </div>
                  </div>
                  <div class="form-group multimg">
                    <label class="mb-3">Select Gallery Images</label>
                    <input type="file" id="files" name="gallery[]" multiple>
                  </div>

                  <div class="my-3">
                    <input type="submit" class="btn btn-md btn-lg btn-info rounded-1 text-light" value="Publish" name="add_product">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
  
        <?php
        }
        if($data == 'edit'){
        // edit
          if(isset($_GET['editid'])){
            $editid = $_GET['editid'];

            $editproductSQL = mysqli_query($db,"SELECT * FROM mart_products WHERE ID='$editid'");
            
            $row = mysqli_fetch_assoc($editproductSQL);
            $p_name2         = $row['p_name'];
            $p_short_desc2   = $row['p_short_desc'];
            $p_big_desc2     = $row['p_big_desc'];
            $p_reg_price2    = $row['p_reg_price'];
            $p_offer_price2  = $row['p_offer_price'];
            $p_featured_img2 = $row['p_featured_img'];
            $p_image_gallery2 = $row['p_image_gallery'];
            $p_quantity2     = $row['p_quantity'];
            $p_status2       = $row['p_status'];
            $p_category2     = $row['p_category'];
            $p_brand2        = $row['p_brand'];
              
            ?>
            <form method="POST" enctype="multipart/form-data" action="products.php?data=update">
              <div class="row" style="overflow-x: hidden;">
                <div class="col-lg-9">
                  <div class="card p-3">
                    <div class="card-body">
                      <div class="form-group mb-3">
                        <label>Product Name</label>
                        <input type="text" placeholder="Product Name" value="<?php echo $p_name2;?>" class="form-control" name="product-name">
                      </div>
                      <div class="form-group mb-3">
                        <label>Product Description</label>
                          <textarea rows="4" class="form-control" placeholder="Short Description" name="big_description" value="<?php echo $p_big_desc2;?>">
                            <?php echo $p_big_desc2;?>
                          </textarea>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6"> 
                          <label for="inputEmail5" class="form-label">Regular Price</label> <input type="number" class="form-control" id="inputEmail5" name="regular_price" value="<?php echo $p_reg_price2;?>">
                        </div>
                        <div class="col-md-6"> 
                          <label for="inputEmail5" class="form-label">Offer Price</label> 
                          <input type="number" value="<?php echo $p_offer_price2;?>" class="form-control" id="inputEmail5" name="offer_price">
                        </div>
                        <div class="col-md-6"> 
                          <label for="inputEmail5" class="form-label">Stock</label> 
                          <input type="number" class="form-control" id="inputEmail5" name="stock">
                        </div>
                        <div class="col-md-6"> 
                          <label>Change Product status</label>
                            <select class="form-control" name="p_status">
                                <option class="" value="1" <?php if($p_status2 == 1)echo 'selected';?>>Active</option>
                                <option class="" value="0" <?php if($p_status2 == 0)echo 'selected';?>>Inactive</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Product Short Description</label>
                        <textarea rows="4" class="form-control" placeholder="Short Description" name="short_description" value="<?php echo $p_short_desc2;?>">
                          <?php echo $p_short_desc2;?>
                        </textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="card p-3">
                    <div class="card-body">
                      <div class="form-group mb-3">
                        <label class="mb-2">Select Category</label>
                        <select class="form-control" name="category">
                          <?php 
                            $category_sql = "SELECT * FROM mart_category WHERE c_status='1'";
                            $category_res = mysqli_query($db,$category_sql);
                            $serial = 0;
                            while($row = mysqli_fetch_assoc($category_res)){
                                $cat_id     = $row['ID'];
                                $cat_name   = $row['c_name'];
                                $cat_parent = $row['is_parent'];
                                ?>
                                <option value="<?php echo $cat_id;?>" <?php if($cat_id == $p_category2)echo 'selected';?>><?php echo $cat_name;?></option>
                                <?php
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group mb-3">
                        <label class="mb-2">Select Brand</label>
                        <select class="form-control" name="brand">
                          <?php 
                            $allBrandsSql = "SELECT * FROM mart_brand WHERE b_status='1'";
                    $allBrandsSqlResult = mysqli_query($db, $allBrandsSql);
                    while($row = mysqli_fetch_assoc($allBrandsSqlResult)){
                        $brand_id       = $row['ID'];
                        $brand_name     = $row['b_name'];
                        $brand_logo     = $row['b_logo'];
                        $brand_status   = $row['b_status'];
                       
                                ?>
                                <option value="<?php echo $brand_id;?>" <?php if($brand_id == $p_brand2)echo 'selected';?>><?php echo $brand_name;?></option>
                                <?php
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group mb-3">
                        <div class="image-input c-img">
                          <?php 
                                if(empty($p_featured_img2)){
                                    echo '<p class="alert alert-danger">No Image Found</p>';
                                }else{
                                    ?>
                                    <img src="assets/img/products/<?php echo $p_featured_img2;?>" alt="" width="100" />
                                    <?php
                                }
                            ?>
                            <small class="mb-2 d-inline-block">Select Featured Images</small><br>
                            <input type="file" id="choose-file" name="choose-file" accept="image/*" />
                            <label for="choose-file">Select File</label>
                            <div id="img-preview"></div>
                        </div>
                      </div>
                      <div class="form-group multimg">
                        <label class="mb-3">Select Gallery Images</label>
                        <input type="file" id="files" name="files" multiple>
                      </div>

                      <div class="my-3">
                        <input type="hidden" value="<?php echo $editid;?>" name="editid">
                        <input type="submit" class="btn btn-md btn-lg btn-danger rounded-1 text-light" value="Update Information" name="update_product">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <?php

          }
        }
        if($data == 'update'){
          if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $editid         = $_POST['editid'];
            $name           = $_POST['product-name'];
            $ldesc          = mysqli_real_escape_string($db,$_POST['big_description']);
            $sdesc          = mysqli_real_escape_string($db,$_POST['short_description']);
            $rPrice         = $_POST['regular_price'];
            $oPrice         = $_POST['offer_price'];
            $stock          = $_POST['stock'];
            $cat            = $_POST['category'];
            $brand          = $_POST['brand'];
            $p_status          = $_POST['p_status'];
            $fImage         = $_FILES['choose-file']['name'];
            $tmpfImage      = $_FILES['choose-file']['tmp_name'];


            if(!empty($fImage)){
              $file = is_img($fImage);

              if($file){

                  delete_file('p_featured_img','mart_products','ID',$editid,'assets/img/products/');

                  $updatedname = rand().$fImage;
                  move_uploaded_file($tmpfImage, 'assets/img/products/'.$updatedname);

                  $update_sql = "UPDATE mart_products SET p_name='$name', p_short_desc='$sdesc', p_big_desc='$ldesc', p_reg_price='$rPrice', p_offer_price='$oPrice', p_featured_img='$updatedname', p_quantity='$stock', p_status='$p_status', p_category ='$cat', p_brand ='$brand' WHERE ID='$editid'";
              }else{
                  echo 'not an image';
              }
          }else{
              $update_sql = "UPDATE mart_products SET p_name='$name', p_short_desc='$sdesc', p_big_desc='$ldesc', p_reg_price='$rPrice', p_offer_price='$oPrice', p_quantity='$stock', p_status='$p_status', p_category ='$cat', p_brand ='$brand' WHERE ID='$editid'";
          }
          $update_sql_res = mysqli_query($db, $update_sql);
          if($update_sql_res){
              header('location: products.php');
          }else{
              die('Product update error!'.mysqli_error($db));
          }

          }
        }
        if($data == 'delete'){
          if(isset($_GET['deleteid'])){
            $deleteid = $_GET['deleteid'];
            // delete category image
            delete_file('p_featured_img','mart_products','ID',$deleteid,'assets/img/products/');

            delete('mart_products','ID',$deleteid,'products.php');
          }
        }
        
        ?>
      </section>
      </main><!-- End #main -->
      <?php include 'inc/footer.php'; ?>