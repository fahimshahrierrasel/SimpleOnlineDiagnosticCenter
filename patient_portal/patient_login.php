<?php
include("../includes/portal_components/headless.php");
session_start();
$title = "Patient Login";

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
        <form method="post" action="patient_auth.php" id="login_form">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Username</label>

                <input class="mdui-textfield-input" type="text" name="username" data-validation="custom" data-validation-regexp="^[a-zA-Z0-9]+(?:[_ -]?[a-zA-Z0-9])*$" data-validation-error-msg="Enter your username correctly!"/>
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Password</label>

                <input class="mdui-textfield-input" type="password" name="password" data-validation="length" data-validation-length="min8" data-validation-error-msg="Minimum 8 characters!"/>
            </div>
            <button class="mdui-btn mdui-ripple mdui-float-right login-register-button" type="submit" name="submit">Login</button>
            <button class="mdui-btn mdui-ripple mdui-float-right login-register-button" id="register_btn">Register</button>
        </form>
    </div>
</div>
<div class="mdui-card login-card mdui-hidden" id="register_card">
    <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
        <div class="mdui-card-primary-title">Patient Registration
            <button class="mdui-btn mdui-btn-icon mdui-float-right" id="return_login"><i class="mdui-icon material-icons">arrow_back</i></button>
        </div>
    </div>

    <div class="mdui-card-content">
        <form method="post" action="new_patient.php" id="register_form">
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="text" name="fname" data-validation="custom" data-validation-regexp="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" data-validation-error-msg="Enter your full name!" placeholder="Your Full Name" />
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Sex</label>
                <select class="mdui-textfield-input" name="sex">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="text" name="username" data-validation="custom" data-validation-regexp="^[a-zA-Z0-9]+(?:[_ -]?[a-zA-Z0-9])*$" data-validation-error-msg="Enter your username!" placeholder="Username" />
            </div>
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="email" name="email" data-validation="email" data-validation-error-msg="Enter your email correctly!" placeholder="Email" />
            </div>

            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="password" data-validation="length" data-validation-length="min8" data-validation-error-msg="Minimum 8 characters!" name="rpassword" placeholder="Password" />
            </div>
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="password" data-validation="confirmation" data-validation-confirm="rpassword" data-validation-error-msg="Password did not match!" name="confirm_password" placeholder="Confirm Password" />
            </div>
            <button class="mdui-btn mdui-ripple mdui-float-right login-register-button" type="submit" id="register_submit" name="submit">Register</button>
        </form>
</div>



<script type="text/javascript">
    $('#register_btn').click(function() {
        event.preventDefault();
        $('#login_card').addClass('mdui-hidden');
        $('#register_card').removeClass('mdui-hidden');
    });
    $('#return_login').click(function() {
        $('#register_card').addClass('mdui-hidden');
        $('#login_card').removeClass('mdui-hidden');
    });
    $.validate({
        form: '#login_form, #register_form',
        modules: 'security',
        onModulesLoaded : function() {
            var optionalConfig = {
                fontSize: '12pt',
                padding: '4px',
                bad: 'Very bad',
                weak: 'Weak',
                good: 'Good',
                strong: 'Strong'
            };
            $('input[name="rpassword"]').displayPasswordStrength(optionalConfig);
        }
    });
</script>

<?php include("../includes/portal_components/footless.php"); ?>
