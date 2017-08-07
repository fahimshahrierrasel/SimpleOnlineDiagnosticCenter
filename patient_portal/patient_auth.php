<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/22/17
 * Time: 6:26 PM
 */

include '../includes/dbFunctions.php';
include '../includes/auth_functions.php';
session_start();
$user['username'] = $_POST['username'];
$user['password'] = $_POST['password'];
$user['user_type'] = 'Patient';

$fetchedUser = findUserByUsername($user);
$loginErrorMsg = 'Log in was unsuccessful!';
if($fetchedUser){
    if($user['password'] == $fetchedUser['Password']){
        if(createUserSession($fetchedUser)){
            header("Location: /patient_portal/dashboard.php");
        }else{
            $_SESSION["message"] = "Something went wrong!";
            header('Location: /patient_portal/patient_login.php');
        }
    }else{
        $_SESSION["message"] = "Login Unsuccessful!";
        header('Location: /patient_portal/patient_login.php');
    }
}else{
    $_SESSION["message"] = "Login Unsuccessful!";
    header('Location: /patient_portal/patient_login.php');
}

?>