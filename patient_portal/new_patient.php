<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/21/17
 * Time: 7:53 PM
 */

include "../includes/dbFunctions.php";

$user['fname'] = $_POST['fname'];
$user['sex'] = $_POST['sex'];
$user['username'] = $_POST['username'];
$user['email'] = $_POST['email'];
$user['password'] = $_POST['rpassword'];
$user['user_type'] = 'Patient';
if(insertNewUser($user)){
    $fetchedUser = findUserByUsernameAndEmail($user);
    if(insertNewPatient($user, $fetchedUser)){
        echo "<h1>Account Successfully Created!<br /><a href='patient_login.php'>Login Now</a> </h1>";
    }else{
        echo "<h1>Registration Failed!<br /><a href='patient_login.php'>Register Again</a> </h1>";
    }
}else{
    echo "<h1>Registration Failed!<br /><a href='patient_login.php'>Register Again</a> </h1>";
}
?>
