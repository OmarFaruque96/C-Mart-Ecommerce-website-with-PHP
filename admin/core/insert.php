<?php 
include '../inc/connection.php';
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