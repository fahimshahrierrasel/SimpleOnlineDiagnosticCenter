<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/25/17
 * Time: 4:31 PM
 */

include "../includes/dbFunctions.php";
session_start();
$doctor['fname'] = $_POST['fname'];
$doctor['department'] = $_POST['department'];
$doctor['specialty'] = $_POST['specialty'];
$doctor['degree'] = $_POST['degree'];
$doctor['username'] = $_POST['username'];
$doctor['email'] = $_POST['email'];
$doctor['password'] = $_POST['rpassword'];
$doctor['user_type'] = 'Doctor';

if(insertNewUser($doctor)){
    $fetchedUser = findUserByUsernameAndEmail($doctor);
    if(insertNewDoctor($doctor, $fetchedUser)){
        $_SESSION["message"] = "Doctor Registration Successful";
        header("Location: /admin_panel/doctors.php");
    }else{
        $_SESSION["message"] = "Doctor Registration Unsuccessful";
        header("Location: /admin_panel/doctors.php");
    }
}else{
    $_SESSION["message"] = "Doctor Registration Unsuccessful";
    header("Location: /admin_panel/doctors.php");
}


?>