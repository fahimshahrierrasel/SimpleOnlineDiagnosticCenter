<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/1/17
 * Time: 2:29 PM
 */

include "../includes/dbFunctions.php";
$registerDay = $_POST['register_date'];
$appointmentDay = $_POST['appointment_date'];
$appointmentTime = $_POST['appointment_time'];
$doctor_id = $_POST['doctor_id'];
$patient_id = $_POST['patient_id'];

if(insertAppointment($registerDay, $appointmentDay, $appointmentTime, $patient_id, $doctor_id)){
    header("Location: /patient_portal/appointments.php");
}else{
    echo "<h1>Appointment Unsuccessful</h1><br/><a href='find_doctors.php'>Go to Find Doctor</a>";
}

?>