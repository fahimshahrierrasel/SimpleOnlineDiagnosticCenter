<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/29/17
 * Time: 10:43 AM
 */
session_start();
include "../includes/dbFunctions.php";

$doctor['weekday'] = $_POST['weekday'];
$doctor['time'] = $_POST['time'];
$idUser = $_SESSION['user_id'];



$fetchedDoctor = findDoctorByUserId($idUser);
if($fetchedDoctor) {
    insertDoctorSchedule($doctor, $fetchedDoctor);
    $_SESSION["message"] = "Schedule Successfully Add";
    header("Location: /doctor_portal/schedules.php");
    exit();
}else{
    $_SESSION["message"] = "Something went wrong!";
    header("Location: /doctor_portal/schedules.php");
    exit();
}


?>