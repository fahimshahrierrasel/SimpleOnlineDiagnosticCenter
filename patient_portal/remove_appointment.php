<?php
/**
 * Created by PhpStorm.
 * User: Fahim Shahrier Rasel
 * Date: 08-Aug-17
 * Time: 9:08 AM
 */

include "../includes/dbFunctions.php";
session_start();

$appointmentId = $_POST['appointment_id'];
$userType = $_SESSION['user_type'];
if(removerAppointment($appointmentId)){
    $_SESSION['message'] = "Appointment cancel successfully";
    switch ($userType){
        case "Patient":
            header("Location: /patient_portal/appointments.php");
            break;
        case "Doctor":
            header("Location: /doctor_portal/appointments.php");
            break;
    }
}else{
    $_SESSION['message'] = "Appointment can not be cancel";

    switch ($userType){
        case "Patient":
            header("Location: /patient_portal/appointments.php");
            break;
        case "Doctor":
            header("Location: /doctor_portal/appointments.php");
            break;
    }
}
