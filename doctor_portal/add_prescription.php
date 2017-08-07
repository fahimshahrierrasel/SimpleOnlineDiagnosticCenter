<?php
/**
 * Created by PhpStorm.
 * User: Fahim Shahrier Rasel
 * Date: 03-Aug-17
 * Time: 1:12 PM
 */
include "../includes/dbFunctions.php";
session_start();
$patientId = $_POST['patient_id'];
$doctorId = $_POST['doctor_id'];
$prescribedDate = $_POST['prescribed_date'];
$symptom = $_POST['symptom'];
$allMedicine = json_decode($_POST['all_medicine'], true);
if(insertPrescription($prescribedDate, $symptom, $patientId, $doctorId))
{
    sleep(1);
    $prescriptionId = getPrescriptionId($patientId,$doctorId,$prescribedDate);
    if($prescriptionId['idPrescription'] != null){
        foreach ($allMedicine as $medicine){

            insertMedicine($medicine['Name'], $medicine['Dosage'], $medicine['Use'], $prescriptionId['idPrescription'], $patientId, $doctorId);
            sleep(1);
        }
        $_SESSION["message"] = "Prescription Successfully Add";
        header("Location: /doctor_portal/doctor_prescriptions.php");
    }else{
        $_SESSION["message"] = "Something went wrong";
        header("Location: /doctor_portal/doctor_prescriptions.php");
    }
}else{
    $_SESSION["message"] = "Prescription did not add!";
    header("Location: /doctor_portal/doctor_prescriptions.php");
}
?>
