<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/23/17
 * Time: 9:21 PM
 */

include 'auth_functions.php';

session_start();
$userType = $_SESSION['user_type'];

removeUserSession();

switch ($userType){
    case "Patient":
        header("Location: /patient_portal/patient_login.php");
        break;
    case "Doctor":
        header("Location: /doctor_portal/doctor_login.php");
        break;
    case "Pathologist":
        header("Location: /pathologist_portal/pathologist_login.php");
        break;
    case "Admin":
        header("Location: /admin_panel/admin_login.php");
        break;
    default:
        header("Location: /index.php");
        break;
}

?>