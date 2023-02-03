<?php 

include '../inc/connection.php';

$q = intval($_GET['q']);

if($q == 1){
	// show products
	$products = mysqli_query($db,"SELECT * FROM mart_products");
  	$totalProducts = mysqli_num_rows($products);

  	while($row = mysqli_fetch_assoc($products)){
      $id             = $row['ID'];
      $p_name         = $row['p_name'];
      ?>
      <option value="<?php echo $id;?>"><?php echo $p_name;?></option>
      <?php
    }
}
if($q == 2){
	// show category
	$category_sql = "SELECT * FROM mart_category WHERE c_status='1'";
    $category_res = mysqli_query($db,$category_sql);
    while($row = mysqli_fetch_assoc($category_res)){
        $cat_id     = $row['ID'];
        $ecat_name  = $row['c_name'];
        ?>
      <option value="<?php echo $cat_id;?>"><?php echo $ecat_name;?></option>
      <?php
    }
}
if($q == 3){
	// show brand
	$allBrandsSql = "SELECT * FROM mart_brand WHERE b_status = '1'";
    $allBrandsSqlResult = mysqli_query($db, $allBrandsSql);
    while($row = mysqli_fetch_assoc($allBrandsSqlResult)){
        $brand_id       = $row['ID'];
        $brand_name     = $row['b_name'];
        ?>
      <option value="<?php echo $brand_id;?>"><?php echo $brand_name;?></option>
      <?php
    }
}
if($q == 4){
	?>
	<option value="all">All Products</option>
	<?php
}