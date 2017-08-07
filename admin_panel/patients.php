<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/8/17
 * Time: 2:40 AM
 */

include("admin_drawer.php");
$title="Admin Panel";
$fetchedPatient = getAllPatients();
?>
    <div class="mdui-container">
        <div class="mdui-row mdui-m-t-3" >
            <h1 class="mdui-text-center">Last Registered Patients</h1>
            <table class="mdui-table mdui-table-hoverable">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Blood Group</th>
                    <th>Date Of Birth/th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($fetchedPatient as $patient){
                    echo "<tr>
                    <td>".$patient['Name']."</td>
                    <td>".$patient['Sex']."</td>
                    <td>".$patient['BloodGroup']."</td>
                    <td>".$patient['DateOfBirth']."</td>
                    <td>".$patient['MobileNo']."</td>
                    <td>".$patient['Address']."</td>
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
        $('#dashboard_file').text("All Patients");
    </script>

<?php include("../includes/portal_components/footer.php");?>