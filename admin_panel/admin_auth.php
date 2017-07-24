<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/24/17
 * Time: 10:44 PM
 */
include '../includes/dbFunctions.php';
include '../includes/auth_functions.php';

$user['username'] = $_POST['username'];
$user['password'] = $_POST['password'];

$fetchedUser = findUserByUsername($user);
$loginErrorMsg = 'Log in was unsuccessful!';
if($fetchedUser){
    if($user['password'] == $fetchedUser['Password']){
        if(createUserSession($fetchedUser)){
            //echo "<script>console.log('I am Here')</script>";
            header("Location: /admin_panel/dashboard.php");
        }else{
            echo "Session not created";
        }
    }else{
        //header('Location: /patient_portal/patient_login.php');
        echo "<h1>Password<br /><a href='admin_login.php'>Login Now</a> </h1>";
    }
}else{
    //header('Location: /patient_portal/patient_login.php');
    echo "<h1>No User<br /><a href='admin_login.php'>Login Now</a> </h1>";
}


?>