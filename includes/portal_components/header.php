<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>User Portal</title>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/mdui/0.2.1/css/mdui.min.css">

    <link rel="stylesheet" href="../../styles/dashboard_styles.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/mdui/0.2.1/js/mdui.min.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
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
                <a href="/includes/logout.php" class="mdui-ripple">Sign out</a>
            </li>
        </ul>
    </div>

</div>
