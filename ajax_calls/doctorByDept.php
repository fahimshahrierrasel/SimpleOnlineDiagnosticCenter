<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/28/17
 * Time: 4:00 PM
 */
include "../includes/dbFunctions.php";
$department = $_POST['department'];

$fetchedDoctor = getAllDoctorsByDepartment($department);

echo json_encode($fetchedDoctor);


?>