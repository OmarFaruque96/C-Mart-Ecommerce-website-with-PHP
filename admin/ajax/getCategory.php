<?php 

include '../inc/connection.php';

$val = intval($_GET['q']);

$category_sql = "SELECT * FROM mart_category WHERE is_parent='$val'";

$category_res = mysqli_query($db,$category_sql);
$serial = 0;
while($row = mysqli_fetch_assoc($category_res)){
    $cat_id     = $row['ID'];
    $cat_name   = $row['c_name'];
    $cat_image = $row['c_image'];
    $cat_parent = $row['is_parent'];
    $cat_status = $row['c_status'];

    ?>
    <input type="checkbox" value="<?php echo $cat_id;?>" name="category[]" />
    <label><?php echo $cat_name;?></label>
    <br>
    <?php

}