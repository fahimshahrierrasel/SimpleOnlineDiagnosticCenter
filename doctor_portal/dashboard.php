<?php
include("./doctor_drawer.php");
session_start();
$title="Doctor Portal";
$idUser = $_SESSION['user_id'];

$fetchedDoctor = findDoctorByUserId($idUser);

$fetchedTable = getDoctorAppointmentTable($fetchedDoctor);

$fetchedAppointment = getDoctorAppointments($fetchedDoctor['idDoctor']);
?>

<div class="mdui-container">
    <div class="mdui-row">
        <h1 class="mdui-text-center">My Schedules</h1>
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
    </div>
    <div class="mdui-row mdui-m-t-3" >
        <h1 class="mdui-text-center">Last Prescriptions</h1>
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
</div>


<script type="text/javascript">
    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("Dashboard");
</script>
<?php include("../includes/portal_components/footer.php");?>
