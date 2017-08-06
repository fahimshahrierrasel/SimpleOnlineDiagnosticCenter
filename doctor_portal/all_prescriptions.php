<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/5/17
 * Time: 11:25 AM
 */

session_start();
include "doctor_drawer.php";
$title="Doctor Portal";

$doctor = findDoctorByUserId($_SESSION['user_id']);
$fetchedPrescription = getPrescriptionsByDoctorId($doctor['idDoctor']);
?>


<div class="mdui-container">
    <h1 class="mdui-text-center">All Prescriptions</h1>

    <div class="mdui-row">

        <?php

        foreach ($fetchedPrescription as $prescription) {
            $fetchedMedicine = getPrescribedMedicine($prescription['idPrescription']);
            echo "<div class=\"mdui-card mdui-m-b-2\">
            <div class=\"mdui-card-primary\">
                <div class=\"mdui-card-primary-title\">Prescribed Date: " . $prescription['Date'] . "</div>
                <div class=\"mdui-card-primary-subtitle\">Patient: " . $prescription['Name'] . "</div>
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
    $('#dashboard_file').text("Prescriptions");
</script>
<?php include("../includes/portal_components/footer.php");?>

