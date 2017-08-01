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

function findDoctorIdByUserId($userID){
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
        $appointmentSql = 'Select Doctor.Name, Appointment.RegistrationDate, Appointment.AppointmentDate, Appointment.AppointmentTime
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
        $appointmentSql = 'Select Patient.Name, Appointment.RegistrationDate, Appointment.AppointmentDate, Appointment.AppointmentTime
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
?>