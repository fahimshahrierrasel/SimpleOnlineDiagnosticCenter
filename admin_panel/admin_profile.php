<?php
include "admin_drawer.php";
session_start();

$title = "Admin Panel";

$fetchedUser = findUserById($_SESSION['user_id']);
$fetchedAdmin = findAdminByUserId($_SESSION['user_id']);
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<div style="margin-top: 20px; margin-bottom: 20px">


    <div class="mdui-row">

    </div>

    <div class="mdui-card login-card" id="patient_info_card">
        <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
            <div class="mdui-card-primary-title">Your Information</div>
        </div>

        <div class="mdui-card-content">
            <div class="mdui-typo">
                <div class="mdui-typo-title-opacity">Full Name: <?php echo $fetchedAdmin['Name'];?></div>
                <div class="mdui-typo-subheading-opacity">Department: <?php echo $fetchedAdmin['Department'];?></div>
            </div>
        </div>
    </div>
    <div class="mdui-card login-card mdui-hidden" id="update_patient_info_card">
        <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
            <div class="mdui-card-primary-title">Update Your Information</div>
            <button class="mdui-btn mdui-btn-raised mdui-color-yellow mdui-float-right" id="cancel_edit_btn">Cancel</button>
        </div>

    </div>

    <div class="mdui-typo" style="margin: 10px">
        <hr/>
    </div>


    <div class="mdui-row">

        <div class="mdui-col-xs-6">
            <div class="mdui-card" id="register_card">
                <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
                    <div class="mdui-card-primary-title">Account Picture</div>
                </div>
                <div class="mdui-card-media ">
                    <?php echo'<img class="mdui-img-rounded mdui-p-t-3" style="width: 200px; margin: 0 auto;" src="data:image/jpeg;base64,'.$fetchedUser['Image'].'" alt="Image not found" onerror="this.onerror=null;this.src=\'../images/admin.png\';" />'?>
                </div>
                <div class="mdui-card-content">
                    <form method="post" action="../includes/image_upload.php" enctype="multipart/form-data" id="user_form"
                          style="margin: 10px">
                        <div class="mdui-textfield">
                            <input class="mdui-textfield-input" type="file" name="image"/>
                        </div>
                        <button class="mdui-btn mdui-ripple mdui-btn-raised mdui-color-blue mdui-float-right" style="margin: 10px" type="submit"
                                name="submit"><i class="mdui-icon mdui-icon-left material-icons">file_upload</i> Upload
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mdui-col-xs-6">
            <div class="mdui-card" id="register_card">
                <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
                    <div class="mdui-card-primary-title">Change Password</div>
                </div>

                <div class="mdui-card-content">
                    <form method="post" action="../includes/change_password.php" id="password_form" style="margin: 10px">
                        <div class="mdui-textfield">
                            <input class="mdui-textfield-input" type="password" data-validation="length"
                                   data-validation-length="min8" data-validation-error-msg="Minimum 8 characters!"
                                   name="current_password" placeholder="Current Password"/>
                        </div>
                        <div class="mdui-textfield">
                            <input class="mdui-textfield-input" type="password" data-validation="length"
                                   data-validation-length="min8" data-validation-error-msg="Minimum 8 characters!"
                                   name="new_password" placeholder="New Password"/>
                        </div>
                        <div class="mdui-textfield">
                            <input class="mdui-textfield-input" type="password" data-validation="confirmation"
                                   data-validation-confirm="new_password" data-validation-error-msg="Password did not match!"
                                   name="confirm_new_password" placeholder="Confirm New Password"/>
                        </div>
                        <button class="mdui-btn mdui-ripple mdui-btn-raised mdui-color-red mdui-float-right" style="margin: 10px" type="submit"
                                name="pass_submit">Change Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $.validate({
        form: '#password_form, #update_patient_form',
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
            $('input[name="new_password"]').displayPasswordStrength(optionalConfig);
        }
    });
</script>

<script type="text/javascript">
    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("Profile");
</script>
<?php include("../includes/portal_components/footer.php"); ?>
