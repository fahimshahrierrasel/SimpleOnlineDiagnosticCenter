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

?>