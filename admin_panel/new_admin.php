<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/24/17
 * Time: 10:00 PM
 */
include "../includes/dbFunctions.php";
session_start();
$user['fname'] = $_POST['fname'];
$user['username'] = $_POST['username'];
$user['email'] = $_POST['email'];
$user['password'] = $_POST['rpassword'];
$user['user_type'] = 'Admin';
$verificationCode= $_POST['verify_code'];

if(insertNewUser($user)){
    $fetchedUser = findUserByUsernameAndEmail($user);
    if ($verificationCode == "260088") {
        if (insertNewAdmin($user, $fetchedUser)) {
            $_SESSION["message"] = "Registration Successful";
            header("Location: /admin_panel/admin_login.php");
        } else {
            $_SESSION["message"] = "Registration Unsuccessful";
            header("Location: /admin_panel/admin_login.php");
        }
    } else {
        $_SESSION["message"] = "Registration Unsuccessful";
        header("Location: /admin_panel/admin_login.php");
    }
}else{
    $_SESSION["message"] = "Registration Unsuccessful";
    header("Location: /admin_panel/admin_login.php");
}

?>