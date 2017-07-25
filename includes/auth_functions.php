<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/23/17
 * Time: 6:24 PM
 */


function createUserSession($user){
    session_start();
    session_regenerate_id();
    $_SESSION['user_id'] = $user[0];
    $_SESSION['username'] = $user[1];
    $_SESSION['user_type'] = $user[6];
    $_SESSION['last_login'] = time();
    return true;
}

function removeUserSession(){
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['user_type']);
    unset($_SESSION['last_login']);
    session_unset();
    session_destroy();
    return true;
}

function isLoggedIn() {
    session_start();
    return isset($_SESSION['user_id']);
}



?>