<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/30/17
 * Time: 9:30 PM
 */
include "patient_drawer.php";
session_start();
date_default_timezone_set('Asia/Dhaka');
$title="Patient Portal";
$doctorId = $_GET['docId'];
$fetchedDoctor = findDoctorByDoctorId($doctorId);
$doctorTimeTable = getDoctorAppointmentTable($doctorId);
$patientID = findPatientIdByUserId($_SESSION['user_id']);
?>







<div class="mdui-card" id="login_card" style="width: 500px; margin: 0 auto; margin-top: 100px;">
    <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
        <div class="mdui-card-primary-title">Appointment</div>
    </div>

    <div class="mdui-card-content">
        <form method="post" action="appointment.php" id="register_form">
            <div class="mdui-typo-title-opacity"><?php echo $fetchedDoctor['Name']; ?></div>
            <div class="mdui-typo-title-opacity"><?php echo $fetchedDoctor['Degree']; ?></div>
            <div class="mdui-typo-title-opacity"><?php echo $fetchedDoctor['Department']; ?></div>
            <input name="doctor_id" hidden value="<?php echo $doctorId; ?>"/>
            <input name="patient_id" hidden value="<?php echo $patientID; ?>"/>
            <div class="mdui-textfield" hidden>
                <label class="mdui-textfield-label">Registration Date</label>
                <input class="mdui-textfield-input mdui-text-capitalize" type="text" name="register_date" value="<?php echo date("d-m-y"); ?>" />
            </div>
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">Appointment Date</label>
                <select class="mdui-textfield-input" name="appointment_date" id="date_selection">
                    <option>--Select--</option>
                    <?php
                        foreach ($doctorTimeTable as $item) {
                            $start_date=strtotime($item['VisitingDay']);
                            echo date("d-m-yy", $start_date)."<br/>";
                            echo "<option value=\"".date("d-m-y", $start_date)."\">". $item['VisitingDay'].", ".date("d-m-y", $start_date)."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">Time Slot</label>
                <select class="mdui-textfield-input" name="appointment_time" id="time_selection">

                </select>
            </div>
            <button class="mdui-btn mdui-ripple mdui-color-green mdui-float-right login-register-button" style="margin: 10px;" type="submit" id="register_submit" name="submit">Register</button>
        </form>
    </div>
</div>










<script>
    $('#date_selection').change(function () {
        var value = $("#date_selection option:selected").text();
        var day = value.substring(0, value.indexOf(","));
        var timeArray = <?php echo json_encode($doctorTimeTable);?>;
        $('#time_selection').html("");
        for(var i = 0; i < timeArray.length; i++){
            if(timeArray[i]['VisitingDay'] === day) {
                $('#time_selection').append($('<option>', {
                    value: timeArray[i]['VisitingTime'],
                    text : timeArray[i]['VisitingTime']
                }));
            }
        }
    });
</script>

<script type="text/javascript">
    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("New Appointment");
</script>
<?php include("../includes/portal_components/footer.php");?>
