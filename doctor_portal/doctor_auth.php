<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/26/17
 * Time: 8:13 PM
 */

include '../includes/dbFunctions.php';
include '../includes/auth_functions.php';

$user['username'] = $_POST['username'];
$user['password'] = $_POST['password'];
$user['user_type'] = 'Doctor';

$fetchedUser = findUserByUsername($user);
$loginErrorMsg = 'Log in was unsuccessful!';
if($fetchedUser){
    if($user['password'] == $fetchedUser['Password']){
        if(createUserSession($fetchedUser)){
            header("Location: /doctor_portal/dashboard.php");
        }else{
            header("Location: /doctor_portal/doctor_login.php");
        }
    }else{
        header("Location: /doctor_portal/doctor_login.php");
    }
}else{
    header("Location: /doctor_portal/doctor_login.php");
}

?>