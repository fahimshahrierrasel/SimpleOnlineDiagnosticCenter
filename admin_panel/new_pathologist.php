<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/27/17
 * Time: 4:44 PM
 */

include "../includes/dbFunctions.php";
session_start();

$pathologist['fname'] = $_POST['fname'];
$pathologist['department'] = $_POST['department'];
$pathologist['speciality'] = $_POST['speciality'];
$pathologist['username'] = $_POST['username'];
$pathologist['email'] = $_POST['email'];
$pathologist['password'] = $_POST['rpassword'];
$pathologist['user_type'] = 'Pathologist';

if(insertNewUser($pathologist)){
    $fetchedUser = findUserByUsernameAndEmail($pathologist);
    if(insertNewPathologist($pathologist, $fetchedUser)){
        $_SESSION["message"] = "Pathologist Registration Successful";
        header("Location: /admin_panel/pathologists.php");
    }else{
        $_SESSION["message"] = "Pathologist Registration Unsuccessful";
        header("Location: /admin_panel/pathologists.php");
    }
}else{
    $_SESSION["message"] = "Pathologist Registration Unsuccessful";
    header("Location: /admin_panel/pathologists.php");
}

?>