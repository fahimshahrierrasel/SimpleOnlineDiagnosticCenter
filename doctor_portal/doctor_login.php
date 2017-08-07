<?php
include("../includes/portal_components/headless.php");
$title = "Doctor Login";
session_start();
?>
<script type="text/javascript">
    document.title = "<?=$title;?>"
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<?php
if($_SESSION["message"] != ""){
    echo "<script>mdui.snackbar({message: '".$_SESSION["message"]."', timeout: 5000});</script>";
    $_SESSION["message"] = "";
}
?>

<div class="mdui-card login-card" id="login_card">
    <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
        <div class="mdui-card-primary-title"><?=$title;?></div>
    </div>
    <div class="mdui-card-content">
        <form method="post" action="doctor_auth.php" id="login_form">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Username</label>

                <input class="mdui-textfield-input" type="text" name="username" data-validation="custom" data-validation-regexp="^[a-zA-Z0-9]+(?:[_ -]?[a-zA-Z0-9])*$" data-validation-error-msg="Enter your username correctly!"/>
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Password</label>

                <input class="mdui-textfield-input" type="password" name="password" data-validation="length" data-validation-length="min8" data-validation-error-msg="Minimum 8 characters!"/>
            </div>
            <button class="mdui-btn mdui-ripple mdui-float-right login-register-button" type="submit" name="submit">Login</button>
        </form>
    </div>
    <div class="mdui-card-actions mdui-float-right">

    </div>
</div>
<script type="text/javascript">
    $.validate({
        form: '#login_form',
        modules: 'security',
        onModulesLoaded : function() {
            var optionalConfig = {
                fontSize: '12pt',
                padding: '4px',
                bad: 'Very Bad',
                weak: 'Weak',
                good: 'Good',
                strong: 'Strong'
            };
            $('input[name="rpassword"]').displayPasswordStrength(optionalConfig);
        }
    });
</script>
<?php include"../includes/portal_components/footless.php"; ?>
