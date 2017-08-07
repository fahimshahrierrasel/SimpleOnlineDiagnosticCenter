<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/24/17
 * Time: 10:44 PM
 */
include '../includes/dbFunctions.php';
include '../includes/auth_functions.php';
session_start();
$user['username'] = $_POST['username'];
$user['password'] = $_POST['password'];
$user['user_type'] = 'Admin';

$fetchedUser = findUserByUsername($user);

if($fetchedUser){
    if($user['password'] == $fetchedUser['Password']){
        if(createUserSession($fetchedUser)){
            $_SESSION["message"] = "Login Successful";
            header("Location: /admin_panel/dashboard.php");
        }else{
            $_SESSION["message"] = "Login Unsuccessful";
            header('Location: /admin_panel/admin_login.php');
        }
    }else{
        $_SESSION["message"] = "Login Unsuccessful";
        header('Location: /admin_panel/admin_login.php');
    }
}else{
    $_SESSION["message"] = "Login Unsuccessful";
    header('Location: /admin_panel/admin_login.php');
}


?>