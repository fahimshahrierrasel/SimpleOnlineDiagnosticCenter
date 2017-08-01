<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/1/17
 * Time: 7:56 PM
 */

session_start();
include "./doctor_drawer.php";
$title="Doctor Portal";

$idUser = $_SESSION['user_id'];

$fetchedDoctor = findDoctorIdByUserId($idUser);

$fetchedAppointment = getDoctorAppointments($fetchedDoctor['idDoctor']);
?>


<div class="mdui-container" style="padding: 10px">
    <div class="mdui-typo-headline mdui-text-center mdui-m-a-2">Appointment Schedules</div>
    <table class="mdui-table mdui-table-hoverable">
        <thead>
        <tr>
            <th>Patient Name</th>
            <th>Registration Date</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($fetchedAppointment as $appointment){
            echo "<tr>
                    <td>".$appointment['Name']."</td>
                    <td>".date_format(date_create($appointment['RegistrationDate']),'d-M-Y')."</td>
                    <td>".date_format(date_create($appointment['AppointmentDate']),'d-M-Y')."</td>
                    <td>".$appointment['AppointmentTime']."</td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>


<script type="text/javascript">
    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("Appointments");
</script>
<?php include("../includes/portal_components/footer.php");?>

