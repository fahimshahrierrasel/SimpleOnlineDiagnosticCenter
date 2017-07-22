</div>
<footer>
    <div class="mdui-container mdui-color-grey" style="width: 100%;">
        <div class="mdui-row" >
            <div class="mdui-col-sm-3 mdui-col-xs-6">
                <h4>community</h4>
                <ul>
                    <li><a class="mdui-btn appbar-link-text" href="https://github.com/zdhxiong/mdui/issues" target="_blank">Github issue</a></li>
                </ul>
            </div>
            <div class="mdui-col-sm-3 mdui-col-xs-6">
                <h4>Resources</h4>
                <ul>
                    <li><a class="mdui-btn appbar-link-text" href="./docs" target="_blank">Docs</a></li>
                    <li><a class="mdui-btn appbar-link-text" href="./design" target="_blank">Design</a></li>
                </ul>
            </div>
            <div class="mdui-col-sm-6 mdui-hidden-xs mdui-text-center">
                <h4>sponsor</h4>
                <ul>
                    <li>MDUI is a License of MIT。</li>
                </ul>
                <button class="mdui-btn mdui-color-theme-accent mdui-ripple" mdui-dialog="{target: '#dialog-donate'}">Sponsorship</button>
            </div>
        </div>
    </div>
</footer>
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