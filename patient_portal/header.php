<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>UI Mock Up</title>

    <link rel="stylesheet" href="../libaries/mdui/css/mdui.css">

    <link rel="stylesheet" href="dashboard_styles.css">
    <script src="../libaries/mdui/js/mdui.js"></script>
    <script src="../libaries/jquery-3.2.1.js"></script>
</head>
<body class="mdui-appbar-with-toolbar mdui-drawer-body-left">
<div class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-cyan">
        <a href="javascript:;" class="mdui-typo-headline">Patient Portal</a>
        <a href="javascript:;" class="mdui-typo-title">Dashboard</a>
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
        <li class="mdui-list-item mdui-ripple"><i class="mdui-list-item-icon mdui-icon material-icons">error</i>

            <div class="mdui-list-item-content">Spam</div>
        </li>
    </ul>
</div>

<div class="mdui-container">