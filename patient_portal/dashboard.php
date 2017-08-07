<?php
include ("patient_drawer.php");
$title="Patient Portal";
session_start();
$patient_id = findPatientIdByUserId($_SESSION['user_id']);
$fetchedAppoints = getPatientAppointments($patient_id);
$fetchedPrescription = getPrescriptionsByPatientId($patient_id);
?>


<div class="mdui-container">
    <div class="mdui-row">
        <h1 class="mdui-text-center">Next Appointments</h1>
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
    <div class="mdui-row mdui-m-t-3" >
        <h1 class="mdui-text-center">Last Prescriptions</h1>
        <?php

        foreach ($fetchedPrescription as $prescription) {
            $fetchedMedicine = getPrescribedMedicine($prescription['idPrescription']);
            echo "<div class=\"mdui-card mdui-m-b-2\">
            <div class=\"mdui-card-primary\">
                <div class=\"mdui-card-primary-title\">Prescribed Date: " . $prescription['Date'] . "</div>
                <div class=\"mdui-card-primary-subtitle\">Prepared By: " . $prescription['Name'] . "</div>
                <div class=\"mdui-card-primary-subtitle\">Symptoms: " . $prescription['Problem'] . "</div>
            </div>
            <div class=\"mdui-card-content\">
                <div class=\"mdui-panel\" mdui-panel>
                    <div class=\"mdui-panel-item\">
                        <div class=\"mdui-panel-item-header\">
                            <div class=\"mdui-panel-item-title\">Medicines</div>
                            <i class=\"mdui-panel-item-arrow mdui-icon material-icons\">keyboard_arrow_down</i>
                        </div>
                        <div class=\"mdui-panel-item-body\">
                            <div class=\"mdui-table-fluid\">
                                <table class=\"mdui-table mdui-table-hoverable\">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Dosage</th>
                                        <th>Use</th>
                                    </tr>
                                    </thead>
                                    <tbody>";
            foreach ($fetchedMedicine as $medicine) {
                echo "<tr>
                            <td>" . $medicine['Medicine'] . "</td>
                            <td>" . $medicine['Dosage'] . "</td>
                            <td>" . $medicine['Use'] . "</td>
                          </tr>";
            }
            echo "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
        }

        ?>
    </div>
</div>



<script type="text/javascript">
    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("Dashboard");
</script>
<?php include("../includes/portal_components/footer.php");?>
