<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/21/17
 * Time: 7:53 PM
 */

include "../includes/dbFunctions.php";
session_start();

$user['fname'] = $_POST['fname'];
$user['sex'] = $_POST['sex'];
$user['username'] = $_POST['username'];
$user['email'] = $_POST['email'];
$user['password'] = $_POST['rpassword'];
$user['user_type'] = 'Patient';
if(insertNewUser($user)){
    $fetchedUser = findUserByUsernameAndEmail($user);
    if(insertNewPatient($user, $fetchedUser)){
        $_SESSION["message"] = "Registration Successful";
        header("Location: /patient_portal/patient_login.php");
    }else{
        $_SESSION["message"] = "Registration Unsuccessful";
        header("Location: /patient_portal/patient_login.php");
    }
}else{
    $_SESSION["message"] = "Registration Unsuccessful";
    header("Location: /patient_portal/patient_login.php");
}
?>
