<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/7/17
 * Time: 9:50 PM
 */

include "../includes/dbFunctions.php";
session_start();

$pathologist = findPathologistByUserId($_SESSION['user_id']);


$fullName = $_POST['fname'];
$department = $_POST['department'];
$speciality = $_POST['speciality'];

if(updatePathologistInformation($pathologist['idPathologist'], $fullName, $department, $speciality)){
    $_SESSION['message'] = "Update successfully applied";
    header("Location: /pathologist_portal/pathologist_profile.php");
}else{
    $_SESSION['message'] = "Update Unsuccessful";
    header("Location: /pathologist_portal/pathologist_profile.php");
}