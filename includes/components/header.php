<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Online Diagnostic Center</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.2.1/css/mdui.min.css">
    <link rel="stylesheet" href="../../styles/main_style.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.2.1/js/mdui.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>

</head>
<body class="mdui-drawer-body-left" style="width: 100%">
<div class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-blue-grey">
        <a href="javascript:;" class="mdui-btn mdui-btn-icon" id="menu_btn"><i class="mdui-icon material-icons">menu</i></a>
        <a href="../../index.php" class="mdui-typo-headline">Online Diagnostic Center</a>
        <div class="mdui-toolbar-spacer"></div>
        <a href="../../index.php" class="mdui-btn appbar-link-text">Home</a>
        <a href="../../find_doctors.php" class="mdui-btn appbar-link-text">Find Doctors</a>
        <a href="../../medical_services.php" class="mdui-btn appbar-link-text">Medical Services</a>
        <a href="../../contact.php" class="mdui-btn appbar-link-text">Contact</a>
        <a href="../../about.php" class="mdui-btn appbar-link-text">About Us</a>
    </div>
</div>
<div class="mdui-drawer mdui-drawer-full-height mdui-shadow-5 mdui-color-white" id="drawer" style="margin-top: 64px;">
    <ul class="mdui-list" mdui-collapse="{accordion: true}">
        <li class="mdui-text-center" style="height: 200px;">
            <img src="../../images/medicine.png" style="height: 150px; margin: 0 auto"/>
            <div class="mdui-typo-subheading-opacity">Online Diagnostic Center</div>
        </li>
        <li class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
            <div class="mdui-list-item-content" id="home_btn">Home</div>
        </li>

        <li class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">people</i>
                <div class="mdui-list-item-content">Services</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <li class="mdui-list-item mdui-ripple" id="find_doctor">Find Doctors</li>
                <li class="mdui-list-item mdui-ripple" id="medical_services">Medical Services</li>
                <li class="mdui-list-item mdui-ripple">Ambulance</li>
            </ul>
        </li>
        <li class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">device_hub</i>
                <div class="mdui-list-item-content">Stuff Area</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <li class="mdui-list-item mdui-ripple" id="admin_panel">Admin Panel</li>
                <li class="mdui-list-item mdui-ripple" id="doctor_portal">Doctor Portal</li>
                <li class="mdui-list-item mdui-ripple" id="pathologist_portal">Pathologist Portal</li>
            </ul>
        </li>

        <li class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">touch_app</i>
                <div class="mdui-list-item-content">Patient</div>
                <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
            </div>
            <ul class="mdui-collapse-item-body mdui-list mdui-list-dense">
                <li class="mdui-list-item mdui-ripple" id="patient_portal">Portal</li>
                <li class="mdui-list-item mdui-ripple">Check Report Status</li>
            </ul>
        </li>
    </ul>
</div>

<div class="mdui-container-fluid" style="width: 100%; height: 100%;">