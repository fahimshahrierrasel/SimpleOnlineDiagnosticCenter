<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/22/17
 * Time: 5:59 PM
 */
include 'dbconfigurations/connection.php';

function insertNewUser($user){
    global $dbConnection;
    try{
        $userSql = 'INSERT INTO DiagnosticCenter.User(UserName, Password, Email, Activation, UserType) VALUE (?, ?, ?, ?, ?)';
        $userPrepareStmt = $dbConnection->prepare($userSql);
        $userPrepareStmt->bindValue(1, $user['username'], PDO::PARAM_STR);
        $userPrepareStmt->bindValue(2, $user['password'], PDO::PARAM_STR);
        $userPrepareStmt->bindValue(3, $user['email'], PDO::PARAM_STR);
        $userPrepareStmt->bindValue(4, 1, PDO::PARAM_INT);
        $userPrepareStmt->bindValue(5, $user['user_type'], PDO::PARAM_STR);
        $userPrepareStmt->execute();
        return true;
    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }
}

function insertNewPatient($user, $fetchedUser){
    global $dbConnection;

    try{
        $patientSql = 'INSERT INTO DiagnosticCenter.Patient(Name, Sex, User_idUser) VALUE (?, ?, ?)';
        $patientPrepareStmt = $dbConnection->prepare($patientSql);
        $patientPrepareStmt->bindValue(1, $user['fname'], PDO::PARAM_STR);
        $patientPrepareStmt->bindValue(2, $user['sex'], PDO::PARAM_STR);
        $patientPrepareStmt->bindValue(3, $fetchedUser['idUser'], PDO::PARAM_INT);
        $patientPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }

}

function insertNewAdmin($user, $fetchedUser){
    global $dbConnection;

    try{
        $adminSql = 'INSERT INTO DiagnosticCenter.Admin(Name, Department, User_idUser) VALUE (?, ?, ?)';
        $adminPrepareStmt = $dbConnection->prepare($adminSql);
        $adminPrepareStmt->bindValue(1, $user['fname'], PDO::PARAM_STR);
        $adminPrepareStmt->bindValue(2, "HR", PDO::PARAM_STR);
        $adminPrepareStmt->bindValue(3, $fetchedUser['idUser'], PDO::PARAM_INT);
        $adminPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }

}

function insertNewDoctor($user, $fetchedUser){
    global $dbConnection;

    try{
        $doctorSql = 'INSERT INTO DiagnosticCenter.Doctor(Name, Department, Specialty, Degree, User_idUser) VALUE (?, ?, ?, ?, ?)';
        $doctorPrepareStmt = $dbConnection->prepare($doctorSql);
        $doctorPrepareStmt->bindValue(1, $user['fname'], PDO::PARAM_STR);
        $doctorPrepareStmt->bindValue(2, $user['department'], PDO::PARAM_STR);
        $doctorPrepareStmt->bindValue(3, $user['specialty'], PDO::PARAM_STR);
        $doctorPrepareStmt->bindValue(4, $user['degree'], PDO::PARAM_STR);
        $doctorPrepareStmt->bindValue(5, $fetchedUser['idUser'], PDO::PARAM_INT);
        $doctorPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }

}



function insertDoctorSchedule($user, $fetchedDoctor){
    global $dbConnection;

    try{
        $appointTableSql = 'INSERT INTO DiagnosticCenter.AppointmentTimeTable(VisitingDay, VisitingTime, Doctor_idDoctor) VALUE (?, ?, ?)';
        $appointTablePrepareStmt = $dbConnection->prepare($appointTableSql);
        $appointTablePrepareStmt->bindValue(1, $user['weekday'], PDO::PARAM_STR);
        $appointTablePrepareStmt->bindValue(2, $user['time'], PDO::PARAM_STR);
        $appointTablePrepareStmt->bindValue(3, $fetchedDoctor['idDoctor'], PDO::PARAM_STR);
        $appointTablePrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }

}

function insertNewPathologist($user, $fetchedUser){
    global $dbConnection;

    try{
        $pathologistSql = 'INSERT INTO DiagnosticCenter.Pathologist(Name, Department, Speciality, User_idUser) VALUE (?, ?, ?, ?)';
        $pathologistPrepareStmt = $dbConnection->prepare($pathologistSql);
        $pathologistPrepareStmt->bindValue(1, $user['fname'], PDO::PARAM_STR);
        $pathologistPrepareStmt->bindValue(2, $user['department'], PDO::PARAM_STR);
        $pathologistPrepareStmt->bindValue(3, $user['speciality'], PDO::PARAM_STR);
        $pathologistPrepareStmt->bindValue(4, $fetchedUser['idUser'], PDO::PARAM_INT);
        $pathologistPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }

}


