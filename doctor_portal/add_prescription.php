<?php
/**
 * Created by PhpStorm.
 * User: Fahim Shahrier Rasel
 * Date: 03-Aug-17
 * Time: 1:12 PM
 */
include "../includes/dbFunctions.php";

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
        header("Location: /doctor_portal/doctor_prescriptions.php");
    }else{
        echo "Prescription ID Not Found! And the ID is ".$prescriptionId;
    }
}else{
    echo "Prescription Not Add";
}
?>
