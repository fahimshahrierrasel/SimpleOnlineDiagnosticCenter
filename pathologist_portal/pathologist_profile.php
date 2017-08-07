<?php
include "pathologist_drawer.php";
session_start();

$title = "Pathologist Portal";

$fetchedUser = findUserById($_SESSION['user_id']);
$fetchedPathologist = findPathologistByUserId($_SESSION['user_id']);
?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<div style="margin-top: 20px; margin-bottom: 20px">


    <div class="mdui-row">

    </div>

    <div class="mdui-card login-card" id="patient_info_card">
        <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
            <div class="mdui-card-primary-title">Your Information</div>
            <button class="mdui-btn mdui-btn-raised mdui-color-red mdui-float-right" id="edit_btn">Edit</button>
        </div>

        <div class="mdui-card-content">
            <div class="mdui-typo">
                <div class="mdui-typo-title-opacity">Full Name: <?php echo $fetchedPathologist['Name'];?></div>
                <div class="mdui-typo-subheading-opacity">Department: <?php echo $fetchedPathologist['Department'];?></div>
                <div class="mdui-typo-subheading-opacity">Speciality: <?php echo $fetchedPathologist['Speciality'];?></div>
            </div>
        </div>
    </div>
    <div class="mdui-card login-card mdui-hidden" id="update_patient_info_card">
        <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
            <div class="mdui-card-primary-title">Update Your Information</div>
            <button class="mdui-btn mdui-btn-raised mdui-color-yellow mdui-float-right" id="cancel_edit_btn">Cancel</button>
        </div>

        <div class="mdui-card-content">
            <form method="post" action="update_profile.php" id="update_patient_form">
                <div class="mdui-textfield">
                    <input class="mdui-textfield-input mdui-text-capitalize" type="text" value="<?php echo $fetchedPathologist['Name'];?>" name="fname" data-validation="custom" data-validation-regexp="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" data-validation-error-msg="Enter your full name!" placeholder="Your Full Name" />
                </div>
                <div class="mdui-textfield mdui-textfield-floating-label">
                    <label class="mdui-textfield-label">Department (Select one)</label>
                    <select class="mdui-textfield-input" name="department">
                        <option value="Bio-Chemistry">Bio-Chemistry</option>
                        <option value="Bone Densitometre">Bone Densitometre</option>
                        <option value="Broncoscopy">Broncoscopy</option>
                        <option value="Cardiac Test">Cardiac Test</option>
                        <option value="Clinical Pathology">Clinical Pathology</option>
                        <option value="Colonoscopy">Colonoscopy</option>
                        <option value="CT Scan">CT Scan</option>
                        <option value="Cyto-Pathology">Cyto-Pathology</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Dialysis">Dialysis</option>
                        <option value="ENT">ENT</option>
                        <option value="Histopathology">Histopathology</option>
                        <option value="Immunology">Immunology</option>
                        <option value="Micro-Biology">Micro-Biology</option>
                        <option value="MRI">MRI</option>
                        <option value="Neurodiagnosis">Neurodiagnosis</option>
                        <option value="Nuclear Medicine">Nuclear Medicine</option>
                        <option value="PCR Lab">PCR Lab</option>
                        <option value="Serology">Serology</option>
                        <option value="Uroflowmetry">Uroflowmetry</option>
                        <option value="USG">USG</option>
                        <option value="Vaccination Center">Vaccination Center</option>
                        <option value="Video Endoscopy">Video Endoscopy</option>
                        <option value="X-Ray">X-Ray</option>
                    </select>
                </div>
                <div class="mdui-textfield">
                    <input class="mdui-textfield-input" type="text" name="speciality" value="<?php echo $fetchedPathologist['Speciality'];?>" placeholder="Speciality" />
                </div>
                <button class="mdui-btn mdui-ripple mdui-float-right mdui-m-a-1 login-register-button" type="submit"
                        id="register_submit" name="submit">Update
                </button>
            </form>
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
                    <?php echo'<img class="mdui-img-rounded mdui-p-t-3" style="width: 200px; margin: 0 auto;" src="data:image/jpeg;base64,'.$fetchedUser['Image'].'" alt="Image not found" onerror="this.onerror=null;this.src=\'../images/nurse.png\';" />'?>
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
    $('#edit_btn').click(function(){
        $('#patient_info_card').addClass("mdui-hidden");
        $('#update_patient_info_card').removeClass("mdui-hidden");
    });

    $('#cancel_edit_btn').click(function(){
        $('#patient_info_card').removeClass("mdui-hidden");
        $('#update_patient_info_card').addClass("mdui-hidden");
    });

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
