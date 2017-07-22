<?php
include("../includes/portal_components/headless.php");
$title = "Admin Login"
?>
<script type="text/javascript">
    document.title = "<?=$title;?>"
</script>
<div class="mdui-card login-card" id="login_card">
    <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
        <div class="mdui-card-primary-title"><?=$title;?></div>
    </div>

    <div class="mdui-card-content">
        <form method="post" action="#">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Username</label>

                <input class="mdui-textfield-input" type="text" />
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Password</label>

                <input class="mdui-textfield-input" type="password" />
            </div>
        </form>
    </div>
    <div class="mdui-card-actions mdui-float-right">
        <button class="mdui-btn mdui-ripple" onclick="location.href='dashboard.php'">Login</button>
    </div>
</div>
<?php include("../includes/portal_components/footless.php"); ?>
