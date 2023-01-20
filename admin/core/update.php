<?php 
    include '../inc/connection.php';
    include '../inc/functions.php';

    // update category
    if(isset($_POST['update_category'])){
        $name = $_POST['cat_name'];
        $parentid = $_POST['is_parent'];
        $status = $_POST['cat_status'];
        $editid = $_POST['editid'];
        
        if(!empty($_FILES['choose-file']['name'])){
            $file_name = $_FILES['choose-file']['name'];
            $tmp_name = $_FILES['choose-file']['tmp_name'];

            $splited_files = explode('.', $file_name);
            $extn = strtolower(end($splited_files));

            $extensions = array('png', 'jpg', 'jpeg');
            if(in_array($extn,$extensions) === true){
                $update_name = rand().$file_name;
                move_uploaded_file($tmp_name, '../assets/img/products/category/'.$update_name);
                $cat_update_sql = "UPDATE mart_category SET c_name='$name', c_image='$update_name', is_parent='$parentid', c_status='$status' WHERE ID='$editid'";
                $cat_insert_res = mysqli_query($db, $cat_update_sql);
                if($cat_insert_res){
                    header('location: ../category.php');
                }else{
                    die('Category update error!'.mysqli_error($db));
                }
            }else{
                echo 'Please upload an image file';
            }
        }else{
            $cat_update_sql = "UPDATE mart_category SET c_name='$name', is_parent='$parentid', c_status='$status' WHERE ID='$editid'";
                $cat_insert_res = mysqli_query($db, $cat_update_sql);
                if($cat_insert_res){
                    header('location: ../category.php');
                }else{
                    die('Category update error!'.mysqli_error($db));
                }
        }
    }


// brand information update

if(isset($_POST['update_brand'])){
    $brand_name     = $_POST['brand_name'];
    $brand_status   = $_POST['b_status'];
    $edit_id   = $_POST['edit_id'];
    $file_name      = $_FILES['choose-file']['name'];
    $tmp_name       = $_FILES['choose-file']['tmp_name'];

    if(!empty($file_name)){
        $file = is_img($file_name);

        if($file){

            delete_file('b_logo','mart_brand','ID',$edit_id,'../assets/img/products/brand/');

            $updatedname = rand().$file_name;
            move_uploaded_file($tmp_name, '../assets/img/products/brand/'.$updatedname);
            $update_sql = "UPDATE mart_brand SET b_name='$brand_name',b_logo = '$updatedname', b_status='$brand_status' WHERE ID='$edit_id'";
        }else{
            echo 'not an image';
        }
    }else{
        $update_sql = "UPDATE mart_brand SET b_name='$brand_name',b_status='$brand_status' WHERE ID='$edit_id'";
    }

    
    $update_sql_res = mysqli_query($db, $update_sql);
    if($update_sql_res){
        header('location: ../brand.php');
    }else{
        die('Brand update error!'.mysqli_error($db));
    }

}

