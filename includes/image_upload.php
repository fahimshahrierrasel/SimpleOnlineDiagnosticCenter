<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/6/17
 * Time: 4:36 PM
 */

session_start();
include "dbFunctions.php";

$userId = $_SESSION['user_id'];
$userType = $_SESSION['user_type'];


if (getimagesize($_FILES['image']['tmp_name']) != false) {
    $image = addslashes($_FILES['image']['tmp_name']);
    $name = addslashes($_FILES['image']['name']);
    $image = file_get_contents($image);
    $image = base64_encode($image);


    if (uploadUserProfilePic($userId, $image)) {
        $_SESSION["message"] = "Picture Successfully Uploaded";
    } else {
        $_SESSION["message"] = "Upload Unsuccessful";
    }
} else {
    $_SESSION["message"] = "Please Select an image!!";
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
