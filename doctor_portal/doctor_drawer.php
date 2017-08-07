<?php
include "../includes/auth_functions.php";
include "../includes/dbFunctions.php";
session_start();


if(isLoggedIn()) {
    if($_SESSION['user_type'] != "Doctor"){
        header("Location: /doctor_portal/doctor_login.php");
        exit();
    }
} else {
    header("Location: /doctor_portal/doctor_login.php");
    exit();
}

include "../includes/portal_components/header.php";
$tempUser['username'] = $_SESSION['username'];
$tempUser['user_type'] = 'Doctor';
$user = findUserByUsername($tempUser);
?>

<?php
if($_SESSION["message"] != ""){
    echo "<script>mdui.snackbar({message: '".$_SESSION["message"]."', timeout: 5000});</script>";
    $_SESSION["message"] = "";
}
?>

<div class="mdui-drawer mdui-shadow-5" id="drawer">
    <ul class="mdui-list">
        <li class="mdui-list-item">

            <div class="mdui-list-item-content" style="min-height: 150px;">
                <div>
                    <?php echo'<img class="circular--square" style="width: 100px;" src="data:image/jpeg;base64,'.base64_encode( $user['Image'] ).'" alt="Image not found" onerror="this.onerror=null;this.src=\'../images/doctor.png\';" />'?>
                    <br>
                    <h3 class="mdui-float-left"><?php echo $user['UserName'] ?></h3>
                </div>
            </div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">home</i>
            <div class="mdui-list-item-content" onclick="location.href='dashboard.php'">Dashboard</div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">move_to_inbox</i>
            <div class="mdui-list-item-content" onclick="location.href='schedules.php'">My Schedules</div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">star</i>

            <div class="mdui-list-item-content" onclick="location.href='appointments.php'">All Appointments</div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">send</i>

            <div class="mdui-list-item-content" onclick="location.href='doctor_prescriptions.php'">Write Prescription</div>
        </li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">drafts</i>

            <div class="mdui-list-item-content" onclick="location.href='all_prescriptions.php'">All Prescriptions</div>
        </li>
        <li class="mdui-subheader">Subheader</li>
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">error</i>

            <div class="mdui-list-item-content" onclick="location.href='doctor_profile.php'">Profile</div>
        </li>
    </ul>
</div>

<div class="mdui-container">