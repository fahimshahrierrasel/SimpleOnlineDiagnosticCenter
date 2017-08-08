<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/1/17
 * Time: 4:18 PM
 */

include "patient_drawer.php";
$title="Patient Portal";
session_start();
$patient_id = findPatientIdByUserId($_SESSION['user_id']);
$fetchedAppoints = getPatientAppointments($patient_id);
?>


<div class="mdui-container" style="padding: 10px">
    <button class="mdui-btn mdui-ripple mdui-btn-raised mdui-color-theme-accent mdui-text-capitalize mdui-float-right mdui-color-red" mdui-dialog="{target: '#removeSchedule'}">Cancel Appointment</button>
    <div class="mdui-typo-headline mdui-text-center mdui-m-a-2">Appointment Schedules</div>

    <table class="mdui-table mdui-table-hoverable">
        <thead>
        <tr>
            <th>Doctor Name</th>
            <th>Registration Date</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($fetchedAppoints as $appointment){
            echo "<tr>
                    <td>".$appointment['Name']."</td>
                    <td>".$appointment['RegistrationDate']."</td>
                    <td>".$appointment['AppointmentDate']."</td>
                    <td>".$appointment['AppointmentTime']."</td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>



<div class="mdui-dialog mdui-color-yellow-100" id="removeSchedule">
    <div class="mdui-dialog-title">Cancel Appointment</div>
    <div class="mdui-dialog-content">
        <form method="post" action="remove_appointment.php" id="register_form">
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">Select Appointment</label>
                <select class="mdui-textfield-input" name="appointment_id">
                    <?php
                    foreach ($fetchedAppoints as $appointment){
                        echo "<option value=\"".$appointment['idAppointment']."\">".$appointment['Name']."(".$appointment['AppointmentDate']."-->".$appointment['AppointmentTime'].")</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="mdui-btn mdui-ripple mdui-color-green mdui-float-right login-register-button" type="submit" id="register_submit" name="submit">Remove</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("All Appointments");
</script>
<?php include("../includes/portal_components/footer.php");?>
