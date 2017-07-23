<?php
include ("patient_drawer.php");
$title="Patient Portal";
?>

<div style="margin-top: 20px; margin-bottom: 20px">
    <div class="mdui-card login-card" id="register_card">
        <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
            <div class="mdui-card-primary-title">Account Information</div>
        </div>

        <div class="mdui-card-content">
            <form method="post" action="#" id="user_form">
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
    </div>
        <div class="mdui-typo" style="margin: 10px">
            <hr/>
        </div>
        <div class="mdui-card login-card" id="register_card">
            <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
                <div class="mdui-card-primary-title">Patient Information</div>
            </div>

            <div class="mdui-card-content">
                <form method="post" action="#" id="Patient_form">
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
        </div>
</div>



<script type="text/javascript">
    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("Profile");
</script>
<?php include("../includes/portal_components/footer.php");?>
