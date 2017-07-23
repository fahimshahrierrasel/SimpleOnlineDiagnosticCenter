<?php
include ("../includes/auth_functions.php");

session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: /patient_portal/patient_login.php");
    exit();
} else {}

include("../includes/portal_components/header.php");

?>

<div class="mdui-drawer mdui-shadow-5" id="drawer">
    <ul class="mdui-list">
        <li class="mdui-list-item">

            <div class="mdui-list-item-content" style="min-height: 150px;">
                <div>
                    <img class="circular--square" style="width: 100px;" src="null" alt="Image not found" onerror="this.onerror=null;this.src='../images/avatar.png';" />
                    <br>
                    <h3 class="mdui-float-left"><?php echo $_SESSION['username'] ?></h3>
                </div>
            </div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">move_to_inbox</i>

            <div class="mdui-list-item-content">Inbox</div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">star</i>

            <div class="mdui-list-item-content">Starred</div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">send</i>

            <div class="mdui-list-item-content">Sent mail</div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">drafts</i>

            <div class="mdui-list-item-content">Drafts</div>
        </li>
        <li class="mdui-subheader">Subheader</li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">email</i>

            <div class="mdui-list-item-content">All mail</div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">delete</i>

            <div class="mdui-list-item-content">Trash</div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">account_box</i>
            <div class="mdui-list-item-content" onclick="window.location.href='./patient_profile.php'">Profile</div>
        </li>
    </ul>
</div>

<div class="mdui-container">