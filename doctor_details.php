<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 7/29/17
 * Time: 10:44 PM
 */

include("./includes/components/header.php");
include "./includes/dbFunctions.php";

$docId = $_GET['docId'];
$fetchedDoctor = findDoctorByDoctorId($docId);
$fetchedTable = getDoctorAppointmentTable($docId);
?>

<div class="mdui-container">
    <div class="mdui-center mdui-text-center" style="margin-top: 100px;">
        <img class="mdui-shadow-3" style="border-radius: 50%; width: 300px; background: #ffffff" src="./images/doctor.png" />
    </div>
    <div class="mdui-shadow-10" style="margin-top: -150px; margin-bottom: 20px">
        <div style="width: 200px; margin: 0 auto; padding: 90px">
        </div>
        <div class="mdui-container" style="padding: 10px">
            <div class="mdui-row">
                <div class="mdui-col-xs-2"></div>
                <div class="mdui-col-xs-8">
                    <div class="mdui-text-center">
                        <div class="mdui-typo-display-2-opacity" style="margin: 0 auto">
                            <?php echo $fetchedDoctor['Name']; ?>
                        </div>
                        <div class="mdui-typo-headline-opacity" style="margin: 0 auto">
                            <?php echo $fetchedDoctor['Degree']; ?>
                        </div>
                        <div class="mdui-typo-headline-opacity" style="margin: 0 auto">
                            <?php echo $fetchedDoctor['Department']; ?>
                        </div>
                    </div>
                    <div style="margin-top: 30px">
                        <div class="mdui-typo-headline mdui-text-center">Appointment Schedules</div>
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
                </div>
                <div class="mdui-col-xs-2"></div>
            </div>
        </div>

    </div>
</div>





<?php include("./includes/components/footer.php"); ?>
