<?php 
include '../inc/connection.php';
include '../inc/functions.php';

// category insert 
if(isset($_POST['add_category'])){
    $name = $_POST['cat_name'];
    $is_parent = $_POST['is_parent'];
    $file_name = $_FILES['choose-file']['name'];
    $tmp_name = $_FILES['choose-file']['tmp_name'];
    $file_size = $_FILES['choose-file']['size'];

    $splited_files = explode('.', $file_name);
    $extn = strtolower(end($splited_files));

    $extensions = array('png', 'jpg', 'jpeg');

    if(!empty($file_name)){
        if(in_array($extn,$extensions) === true){
            $update_name = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/products/category/'.$update_name);
            $cat_insert = "INSERT INTO mart_category (c_name,c_image,is_parent,c_status) VALUES ('$name','$update_name','$is_parent','1')";
            $cat_insert_res = mysqli_query($db, $cat_insert);
            if($cat_insert_res){
                header('location: ../category.php');
            }else{
                die('Category insert error!'.mysqli_error($db));
            }
        }else{
            echo 'warning ! please upload an image file (png,jpg,jpeg)!';
        }
    }else{
        $cat_insert = "INSERT INTO mart_category (c_name,is_parent,c_status) VALUES ('$name','$is_parent','1')";
            $cat_insert_res = mysqli_query($db, $cat_insert);
            if($cat_insert_res){
                header('location: ../category.php');
            }else{
                die('Category insert error!'.mysqli_error($db));
            }
        }
}



// brand insert
if(isset($_POST['add_brand'])){
    $brand_name = $_POST['brand_name'];
    $file_name  = $_FILES['choose-file']['name'];
    $tmp_name   = $_FILES['choose-file']['tmp_name'];

    if(!empty($file_name)){
        $file = is_img($file_name);

        if($file){
            $updatedname = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/products/brand/'.$updatedname);
        }else{
            echo 'not an image';
        }
    }else{
        $updatedname = '';
    }

    $brandInsertSql = "INSERT INTO mart_brand (b_name, b_logo, b_status) VALUES ('$brand_name', '$updatedname', '1')";
    $brandInsertSqlResult = mysqli_query($db, $brandInsertSql);
    if($brandInsertSqlResult){
        header('location: ../brand.php');
    }else{
        die('Brand insert error!'.mysqli_error($db));
    }
}


// products add
if(isset($_POST['add_product'])){
    $name           = $_POST['product-name'];
    $ldesc          = mysqli_real_escape_string($db,$_POST['long_description']);
    $sdesc          = mysqli_real_escape_string($db,$_POST['short_description']);
    $rPrice         = $_POST['regular_price'];
    $oPrice         = $_POST['offer_price'];
    $stock          = $_POST['stock'];
    $cat            = $_POST['category'];
    $brand          = $_POST['brand'];
    $fImage         = $_FILES['choose-file']['name'];
    $tmpfImage      = $_FILES['choose-file']['tmp_name'];
    $fileNames      = array_filter($_FILES['gallery']['name']);

    $galleryimages = '';
    
    $targetDir = "../assets/img/products/gallery/";
    $allowTypes = array('jpg','png','jpeg'); 

    if(!empty($fileNames)){ 

        foreach($_FILES['gallery']['name'] as $key=>$val){ 
         
            $fileName = basename($_FILES['gallery']['name'][$key]); 
            $updatefname = rand().$fileName;
            $targetFilePath = $targetDir . $updatefname; 
             
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                move_uploaded_file($_FILES["gallery"]["tmp_name"][$key], $targetFilePath); 
                $galleryimages .= '@'.$fileName;
            }else{ 
                echo 'Not an img';
            } 
        } 
    }

    $file = is_img($fImage);

    if($file){
        $updatedname = rand().$fImage;
        move_uploaded_file($tmpfImage, '../assets/img/products/'.$updatedname);

        $pinsertSQL = "INSERT INTO mart_products(p_name,p_short_desc,p_big_desc,p_reg_price,p_offer_price,p_featured_img,p_image_gallery,p_quantity,p_status,p_category,p_brand) VALUES('$name','$sdesc','$ldesc','$rPrice','$oPrice','$updatedname','$galleryimages', '$stock', '1', '$cat','$brand')";

        $pInsertSqlResult = mysqli_query($db, $pinsertSQL);
        if($pInsertSqlResult){
            header('location: ../products.php');
        }else{
            die('Product insert error!'.mysqli_error($db));
        }

    }else{
        echo 'not an image';
    }

}