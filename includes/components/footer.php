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
        <div class="mdui-valign mdui-float-right" style="font-size: 200%;">
            <span class="zocial-dribbble" style="padding: 20px"></span>
            <span class="zocial-twitter" style="padding: 20px"></span>
            <span class="zocial-facebook" style="padding: 20px"></span>
            <span class="zocial-reddit" style="padding: 20px"></span>
            <span class="zocial-googleplus" style="padding: 20px"></span>
        </div>
    </div>
</div>

<script type="text/javascript">
    var inst = new mdui.Drawer('#drawer');
    inst.close();
    $('#menu_btn').click(function() {
        inst.toggle();
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
</script>
</body>
</html>