function insertAppointment($registerDate, $appointmentDate, $appointmentTime, $patientId, $doctorId){
    global $dbConnection;
    try{
        $appointmentSql = 'INSERT INTO DiagnosticCenter.Appointment(RegistrationDate, AppointmentDate, AppointmentTime, Patient_idPatient, Doctor_idDoctor) VALUE (STR_TO_DATE(?, \'%d-%m-%y\'), STR_TO_DATE(?, \'%d-%m-%y\'), ?, ?, ?)';
        $appointmentPrepareStmt = $dbConnection->prepare($appointmentSql);
        $appointmentPrepareStmt->bindValue(1, $registerDate, PDO::PARAM_STR);
        $appointmentPrepareStmt->bindValue(2, $appointmentDate, PDO::PARAM_STR);
        $appointmentPrepareStmt->bindValue(3, $appointmentTime, PDO::PARAM_STR);
        $appointmentPrepareStmt->bindValue(4, $patientId, PDO::PARAM_INT);
        $appointmentPrepareStmt->bindValue(5, $doctorId, PDO::PARAM_INT);
        $appointmentPrepareStmt->execute();
        return true;
    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }
}


function insertPrescription($prescribedDate, $symptom, $patientId, $doctorId){
    global $dbConnection;
    try{
        $prescriptionSql = 'INSERT INTO DiagnosticCenter.Prescription(Date, Problem, Patient_idPatient, Doctor_idDoctor) VALUE (STR_TO_DATE(?, \'%d-%m-%y\'), ?, ?, ?)';
        $prescriptionPrepareStmt = $dbConnection->prepare($prescriptionSql);
        $prescriptionPrepareStmt->bindValue(1, $prescribedDate, PDO::PARAM_STR);
        $prescriptionPrepareStmt->bindValue(2, $symptom, PDO::PARAM_STR);
        $prescriptionPrepareStmt->bindValue(3, $patientId, PDO::PARAM_INT);
        $prescriptionPrepareStmt->bindValue(4, $doctorId, PDO::PARAM_INT);
        $prescriptionPrepareStmt->execute();
        return true;
    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }
}

function insertMedicine($medicineName, $dosage, $medicineUse, $prescriptionId, $patientId, $doctorId){
    global $dbConnection;
    try{
        $medicineSql = 'INSERT INTO DiagnosticCenter.prescribedmedicine(Medicine, Dosage, `Use`, Prescription_idPrescription, Prescription_Patient_idPatient, Prescription_Doctor_idDoctor) VALUE (?, ?, ?, ?, ?, ?)';
        $medicinePrepareStmt = $dbConnection->prepare($medicineSql);
        $medicinePrepareStmt->bindValue(1, $medicineName, PDO::PARAM_STR);
        $medicinePrepareStmt->bindValue(2, $dosage, PDO::PARAM_STR);
        $medicinePrepareStmt->bindValue(3, $medicineUse, PDO::PARAM_STR);
        $medicinePrepareStmt->bindValue(4, $prescriptionId, PDO::PARAM_INT);
        $medicinePrepareStmt->bindValue(5, $patientId, PDO::PARAM_INT);
        $medicinePrepareStmt->bindValue(6, $doctorId, PDO::PARAM_INT);
        $medicinePrepareStmt->execute();
        return true;
    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }
}

function findPatientByUserId($userId){
    global $dbConnection;

    try{
        $patientSql = 'SELECT * FROM DiagnosticCenter.Patient WHERE User_idUser = ? LIMIT 1';
        $patientPrepareStmt = $dbConnection->prepare($patientSql);
        $patientPrepareStmt->bindValue(1,$userId, PDO::PARAM_INT);
        $patientPrepareStmt->execute();
        $fetchedPatient = $patientPrepareStmt->fetchAll();
        return $fetchedPatient[0];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }
}

