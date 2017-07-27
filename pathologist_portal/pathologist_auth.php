<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/27/17
 * Time: 6:31 PM
 */

include '../includes/dbFunctions.php';
include '../includes/auth_functions.php';

$user['username'] = $_POST['username'];
$user['password'] = $_POST['password'];
$user['user_type'] = 'Pathologist';

$fetchedUser = findUserByUsername($user);
$loginErrorMsg = 'Log in was unsuccessful!';
if($fetchedUser){
    if($user['password'] == $fetchedUser['Password']){
        if(createUserSession($fetchedUser)){
            header("Location: /pathologist_portal/dashboard.php");
        }else{
            header("Location: /pathologist_portal/pathologist_login.php");
        }
    }else{
        header("Location: /pathologist_portal/pathologist_login.php");
    }
}else{
    header("Location: /pathologist_portal/pathologist_login.php");
}

?>