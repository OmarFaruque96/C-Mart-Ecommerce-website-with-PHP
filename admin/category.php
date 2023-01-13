<?php include 'inc/header.php'; ?>
<?php include 'inc/menubar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Product Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-5">
                <!-- add category form -->
                <div class="card">
                    <div class="card-body">
                    

                <?php 
                
                if(isset($_GET['editid'])){
                    $editid = $_GET['editid'];
                    $category_sql = "SELECT * FROM mart_category WHERE ID='$editid'";
                    $category_res = mysqli_query($db,$category_sql);
                    while($row = mysqli_fetch_assoc($category_res)){
                        $ecat_name   = $row['c_name'];
                        $ecat_image = $row['c_image'];
                        $ecat_parent = $row['is_parent'];
                        $ecat_status = $row['c_status'];
                    }
                    // show edit form
                    ?>
                    <h5 class="card-title">Update Category</h5>
                    <form class="row g-3" action="core/update.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo $ecat_name;?>" placeholder="Category Name" name="cat_name" required>
                        </div>
                        <div class="col-md-12">
                            <label>Choose your parent category if any</label>
                            <select id="inputState" class="form-select" name="is_parent">
                            <option>Choose...</option>
                                <?php 
                                $category_sql = "SELECT * FROM mart_category WHERE is_parent='0' ORDER BY c_name ASC";
                                $category_res = mysqli_query($db,$category_sql);
                                while($row = mysqli_fetch_assoc($category_res)){
                                    $cat_id     = $row['ID'];
                                    $cat_name   = $row['c_name'];
                                    $cat_image  = $row['c_image'];
                                    $cat_parent = $row['is_parent'];
                                    $cat_status = $row['c_status'];
                                 ?><option value="<?php echo $cat_id;?>" <?php if($ecat_parent == $cat_id)echo 'selected';?>><?php echo $cat_name;?></option><?php
                                }
                                
                                ?>
                               
                            </select>
                        </div>
                        <div class="col-lg-12">
                        <label>Change Category status</label>
                            <select class="form-control" name="cat_status">
                                <option class="" value="1" <?php if($ecat_status == 1)echo 'selected';?>>Active</option>
                                <option class="" value="0" <?php if($ecat_status == 0)echo 'selected';?>>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                        <div class="image-input c-img">
                            <?php 
                                if(empty($ecat_image)){
                                    echo '<p class="alert alert-danger">No Image Found</p>';
                                }else{
                                    ?>
                                    <img src="assets/img/products/category/<?php echo $ecat_image;?>" alt="" width="100" />
                                    <?php
                                }
                            ?>
                            <small>Choose Category Image</small><br>
                            <input type="file" id="choose-file" name="choose-file" accept="image/*" />
                            <label for="choose-file">Select File</label>
                            <div id="img-preview"></div>
                        </div>
                        </div>
                     
                        <div class="text-start">
                            <input name="editid" value="<?php echo $editid;?>" type="hidden">
                        <button type="submit" name="update_category" class="btn btn-primary">Update Category</button>
                        </div>
                    </form>
                    <?php
                }else{
                    ?>
                     <h5 class="card-title">Add new Category</h5>
                    <form class="row g-3" action="core/insert.php" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Category Name" name="cat_name" required>
                        </div>
                        <div class="col-md-12">
                            <label>Choose your parent category if any</label>
                            <select id="inputState" class="form-select" name="is_parent">
                            <option selected="">Choose...</option>
                                <?php 
                                $category_sql = "SELECT * FROM mart_category WHERE is_parent='0' ORDER BY c_name ASC";
                                $category_res = mysqli_query($db,$category_sql);
                                while($row = mysqli_fetch_assoc($category_res)){
                                    $cat_id     = $row['ID'];
                                    $cat_name   = $row['c_name'];
                                    $cat_image = $row['c_image'];
                                    $cat_parent = $row['is_parent'];
                                    $cat_status = $row['c_status'];
                                 ?><option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option><?php
                                }
                                
                                ?>
                               
                            </select>
                        </div>
                        <div class="col-md-12">
                        <div class="image-input c-img">
                            <small>Choose Category Image</small><br>
                            <input type="file" id="choose-file" name="choose-file" accept="image/*" />
                            <label for="choose-file">Select File</label>
                            <div id="img-preview"></div>
                        </div>
                        </div>
                     
                        <div class="text-start">
                        <button type="submit" name="add_category" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    <?php
                }
                
                ?>

                    <!-- No Labels Form -->
                   

                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <!-- all category table -->
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">All Categories Information</h5>

                    <!-- Table with hoverable rows -->
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 

                        $category_sql = "SELECT * FROM mart_category WHERE is_parent='0'";
                        $category_res = mysqli_query($db,$category_sql);
                        $serial = 0;
                        while($row = mysqli_fetch_assoc($category_res)){
                            $cat_id     = $row['ID'];
                            $cat_name   = $row['c_name'];
                            $cat_image = $row['c_image'];
                            $cat_parent = $row['is_parent'];
                            $cat_status = $row['c_status'];
                            $serial++;

                            ?>
                            <tr>
                                <th scope="row"><?php echo $serial;?></th>
                                <td>
                                    <img src="assets/img/products/category/<?php echo $cat_image;?>" width="40" />
                                </td>
                                <td><?php echo $cat_name;?></td>
                                <td>
                                    <?php if($cat_status == 0)echo '<span class="badge bg-danger">Inactive</span>';else echo '<span class="badge bg-success">Active</span>'; ?>
                                </td>
                                <td>
                                    <a href="category.php?editid=<?php echo $cat_id;?>"><i class="bi bi-pencil-square text-dark"></i></a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteid<?php echo $cat_id;?>"><i class="bi bi-trash text-danger"></i></a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteid<?php echo $cat_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center py-5">
                                                <h2 class="mb-2">Are you sure?</h2>
                                                <a class="btn btn-md btn-danger" href="category.php?deleteid=<?php echo $cat_id;?>">Confirm</a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            // find sub category
                            Show_Sub_Category($cat_id); 

                        }
                        
                        ?>
                        
                     
                        </tbody>
                    </table>
                    <!-- End Table with hoverable rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 

        if(isset($_GET['deleteid'])){
            $delid = $_GET['deleteid'];
            $del_reply = mysqli_query($db,"DELETE FROM mart_category WHERE ID='$delid'");
            if($del_reply){
                header('location: category.php');
            }else{
                die('Category Delete Error!'.mysqli_error($db));
            }

        }
    
    ?>

  </main><!-- End #main -->

<?php include 'inc/footer.php'; ?>