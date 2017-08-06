<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/28/17
 * Time: 10:57 PM
 */
session_start();
include "./doctor_drawer.php";
$title="Doctor Portal";

$idUser = $_SESSION['user_id'];

$fetchedDoctor = findDoctorByUserId($idUser);

$fetchedTable = getDoctorAppointmentTable($fetchedDoctor);

?>

<div class="mdui-m-a-5 mdui-clearfix">
    <button class="mdui-btn mdui-ripple mdui-btn-raised mdui-color-theme-accent mdui-text-capitalize mdui-float-left mdui-color-green" mdui-dialog="{target: '#addSchedule'}">Add schedule</button>
    <button class="mdui-btn mdui-ripple mdui-btn-raised mdui-color-theme-accent mdui-text-capitalize mdui-float-right mdui-color-red" mdui-dialog="{target: '#removeSchedule'}">Delete a schedule</button>
</div>





<table class="mdui-table mdui-table-hoverable">
    <thead>
    <tr>
        <th>#</th>
        <th>Week Day</th>
        <th>Time</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($fetchedTable as $timeTable){
            echo "<tr>
                    <td>".$timeTable['idAppointmentTimeTable']."</td>
                    <td>".$timeTable['VisitingDay']."</td>
                    <td>".$timeTable['VisitingTime']."</td>
                </tr>";
        }
    ?>
    </tbody>
</table>














<div class="mdui-dialog mdui-color-yellow-100" id="addSchedule">
    <div class="mdui-dialog-title">Add Schedule</div>
    <div class="mdui-dialog-content">
        <form method="post" action="add_schedules.php" id="register_form">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Week Day</label>
                <select class="mdui-textfield-input" name="weekday">
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                </select>
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Start and finish time</label>
                <input class="mdui-textfield-input mdui-text-capitalize" type="text" name="time" mdui-tooltip="{content: 'Ex: 05:00-08:00'}" />
            </div>
            <button class="mdui-btn mdui-ripple mdui-color-green mdui-float-right login-register-button" type="submit" id="register_submit" name="submit">Add</button>
        </form>
    </div>
</div>

<div class="mdui-dialog mdui-color-yellow-100" id="removeSchedule">
    <div class="mdui-dialog-title">Remove Schedule</div>
    <div class="mdui-dialog-content">
        <form method="post" action="#" id="register_form">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Schedule to remove</label>
                <select class="mdui-textfield-input" name="schedule_id">
                    <?php
                    foreach ($fetchedTable as $timeTable){
                        echo "<option value=\"".$timeTable['idAppointmentTimeTable']."\">".$timeTable['VisitingDay']."(".$timeTable['VisitingTime'].")</option>";
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
    $('#dashboard_file').text("Schedules");
</script>
<?php include("../includes/portal_components/footer.php");?>
