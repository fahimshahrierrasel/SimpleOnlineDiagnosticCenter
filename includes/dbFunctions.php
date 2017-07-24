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
        $userSql = 'INSERT INTO DiagnosticCenter.User(UserName, Password, Email, Activation) VALUE (?, ?, ?, ?)';
        $userPrepareStmt = $dbConnection->prepare($userSql);
        $userPrepareStmt->bindValue(1, $user['username'], PDO::PARAM_STR);
        $userPrepareStmt->bindValue(2, $user['password'], PDO::PARAM_STR);
        $userPrepareStmt->bindValue(3, $user['email'], PDO::PARAM_STR);
        $userPrepareStmt->bindValue(4, 1, PDO::PARAM_INT);
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
        $patientSql = 'INSERT INTO DiagnosticCenter.Admin(Name, Department, User_idUser) VALUE (?, ?, ?)';
        $patientPrepareStmt = $dbConnection->prepare($patientSql);
        $patientPrepareStmt->bindValue(1, $user['fname'], PDO::PARAM_STR);
        $patientPrepareStmt->bindValue(2, "HR", PDO::PARAM_STR);
        $patientPrepareStmt->bindValue(3, $fetchedUser['idUser'], PDO::PARAM_INT);
        $patientPrepareStmt->execute();
        return true;

    }catch (Exception $exception){
        echo "Error!: " . $exception->getMessage();
        return false;
    }

}

function findUserByUsernameAndEmail($user){
    global $dbConnection;
    try{
        $idSql = 'SELECT * FROM DiagnosticCenter.User WHERE UserName = ? AND Email = ? LIMIT 1';
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $user['username'], PDO::PARAM_STR);
        $idPrepareStmt->bindValue(2, $user['email'], PDO::PARAM_STR);
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
        $idSql = 'SELECT * FROM DiagnosticCenter.User WHERE UserName = ? LIMIT 1';
        $idPrepareStmt = $dbConnection->prepare($idSql);
        $idPrepareStmt->bindValue(1, $user['username'], PDO::PARAM_STR);
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

?>