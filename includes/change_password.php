<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/6/17
 * Time: 9:39 PM
 */

include "dbFunctions.php";
session_start();
$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];
$currentPassword = $_POST['current_password'];
$newPassword = $_POST['new_password'];

$fetchedUser = findUserById($userId);

if($fetchedUser['Password'] == $currentPassword){
    updateUserPassword($userId, $newPassword);
}else{
    $_SESSION["message"] = "Password did mot matched";
}

switch ($userType){
    case "Patient":
        header("Location: /patient_portal/patient_profile.php");
        break;
    case "Doctor":
        header("Location: /doctor_portal/doctor_profile.php");
        break;
    case "Pathologist":
        header("Location: /pathologist_portal/pathologist_profile.php");
        break;
    case "Admin":
        header("Location: /admin_panel/admin_profile.php");
        break;
    default:
        header("Location: index.php");
        break;
}