<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/24/17
 * Time: 11:15 PM
 */
include("admin_drawer.php");
$title="Admin Panel";

$fetchedDoctors = getAllDoctors();

?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>


<div class="mdui-m-a-5 mdui-clearfix">
    <button class="mdui-btn mdui-ripple mdui-color-theme-accent mdui-text-capitalize mdui-float-left mdui-color-green" mdui-dialog="{target: '#doctorRegistrationDialog'}">Register a Doctor</button>
    <button class="mdui-btn mdui-ripple mdui-color-theme-accent mdui-text-capitalize mdui-float-right mdui-color-red" mdui-dialog="{target: '#doctorDeleteDialog'}">Delete a Doctor</button>
</div>

<div class="mdui-valign">
    <div class="mdui-typo-headline-opacity mdui-center">Doctor List</div>
</div>


<div class="mdui-m-a-1 mdui-row">
    <?php
        foreach ($fetchedDoctors as $doctor){
            echo "<div class=\"mdui-col-xs-6 mdui-col-sm-4\" >
                        <div class=\"mdui-card mdui-m-a-1\">
                            <div class=\"mdui-card-media\" >
                              
                                <img src=\"../images/doctor.png\"/>
                            </div>
                            <div class=\"mdui-card-primary\" style=\"min-height: 90px !important; max-height: 120px !important;\">
                              <div class=\"mdui-text-capitalize\" >".$doctor['Name']."</div>
                              <div class=\"mdui-card-primary-subtitle\">".$doctor['Degree']."</div>
                              <div class=\"mdui-card-primary-subtitle\">".$doctor['Specialty']."</div>
                              <div class=\"mdui-card-primary-subtitle\">".$doctor['Department']."</div>
                            </div>
                        </div>
                  </div>";
        }
    ?>
</div>





















<div class="mdui-dialog mdui-color-yellow-100" id="doctorDeleteDialog">
    <div class="mdui-dialog-title">Delete Doctor</div>
    <div class="mdui-dialog-content">
        <form method="post" action="#" id="register_form">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Select Doctor</label>
                <select class="mdui-textfield-input" name="del_doctor_id">
                    <?php
                    foreach ($fetchedDoctors as $doctor){
                        echo "<option value=\"".$doctor['idDoctor']."\">".$doctor['Name']."(".$doctor['Department'].")</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="mdui-btn mdui-ripple mdui-color-red mdui-float-right login-register-button" type="submit" id="register_submit" name="submit">Delete Doctor</button>
        </form>
    </div>
</div>


<div class="mdui-dialog mdui-color-lime-100" id="doctorRegistrationDialog">
    <div class="mdui-dialog-title">Register Doctor</div>
    <div class="mdui-dialog-content">
        <form method="post" action="new_doctor.php" id="register_form">
            <div class="mdui-textfield">
                <input class="mdui-textfield-input mdui-text-capitalize" type="text" name="fname" data-validation="custom" data-validation-regexp="^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$" data-validation-error-msg="Enter your full name!" placeholder="Your Full Name" />
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Department</label>
                <select class="mdui-textfield-input" name="department">
                    <option value="Pediatric and Neonatology">Pediatric and Neonatology</option>
                    <option value="Cancer Specialist">Cancer Specialist</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Dental Surgeon">Dental Surgeon</option>
                    <option value="Dermatologist">Dermatologist</option>
                    <option value="Diabetes, Thyroid and Hormone Specialist">Diabetes, Thyroid and Hormone Specialist</option>
                    <option value="ENT(Ear,Nose and Throat)">ENT(Ear,Nose and Throat)</option>
                    <option value="Family physician and medical co-ordinator">Family physician and medical co-ordinator</option>
                    <option value="Gastroenterology">Gastroenterology</option>
                    <option value="Gynecology and Obstetrics">Gynecology and Obstetrics</option>
                    <option value="Interventional Cardiology">Interventional Cardiology</option>
                    <option value="Kidney, Ureter, Bladder, Prostate and Andrology Specialist Surgeon">Kidney, Ureter, Bladder, Prostate and Andrology Specialist Surgeon</option>
                    <option value="Laparoscopic and Colorectal Surgery">Laparoscopic and Colorectal Surgery</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Medicine and Chest Specialist">Medicine and Chest Specialist</option>
                    <option value="Medicine and Kindey Specialist">Medicine and Kindey Specialist</option>
                    <option value="Medicine and Diabetologist">Medicine and Diabetologist</option>
                    <option value="Neuromedicine">Neuromedicine</option>
                    <option value="Neurosurgery">Neurosurgery</option>
                    <option value="Ophthalmology">Ophthalmology</option>
                    <option value="Orthopedic Surgeon">Orthopedic Surgeon</option>
                    <option value="Plastic Surgery">Plastic Surgery</option>
                    <option value="Psychiatry">Psychiatry</option>
                    <option value="Pulmonology">Pulmonology</option>
                </select>
            </div>
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="text" name="specialty"  placeholder="Specialty" />
            </div>
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">Degree</label>
                <textarea class="mdui-textfield-input" name="degree"></textarea>
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
