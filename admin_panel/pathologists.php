<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/26/17
 * Time: 9:34 PM
 */

include("admin_drawer.php");
$title="Admin Panel";

$fetchedPathologist = getAllPathologist();

?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>


<div class="mdui-m-a-5 mdui-clearfix">
    <button class="mdui-btn mdui-ripple mdui-color-theme-accent mdui-text-capitalize mdui-float-left mdui-color-green" mdui-dialog="{target: '#doctorRegistrationDialog'}">Register a Pathologist</button>
    <button class="mdui-btn mdui-ripple mdui-color-theme-accent mdui-text-capitalize mdui-float-right mdui-color-red" mdui-dialog="{target: '#doctorDeleteDialog'}">Delete a Pathologist</button>
</div>

<div class="mdui-valign">
    <div class="mdui-typo-headline-opacity mdui-center">Doctor List</div>
</div>


<div class=" mdui-m-a-1 mdui-row">
    <?php
    foreach ($fetchedPathologist as $pathologist){
        echo "<div class=\"mdui-col-xs-6 mdui-col-sm-4\" >
                        <div class=\"mdui-card mdui-m-a-1\">
                            <div class=\"mdui-card-media\" >
                              
                                <img src=\"../images/nurse.png\"/>
                            </div>
                            <div class=\"mdui-card-primary\" style=\"min-height: 90px !important; max-height: 120px !important;\">
                              <div class=\"mdui-text-capitalize\" >".$pathologist['Name']."</div>
                              <div class=\"mdui-card-primary-subtitle\">".$pathologist['Department']."</div>
                              <div class=\"mdui-card-primary-subtitle\">".$pathologist['Speciality']."</div>
                            </div>
                        </div>
                  </div>";
    }
    ?>
</div>





















<div class="mdui-dialog mdui-color-yellow-100" id="doctorDeleteDialog">
    <div class="mdui-dialog-title">Delete Pathologist</div>
    <div class="mdui-dialog-content">
        <form method="post" action="#" id="register_form">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Select Pathologist</label>
                <select class="mdui-textfield-input" name="del_doctor_id">
                    <?php
                    foreach ($fetchedPathologist as $pathologist){
                        echo "<option value=\"".$pathologist['idPathologist']."\">".$pathologist['Name']."(".$pathologist['Department'].")</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="mdui-btn mdui-ripple mdui-color-red mdui-float-right login-register-button" type="submit" id="register_submit" name="submit">Delete Doctor</button>
        </form>
    </div>
</div>


<div class="mdui-dialog mdui-color-lime-100" id="doctorRegistrationDialog">
    <div class="mdui-dialog-title">Register Pathologist</div>
    <div class="mdui-dialog-content">
        <form method="post" action="new_pathologist.php" id="register_form">
            <div class="mdui-textfield">
                <input class="mdui-textfield-input mdui-text-capitalize" type="text" name="fname" data-validation="custom" data-validation-regexp="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" data-validation-error-msg="Enter your full name!" placeholder="Your Full Name" />
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Department</label>
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
                <input class="mdui-textfield-input" type="text" name="speciality"  placeholder="Speciality" />
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
            <button class="mdui-btn mdui-ripple mdui-color-green mdui-float-right login-register-button" type="submit" id="register_submit" name="submit">Register</button>
        </form>
    </div>
</div>





















<script type="text/javascript">

    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("Doctors Information");

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

<?php include("../includes/portal_components/footer.php");?>
