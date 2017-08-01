<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/30/17
 * Time: 9:08 PM
 */
include "patient_drawer.php";
$title="Patient Portal";
$fetchedDoctors = getAllDoctors();
?>

<div class="mdui-container" style="margin-top: 70px">

    <div class="mdui-row" style="margin-top: 30px">
        <div class="mdui-col-xs-6" >
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Find doctor by department</label>
                <select class="mdui-textfield-input" id="department">
                    <option value="all">All</option>
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
        </div>
        <div class="mdui-col-xs-6">
            <div class="mdui-textfield mdui-textfield-expandable mdui-m-a-4">
                <button class="mdui-textfield-icon mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></button>
                <input class="mdui-textfield-input" type="text" placeholder="Search Doctor"/>
                <button class="mdui-textfield-close mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">close</i></button>
            </div>
        </div>
    </div>
    <!--    <div id="searched_doctor" class="mdui-row" style="margin-top: 30px"></div>-->
    <div class="mdui-m-a-1 mdui-row" id="searched_doctor">
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
                                <div class=\"mdui-card-actions\">
                                <button class=\"mdui-btn mdui-ripple\" onclick='location.href=\"appointment_form.php?docId=".$doctor['idDoctor']."\"'>Make Appointment</button>
                                <button class=\"mdui-btn mdui-ripple\" onclick='location.href=\"../doctor_details.php?docId=".$doctor['idDoctor']."\"'>Details</button>
                            </div>
                            </div>
                      </div>";
        }
        ?>
    </div>

</div>
<script>
    $('#department').change(function () {
        if($(this).val() === "all"){
            location.reload();
        }
        $('#searched_doctor').html("");
        $.ajax({
            type: "post",
            dataType: "json",
            url: "/ajax_calls/doctorByDept.php",
            data: {'department': $(this).val()},
            success: function (responses) {
                responses.forEach(function (response) {
                    $('#searched_doctor').append(
                        "<div class=\"mdui-col-xs-6 mdui-col-sm-4\" >"+
                        "<div class=\"mdui-card mdui-m-a-1\" id='cards'>"+
                        "<div class=\"mdui-card-media\" >"+
                        "<img src=\"../images/doctor.png\"/>"+
                        "</div>"+
                        "<div class=\"mdui-card-primary\" style=\"min-height: 90px !important; max-height: 120px !important;\">"+
                        "<div class=\"mdui-text-capitalize\">" + response['Name'] + "</div>"+
                        "<div class=\"mdui-card-primary-subtitle\">"+response['Degree']+"</div>"+
                        "<div class=\"mdui-card-primary-subtitle\">"+response['Specialty']+"</div>"+
                        "<div class=\"mdui-card-primary-subtitle\">"+response['Department']+"</div>"+
                        "</div>"+
                        "<div class=\"mdui-card-actions\" id='actions'>"+
                        "<button class='mdui-btn mdui-ripple' onclick='location.href=\"appointment_form.php?docId="+response['idDoctor']+"\"'>Make Appointment</button>"+
                        "<button class=\"mdui-btn mdui-ripple\" onclick='location.href=\"../doctor_details.php?docId="+response['idDoctor']+"\"'>Details</button>"+
                        "</div>"+
                        "</div>"+
                        "</div>");
                });
            }
        });
    });
</script>




<script type="text/javascript">
    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("Find Doctors");
</script>
<?php include("../includes/portal_components/footer.php");?>
