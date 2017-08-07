<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/8/17
 * Time: 1:37 AM
 */

include "../includes/dbFunctions.php";
session_start();

$doctor = findDoctorByUserId($_SESSION['user_id']);


$fullName = $_POST['fname'];
$department = $_POST['department'];
$speciality = $_POST['specialty'];
$degree = $_POST['degree'];

if(updateDoctorInformation($doctor['idDoctor'], $fullName, $department, $speciality, $degree)){
    $_SESSION['message'] = "Update successfully applied";
    header("Location: /doctor_portal/doctor_profile.php");
}else{
    $_SESSION['message'] = "Update Unsuccessful";
    header("Location: /doctor_portal/doctor_profile.php");
}