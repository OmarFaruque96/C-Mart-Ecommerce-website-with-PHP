<?php 
include "connection.php";

function Show_Sub_Category($cat_id){
    global $db;

    $sub_cat_sql = "SELECT * FROM mart_category WHERE is_parent = '$cat_id'";
    $sub_cat_Res = mysqli_query($db,$sub_cat_sql);
    while($row = mysqli_fetch_assoc($sub_cat_Res)){
        $cat_id     = $row['ID'];
        $cat_name   = $row['c_name'];
        $cat_image = $row['c_image'];
        $cat_status = $row['c_status'];

        ?>
        <tr>
        <th scope="row"><?php echo '-';?></th>
        <td>
            <img src="assets/img/products/category/<?php echo $cat_image;?>" width="40" />
        </td>
        <td><?php echo '<i class="bi bi-arrow-return-right"></i> '.$cat_name;?></td>
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
    }  
}


// all category
// function all_categories(){
//     global $db;

//     $ids = array();

//     $category_sql = "SELECT * FROM mart_category WHERE c_status = '1'";
//     $category_res = mysqli_query($db,$category_sql);
//     while($row = mysqli_fetch_assoc($category_res)){
//         array_push($ids,$row['ID']);
//     }
//     return $ids;

// }


// check image
function is_img($file_name){
    global $db;

    $splitedArray = explode('.', $file_name);
    $extn = strtolower(end($splitedArray));

    $extentions = array('png', 'jpg', 'jpeg');

    if(in_array($extn, $extentions) === true){
        return true;
    }else{
        return false;
    }
}


// delete record
function delete($table,$key,$delid,$redirect){
    global $db;

    $del_reply = mysqli_query($db,"DELETE FROM $table WHERE $key='$delid'");
    if($del_reply){
        header('location: '.$redirect);
    }else{
        die('Category Delete Error!'.mysqli_error($db));
    }
}

// delete file
function delete_file($file_name,$table,$key,$file_id,$path){
    global $db;

    $file_name_res = mysqli_query($db,"SELECT $file_name FROM $table WHERE $key = '$file_id'");
    $row = mysqli_fetch_assoc($file_name_res);
    $f_name = $row[$file_name];

    unlink($path.$f_name);
}


// find values based on their id

function findval($field,$table,$key,$fkey){
    global $db;

    $catName = mysqli_query($db,"SELECT $field FROM $table WHERE $key='$fkey'");
    $row = mysqli_fetch_assoc($catName);
    $file_name = $row[$field];
    return $file_name;
}


// check if its an admin or not
function is_admin($userrole){
    global $db;

    if($userrole == 3){
        return true;
    }else{
        return false;
    }
}


function OfferPercentage($regularPrice, $offerPrice){

    global $db;

    $off = 100-($offerPrice/$regularPrice)*100;

    return round($off,2);
}


function total_product(){

    global $db;

    $prd = mysqli_query($db,"SELECT * FROM mart_products WHERE p_status = '1'");
    $total = mysqli_num_rows($prd);

    return $total;

}


function show_cart_product($id,$quantity){
    global $db;

    $products = mysqli_query($db,"SELECT * FROM mart_products WHERE ID='$id'");
    while($row = mysqli_fetch_assoc($products)){
          $p_name         = $row['p_name'];
          $p_reg_price    = $row['p_reg_price'];
          $p_offer_price  = $row['p_offer_price'];
          $p_featured_img = $row['p_featured_img'];
          $stock          = $row['p_quantity'];
          $p_category     = $row['p_category'];
          ?>

            <tr>
                <td class="shoping__cart__item">
                    <img src="./admin/assets/img/products/<?php echo $p_featured_img;?>" width="80" alt="">
                    <h5><?php echo $p_name;?></h5>
                </td>
                <td class="shoping__cart__price">
                    <?php 

                    if(empty($p_offer_price)){
                        echo $p_reg_price;
                      }else{
                        echo '<span style="text-decoration:line-through">'.$p_reg_price.'</span>'.$p_offer_price;
                      }

                    ?>
                </td>
                <td class="shoping__cart__quantity">
                    <div class="quantity">
                        <div class="pro-qty">
                            <input type="text" value="<?php echo $quantity;?>">
                        </div>
                    </div>
                </td>
                <td class="shoping__cart__total">
                    <?php 

                    if(empty($p_offer_price)){
                        echo '<span id="total">'.$p_reg_price*$quantity.'</span>';
                      }else{
                        echo '<span id="total">'.$p_offer_price*$quantity.'</span>';
                      }

                    ?>
                </td>
                <td class="shoping__cart__item__close">
                    <a href="inc/add_to_cart.php?product_id=<?php echo $id;?>&&action=delete&&quantity=<?php echo $quantity;?>"><span class="icon_close"></span></a>
                </td>
            </tr>

          <?php
      }
}