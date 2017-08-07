<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/7/17
 * Time: 8:56 PM
 */


include "../includes/dbFunctions.php";
session_start();
date_default_timezone_set('Asia/Dhaka');
$patientId = findPatientIdByUserId($_SESSION['user_id']);

$fullName = $_POST['fname'];
$bloodGroup = $_POST['blood_group'];
$dOB = date("d-m-yy", strtotime($_POST['dob']));
$mobileNumber = $_POST['mobile_number'];
$address = $_POST['address'];

if(updatePatientInformation($patientId,$fullName,$bloodGroup,$dOB,$mobileNumber,$address)){
    $_SESSION['message'] = "Update successfully applied".$dOB;
    header("Location: /patient_portal/patient_profile.php");
}else{
    $_SESSION['message'] = "Update Unsuccessful".$dOB;
    header("Location: /patient_portal/patient_profile.php");
}

