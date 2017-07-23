<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/23/17
 * Time: 9:21 PM
 */

include 'auth_functions.php';

removeUserSession();

header("Location: /index.php");
?>