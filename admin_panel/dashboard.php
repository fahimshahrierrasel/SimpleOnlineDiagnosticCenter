<?php
include("admin_drawer.php");
$title="Admin Panel";
$fetchedDoctors = getAllDoctors();
$fetchedPathologist = getAllPathologist();
$fetchedPatient = getAllPatients();
?>
<div class="mdui-container">
    <div class="mdui-row">
        <h1 class="mdui-text-center">Last Registered Doctors</h1>
        <table class="mdui-table mdui-table-hoverable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($fetchedDoctors as $doctor){
                echo "<tr>
                    <td>".$doctor['Name']."</td>
                    <td>".$doctor['Department']."</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="mdui-row mdui-m-t-3" >
        <h1 class="mdui-text-center">Last Registered Pathologists</h1>
        <table class="mdui-table mdui-table-hoverable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($fetchedPathologist as $pathologist){
                echo "<tr>
                    <td>".$pathologist['Name']."</td>
                    <td>".$pathologist['Department']."</td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="mdui-row mdui-m-t-3" >
        <h1 class="mdui-text-center">Last Registered Patients</h1>
        <table class="mdui-table mdui-table-hoverable">
            <thead>
            <tr>
                <th>Name</th>
                <th>Blood Group</th>
                <th>Mobile Number</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($fetchedPatient as $patient){
                echo "<tr>
                    <td>".$patient['Name']."</td>
                    <td>".$patient['BloodGroup']."</td>
                    <td>".$patient['MobileNo']."</td>
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
