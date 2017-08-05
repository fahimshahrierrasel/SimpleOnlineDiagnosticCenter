</div>
<div class="mdui-row mdui-color-blue-grey mdui-p-a-3">
    <div class="mdui-col-xs-6">
        <a class="mdui-btn mdui-btn-raised mdui-text-capitalize">Privacy Policy</a>
        <a class="mdui-btn mdui-btn-raised mdui-text-capitalize">Terms &amp; Services</a>
        <br/>
        <div class="mdui-p-a-1">
            <span>&copy; Online Diagnostice Center</span>
            <br/>
            <span>All Rights Reserved</span>
        </div>
    </div>
    <div class="mdui-col-xs-6 mdui-clearfix">
        <div class="mdui-valign mdui-float-right">
            <span class="zocial-dribbble mdui-typo-display-1" id="dribbble" style="padding: 20px;"></span>
            <span class="zocial-twitter mdui-typo-display-1" id="twitter" style="padding: 20px"></span>
            <span class="zocial-facebook mdui-typo-display-1" id="facebook" style="padding: 20px"></span>
            <span class="zocial-reddit mdui-typo-display-1" id="reddit" style="padding: 20px"></span>
            <span class="zocial-googleplus mdui-typo-display-1" id="googleplus" style="padding: 20px"></span>
        </div>
    </div>
</div>

<script type="text/javascript">
    var inst = new mdui.Drawer('#drawer');
    inst.close();
    $('#menu_btn').click(function() {
        inst.toggle();
    });

    $('#home_btn').click(function() {
        location.href='index.php';
    });
    $('#patient_portal').click(function() {
        location.href='../../patient_portal/patient_login.php';
    });
    $('#admin_panel').click(function() {
        location.href='../../admin_panel/admin_login.php';
    });
    $('#doctor_portal').click(function() {
        location.href='../../doctor_portal/doctor_login.php';
    });
    $('#pathologist_portal').click(function() {
        location.href='../../pathologist_portal/pathologist_login.php';
    });
    $('#find_doctor,#doctor_appointment').click(function() {
        location.href='../../find_doctors.php';
    });
    $('#medical_services').click(function() {
        location.href='medical_services.php';
    });

    $('#dribbble').hover(function(){
            $(this).addClass('mdui-text-color-pink');
        },
        function(){
            $(this).removeClass('mdui-text-color-pink');
        });

    $('#twitter').hover(function(){
            $(this).addClass('mdui-text-color-blue');
        },
        function(){
            $(this).removeClass('mdui-text-color-blue');
        });

    $('#facebook').hover(function(){
            $(this).addClass('mdui-text-color-indigo');
        },
        function(){
            $(this).removeClass('mdui-text-color-indigo');
        });

    $('#reddit').hover(function(){
            $(this).addClass('mdui-text-color-deep-orange');
        },
        function(){
            $(this).removeClass('mdui-text-color-deep-orange');
        });

    $('#googleplus').hover(function(){
            $(this).addClass('mdui-text-color-red');
        },
        function(){
            $(this).removeClass('mdui-text-color-red');
        });

</script>
</body>
</html>