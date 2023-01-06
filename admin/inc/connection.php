<?php 
$db = mysqli_connect('localhost', 'root', '', 'cmart');
if($db){
    //echo 'database connection established!';
}else{
    die('Database connection error'.mysqli_error($db));
}
