<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/1/17
 * Time: 2:29 PM
 */

include "../includes/dbFunctions.php";

session_start();

$registerDay = $_POST['register_date'];
$appointmentDay = $_POST['appointment_date'];
$appointmentTime = $_POST['appointment_time'];
$doctor_id = $_POST['doctor_id'];
$patient_id = $_POST['patient_id'];

if(insertAppointment($registerDay, $appointmentDay, $appointmentTime, $patient_id, $doctor_id)){
    $_SESSION["message"] = "Appointment Successfully Add";
    header("Location: /patient_portal/appointments.php");
}else{
    $_SESSION["message"] = "Something went wrong!";
    header("Location: /patient_portal/find_doctors.php");
}

?>