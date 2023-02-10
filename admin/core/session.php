<?php 
include '../inc/connection.php';
include '../inc/functions.php';
session_start();

if(isset($_POST['login'])){
	$usermail = $_POST['usermail'];
	$password = sha1($_POST['password']);

	$users = mysqli_query($db,"SELECT * FROM mart_users WHERE email = '$usermail' AND status='1'");
    while($row = mysqli_fetch_assoc($users)){
        $_SESSION['id'] 		= $row['ID'];
        $_SESSION['email'] 		= $row['email'];
        $pass           		= $row['pass'];
        $_SESSION['userrole']   = $row['userrole'];

        if($usermail === $_SESSION['email'] && $password === $pass){
        	if($_SESSION['userrole'] == 2 || $_SESSION['userrole'] == 3){
        		header('location: ../dashboard.php');
        	}
        	else if($_SESSION['userrole'] == 1){
        		header('location: ../userdashboard.php');
        	}
        	else {
        		header("location: ../login.php?error=Subscribers doesn't have any dashboard!");
        	}
        	
        }

        else{
			header('location: ../login.php?error=Invalid user information');
        }

    }


}