<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/24/17
 * Time: 10:00 PM
 */
include "../includes/dbFunctions.php";

$user['fname'] = $_POST['fname'];
$user['username'] = $_POST['username'];
$user['email'] = $_POST['email'];
$user['password'] = $_POST['rpassword'];
$user['user_type'] = 'Admin';
$verificationCode= $_POST['verify_code'];

if(insertNewUser($user)){
    $fetchedUser = findUserByUsernameAndEmail($user);
    if ($verificationCode == "260088") {
        if (insertNewAdmin($user, $fetchedUser)) {
            echo "<h1>Account Successfully Created!<br /><a href='admin_login.php'>Login Now</a> </h1>";
        } else {
            echo "<h1>Registration Failed!<br /><a href='admin_login.php'>Register Again</a> </h1>";
        }
    } else {
        echo "<h1>Verification Failed!<br /><a href='admin_login.php'>Register Again</a> </h1>";
    }
}else{
    echo "<h1>Registration Failed!<br /><a href='admin_login.php'>Register Again</a> </h1>";
}

?>