function findPatientIdByUserId($userId){
    global $dbConnection;

    try{
        $patientSql = 'SELECT * FROM DiagnosticCenter.Patient WHERE User_idUser = ? LIMIT 1';
        $patientPrepareStmt = $dbConnection->prepare($patientSql);
        $patientPrepareStmt->bindValue(1,$userId, PDO::PARAM_INT);
        $patientPrepareStmt->execute();
        $fetchedPatient = $patientPrepareStmt->fetchAll();
        return $fetchedPatient[0]['idPatient'];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }
}

function findUserByUsernameAndEmail($user){
    global $dbConnection;
    try{
        $idSql = 'SELECT * FROM DiagnosticCenter.User WHERE UserName = ? AND Email = ? AND UserType = ? LIMIT 1';
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $user['username'], PDO::PARAM_STR);
        $idPrepareStmt->bindValue(2, $user['email'], PDO::PARAM_STR);
        $idPrepareStmt->bindValue(3, $user['user_type'], PDO::PARAM_STR);
        $idPrepareStmt->execute();
        $fetchedUser = $idPrepareStmt->fetchAll();
        return $fetchedUser[0];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}
function findUserByUsername($user){
    global $dbConnection;
    try{
        $idSql = 'SELECT * FROM DiagnosticCenter.User WHERE UserName = ? AND UserType = ? LIMIT 1';
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $user['username'], PDO::PARAM_STR);
        $idPrepareStmt->bindValue(2, $user['user_type'], PDO::PARAM_STR);
        $idPrepareStmt->execute();
        $fetchedUser = $idPrepareStmt->fetchAll();
        return $fetchedUser[0];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function findUserById($id){
    global $dbConnection;
    try{
        $idSql = 'SELECT * FROM DiagnosticCenter.User WHERE idUser = ? LIMIT 1';
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $id, PDO::PARAM_INT);
        $idPrepareStmt->execute();
        $fetchedUser = $idPrepareStmt->fetchAll();
        return $fetchedUser[0];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function findPathologistByUserId($userId){
    global $dbConnection;
    try{
        $pathologistSql = 'SELECT * FROM DiagnosticCenter.Pathologist WHERE User_idUser = ? LIMIT 1';
        $pathologistPrepareStmt = $dbConnection->prepare($pathologistSql);
        $pathologistPrepareStmt->bindValue(1, $userId, PDO::PARAM_INT);
        $pathologistPrepareStmt->execute();
        $fetchedPathologist = $pathologistPrepareStmt->fetchAll();
        return $fetchedPathologist[0];
    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function findAdminByUserId($userID){
    global $dbConnection;

    try{
        $appointTableSql = 'SELECT * FROM DiagnosticCenter.Admin WHERE User_idUser = ? LIMIT 1';
        $appointTablePrepareStmt = $dbConnection->prepare($appointTableSql);
        $appointTablePrepareStmt->bindValue(1, $userID, PDO::PARAM_INT);
        $appointTablePrepareStmt->execute();
        $fetchedDoctor = $appointTablePrepareStmt->fetchAll();
        return $fetchedDoctor[0];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }
}

function findDoctorByUserId($userID){
    global $dbConnection;

    try{
        $appointTableSql = 'SELECT * FROM DiagnosticCenter.Doctor WHERE User_idUser = ? LIMIT 1';
        $appointTablePrepareStmt = $dbConnection->prepare($appointTableSql);
        $appointTablePrepareStmt->bindValue(1, $userID, PDO::PARAM_INT);
        $appointTablePrepareStmt->execute();
        $fetchedDoctor = $appointTablePrepareStmt->fetchAll();
        return $fetchedDoctor[0];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }
}

function findDoctorByDoctorId($doctorId){
    global $dbConnection;

    try{
        $appointTableSql = 'SELECT * FROM DiagnosticCenter.Doctor WHERE idDoctor = ? LIMIT 1';
        $appointTablePrepareStmt = $dbConnection->prepare($appointTableSql);
        $appointTablePrepareStmt->bindValue(1, $doctorId, PDO::PARAM_INT);
        $appointTablePrepareStmt->execute();
        $fetchedDoctor = $appointTablePrepareStmt->fetchAll();
        return $fetchedDoctor[0];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }
}


function getAllPatients(){
    global $dbConnection;
    try{
        $doctorSql = 'SELECT * FROM DiagnosticCenter.Patient';
        $doctorPrepareStmt = $dbConnection->prepare($doctorSql);
        $doctorPrepareStmt->execute();
        $fetchedDoctor = $doctorPrepareStmt->fetchAll();
        return $fetchedDoctor;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getAllDoctors(){
    global $dbConnection;
    try{
        $doctorSql = 'SELECT * FROM DiagnosticCenter.Doctor';
        $doctorPrepareStmt = $dbConnection->prepare($doctorSql);
        $doctorPrepareStmt->execute();
        $fetchedDoctor = $doctorPrepareStmt->fetchAll();
        return $fetchedDoctor;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getDoctorAppointmentTable($doctor){
    global $dbConnection;
    try{
        $tableSql = 'SELECT * FROM DiagnosticCenter.AppointmentTimeTable WHERE Doctor_idDoctor = ?';
        $tablePrepareStmt = $dbConnection->prepare($tableSql);
        $tablePrepareStmt->bindValue(1, $doctor['idDoctor'], PDO::PARAM_INT);
        $tablePrepareStmt->execute();
        $fetchedTable = $tablePrepareStmt->fetchAll();
        return $fetchedTable;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getAllDoctorsByDepartment($deparment){
    global $dbConnection;
    try{
        $doctorSql = 'SELECT * FROM DiagnosticCenter.Doctor WHERE Department = ?';
        $doctorPrepareStmt = $dbConnection->prepare($doctorSql);
        $doctorPrepareStmt->bindValue(1,$deparment, PDO::PARAM_STR);
        $doctorPrepareStmt->execute();
        $fetchedDoctor = $doctorPrepareStmt->fetchAll();
        return $fetchedDoctor;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getAllPathologist(){
    global $dbConnection;
    try{
        $pathologistSql = 'SELECT * FROM DiagnosticCenter.Pathologist';
        $pathologistPrepareStmt = $dbConnection->prepare($pathologistSql);
        $pathologistPrepareStmt->execute();
        $fetchedPathologist = $pathologistPrepareStmt->fetchAll();
        return $fetchedPathologist;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getPatientAppointments($patientId){
    global $dbConnection;
    try{
        $appointmentSql = 'Select Appointment.idAppointment, Doctor.Name, Appointment.RegistrationDate, Appointment.AppointmentDate, Appointment.AppointmentTime
                          from DiagnosticCenter.Doctor, DiagnosticCenter.Appointment
                          Where Appointment.Doctor_idDoctor = Doctor.idDoctor and Appointment.Patient_idPatient = ?';
        $appointmentPrepareStmt = $dbConnection->prepare($appointmentSql);
        $appointmentPrepareStmt->bindValue(1, $patientId, PDO::PARAM_INT);
        $appointmentPrepareStmt->execute();
        $fetchedAppoints = $appointmentPrepareStmt->fetchAll();
        return $fetchedAppoints;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getDoctorAppointments($doctorId){
    global $dbConnection;
    try{
        $appointmentSql = 'Select Appointment.idAppointment, Patient.Name, Patient.idPatient, Appointment.RegistrationDate, Appointment.AppointmentDate, Appointment.AppointmentTime
                          from DiagnosticCenter.Patient, DiagnosticCenter.Appointment
                          Where Appointment.Patient_idPatient = Patient.idPatient and Appointment.Doctor_idDoctor = ?';
        $appointmentPrepareStmt = $dbConnection->prepare($appointmentSql);
        $appointmentPrepareStmt->bindValue(1, $doctorId, PDO::PARAM_INT);
        $appointmentPrepareStmt->execute();
        $fetchedAppoints = $appointmentPrepareStmt->fetchAll();
        return $fetchedAppoints;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getPrescriptionId($patientId, $doctorId, $prescribedDate){
    global $dbConnection;
    try{
        $appointmentSql = 'Select idPrescription From DiagnosticCenter.Prescription Where Patient_idPatient = ? and Doctor_idDoctor = ? and Date = STR_TO_DATE(?, \'%d-%m-%y\') LIMIT 1';
        $appointmentPrepareStmt = $dbConnection->prepare($appointmentSql);
        $appointmentPrepareStmt->bindValue(1, $patientId, PDO::PARAM_INT);
        $appointmentPrepareStmt->bindValue(2, $doctorId, PDO::PARAM_INT);
        $appointmentPrepareStmt->bindValue(3, $prescribedDate, PDO::PARAM_STR);
        $appointmentPrepareStmt->execute();
        $fetchedAppoints = $appointmentPrepareStmt->fetchAll();
        return $fetchedAppoints[0];

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getPrescriptionsByPatientId($patientId){
    global $dbConnection;
    try{
        $prescriptionSql = 'SELECT * FROM DiagnosticCenter.Prescription, DiagnosticCenter.Doctor WHERE idDoctor=Prescription.Doctor_idDoctor AND Patient_idPatient = ?';
        $prescriptionPrepareStmt = $dbConnection->prepare($prescriptionSql);
        $prescriptionPrepareStmt->bindValue(1, $patientId, PDO::PARAM_INT);
        $prescriptionPrepareStmt->execute();
        $fetchedPrescription = $prescriptionPrepareStmt->fetchAll();
        return $fetchedPrescription;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getPrescriptionsByDoctorId($doctorId){
    global $dbConnection;
    try{
        $prescriptionSql = 'SELECT * FROM DiagnosticCenter.Prescription, DiagnosticCenter.Patient WHERE idPatient=Prescription.Patient_idPatient AND Doctor_idDoctor = ?';
        $prescriptionPrepareStmt = $dbConnection->prepare($prescriptionSql);
        $prescriptionPrepareStmt->bindValue(1, $doctorId, PDO::PARAM_INT);
        $prescriptionPrepareStmt->execute();
        $fetchedPrescription = $prescriptionPrepareStmt->fetchAll();
        return $fetchedPrescription;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function getPrescribedMedicine($prescriptionId){
    global $dbConnection;
    try{
        $medicineSql = 'SELECT * FROM DiagnosticCenter.PrescribedMedicine WHERE Prescription_idPrescription = ?';
        $prescribedMedicinePrepareStmt = $dbConnection->prepare($medicineSql);
        $prescribedMedicinePrepareStmt->bindValue(1, $prescriptionId, PDO::PARAM_INT);
        $prescribedMedicinePrepareStmt->execute();
        $fetchedPrescription = $prescribedMedicinePrepareStmt->fetchAll();
        return $fetchedPrescription;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function uploadUserProfilePic($id, $image){
    global $dbConnection;
    try{
        $idSql = "UPDATE DiagnosticCenter.User SET Image = ? WHERE idUser = ?";
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $image, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(2, $id, PDO::PARAM_INT);
        $idPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function updateUserPassword($userId, $password){
    global $dbConnection;
    try{
        $idSql = "UPDATE DiagnosticCenter.User SET Password = ? WHERE idUser = ?";
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $password, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(2, $userId, PDO::PARAM_INT);
        $idPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function updatePatientInformation($patientId, $fullName, $bloodGroup, $dOB, $mobileNumber, $address){
    global $dbConnection;
    try{
        $idSql = "UPDATE DiagnosticCenter.Patient SET Name = ?, BloodGroup = ?, DateOfBirth = STR_TO_DATE(?, '%d-%m-%y'), MobileNo = ?, Address = ? WHERE idPatient = ?";
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $fullName, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(2, $bloodGroup, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(3, $dOB, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(4, $mobileNumber, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(5, $address, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(6, $patientId, PDO::PARAM_INT);
        $idPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function updatePathologistInformation($pathologistId, $fullName, $department, $specialty){
    global $dbConnection;
    try{
        $idSql = "UPDATE DiagnosticCenter.Pathologist SET Name = ?, Department = ?, Speciality = ? WHERE idPathologist = ?";
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $fullName, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(2, $department, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(3, $specialty, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(4, $pathologistId, PDO::PARAM_INT);
        $idPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}


function updateDoctorInformation($doctorId, $fullName, $department, $speciality, $degree){
    global $dbConnection;
    try{
        $idSql = "UPDATE DiagnosticCenter.Doctor SET Name = ?, Department = ?, Specialty = ?, Degree = ? WHERE idDoctor = ?";
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $fullName, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(2, $department, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(3, $speciality, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(4, $degree, PDO::PARAM_STR);
        $idPrepareStmt->bindValue(5, $doctorId, PDO::PARAM_INT);
        $idPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

function removerAppointment($appointmentId){
    global $dbConnection;
    try{
        $idSql = "DELETE FROM DiagnosticCenter.Appointment WHERE idAppointment = ?";
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $appointmentId, PDO::PARAM_INT);
        $idPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return null;
    }
}

?>