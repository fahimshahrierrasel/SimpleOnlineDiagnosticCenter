<?php
/**
 * Created by PhpStorm.
 * User: fahim
 * Date: 8/1/17
 * Time: 10:32 PM
 */

include "doctor_drawer.php";
session_start();
$title="Doctor Portal";
$doctor = findDoctorByUserId($_SESSION['user_id']);
$appointments = getDoctorAppointments($doctor['idDoctor']);
?>
<div class="mdui-card" id="login_card" style="width: auto; margin: 0 auto; margin-top: 30px; margin-bottom: 20px">
    <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
        <div class="mdui-card-primary-title">Prescription</div>
    </div>

    <div class="mdui-card-content">
        <form method="post" action="#" id="register_form">
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">Select Patient</label>
                <select class="mdui-textfield-input" name="patient_id" id="patient_id">
                    <option>--Select--</option>
                    <?php
                        foreach ($appointments as $item) {
                            echo "<option value=\"".$item['idPatient']."\">". $item['Name']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">Date</label>
                <input class="mdui-textfield-input mdui-text-capitalize" type="text" id="prescribed_date" name="prescribed_date" value="<?php echo date("d-m-y"); ?>" />
            </div>
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">Symptoms</label>
                <textarea class="mdui-textfield-input" id="symptoms" name="symptoms"></textarea>
            </div>
            <div class="mdui-texrfield mdui-center">
                <button class="mdui-btn mdui-m-a-1 mdui-btn-raised mdui-color-red mdui-float-right" id="add_medicine" mdui-dialog="{target: '#removeSchedule'}">Add Medicine</button>
                <label class="mdui-type-title mdui-float-left">Medicines</label>
                <table class="mdui-table mdui-table-hoverable">
                    <thead>
                    <tr>
                        <th>Medicine</th>
                        <th>Dosage</th>
                        <th>Use</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="table_body">
                    </tbody>
                </table>
            </div>
            <button class="mdui-btn mdui-ripple mdui-color-green mdui-float-right login-register-button" style="margin: 10px;" type="submit" id="prescription_submit" name="submit">Submit</button>
        </form>
    </div>
</div>



<div class="mdui-dialog mdui-color-yellow-100" id="removeSchedule">
    <div class="mdui-dialog-title">Add Medicine</div>
    <div class="mdui-dialog-content">
        <form method="post" action="#" id="register_form">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Medicine Name</label>
                <input class="mdui-textfield-input mdui-text-capitalize" type="text" id="medicine_name"/>
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Dosage</label>
                <input class="mdui-textfield-input mdui-text-capitalize" type="text" id="medicine_dosage"/>
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Use</label>
                <input class="mdui-textfield-input mdui-text-capitalize" type="text" id="medicine_use"/>
            </div>
            <button class="mdui-btn mdui-ripple mdui-color-green mdui-float-right login-register-button" type="submit" id="addMedicine" mdui-dialog-confirm>Add</button>
        </form>
    </div>
</div>



<script type="text/javascript">
    $('#add_medicine').click(function(e){
        e.preventDefault();
    });

    var allMedicine = [];

    $('#addMedicine').click(function(e){
        e.preventDefault();
        var medicine = {};
        medicine.Name = $('#medicine_name').val();
        medicine.Dosage = $('#medicine_dosage').val();
        medicine.Use = $('#medicine_use').val();
        allMedicine.push(medicine);
        loadMedicine();
    });

    $('#table_body').on('click', 'button', function (evt) {
        evt.preventDefault();
        var button = $(this);
        var buttonID = button.attr('id');
        var removeIndex = parseInt(buttonID.substring(buttonID.indexOf("_")+1, buttonID.length));
        allMedicine.splice(removeIndex,1);
        loadMedicine();
    });

    function loadMedicine() {
        $('#table_body').html("");
        for(var i = 0; i < allMedicine.length; i++){
            $('#table_body').append("<tr>"+
                "<td>"+allMedicine[i].Name+"</td>"+
                "<td>"+allMedicine[i].Dosage+"</td>"+
                "<td>"+allMedicine[i].Use+"</td>"+
                "<td><button class='mdui-btn' id='remove_"+i+"'>Remove</button></td>"+
                "</tr>");
        }
    }
    $('#prescription_submit').click(function (evt) {
        evt.preventDefault();
        var patientId = $('#patient_id').val();
        var doctorId = <?php echo $doctor['idDoctor']; ?>;
        var prescribedDate = $('#prescribed_date').val();
        var symptom = $('#symptoms').val();


        var method = 'post';
        var form = document.createElement('form');
        form.setAttribute('method', method);
        form.setAttribute('action', '/doctor_portal/add_prescription.php');
        var att = document.createAttribute("hidden");
        form.setAttributeNode(att);


        var patientIdElement = document.createElement('input');
        patientIdElement.setAttribute('type', 'text');
        patientIdElement.setAttribute('name', 'patient_id');
        patientIdElement.setAttribute('value', patientId);

        form.appendChild(patientIdElement);

        var doctorIdElement = document.createElement('input');
        doctorIdElement.setAttribute('type', 'text');
        doctorIdElement.setAttribute('name', 'doctor_id');
        doctorIdElement.setAttribute('value', doctorId);

        form.appendChild(doctorIdElement);

        var dateElement = document.createElement('input');
        dateElement.setAttribute('type', 'text');
        dateElement.setAttribute('name', 'prescribed_date');
        dateElement.setAttribute('value', prescribedDate);

        form.appendChild(dateElement);

        var symptomElement = document.createElement('input');
        symptomElement.setAttribute('type', 'text');
        symptomElement.setAttribute('name', 'symptom');
        symptomElement.setAttribute('value', symptom);

        form.appendChild(symptomElement);

        var medicineElement = document.createElement('input');
        medicineElement.setAttribute('type', 'text');
        medicineElement.setAttribute('name', 'all_medicine');
        medicineElement.setAttribute('value', JSON.stringify(allMedicine));
        form.appendChild(medicineElement);

        document.body.appendChild(form);
        form.submit();

    });

</script>

<script type="text/javascript">
    document.title = "<?=$title;?>";
    $('#dashboard_title').text("<?=$title;?>");
    $('#dashboard_file').text("New Prescription");
</script>

<?php include "../includes/portal_components/footer.php"?>
