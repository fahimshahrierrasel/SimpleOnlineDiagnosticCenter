<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>User Portal</title>

    <link rel="stylesheet" href="../libaries/mdui/css/mdui.css">

    <link rel="stylesheet" href="../styles/dashboard_styles.css">
    <script src="../libaries/mdui/js/mdui.js"></script>
    <script src="../libaries/jquery-3.2.1.js"></script>
</head>
<body class="mdui-appbar-with-toolbar mdui-drawer-body-left">
<div class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-cyan">
        <a href="javascript:;" class="mdui-typo-headline" id="dashboard_title"></a>
        <a href="javascript:;" class="mdui-typo-title" id="dashboard_file"></a>
        <div class="mdui-toolbar-spacer"></div>
        <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-menu="{target: '#example-1'}"><i class="mdui-icon material-icons">more_vert</i></a>
        <ul class="mdui-menu" id="example-1">
            <li class="mdui-menu-item">
                <a href="javascript:;" class="mdui-ripple">Profile</a>
            </li>
            <li class="mdui-menu-item">
                <a href="javascript:;" class="mdui-ripple">Settings</a>
            </li>
            <li class="mdui-divider"></li>
            <li class="mdui-menu-item">
                <a href="javascript:;" class="mdui-ripple">Sign out</a>
            </li>
        </ul>
    </div>

</div>

<div class="mdui-drawer mdui-shadow-5" id="drawer">
    <ul class="mdui-list">
        <li class="mdui-list-item">

            <div class="mdui-list-item-content" style="min-height: 150px;">
                <div>
                    <img class="circular--square" style="width: 100px;" src="../images/avatar.png" alt="" />
                    <br>
                    <h3 class="mdui-float-left">Username</h3>
                </div>
            </div>
        </li>