<?php
include("../portal_components/headless.php");
$title = "Patient Login"
?>
<script type="text/javascript">
    document.title = "<?=$title;?>"
</script>
<div class="mdui-card login-card" id="login_card">
    <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
        <div class="mdui-card-primary-title"><?=$title;?></div>
    </div>

    <div class="mdui-card-content">
        <form method="post" action="#">
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Username</label>

                <input class="mdui-textfield-input" type="text" />
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Password</label>

                <input class="mdui-textfield-input" type="password" />
            </div>
        </form>
    </div>
    <div class="mdui-card-actions mdui-float-right">
        <button class="mdui-btn mdui-ripple" id="register_btn">Register</button>
        <button class="mdui-btn mdui-ripple" onclick="location.href='dashboard.php'">Login</button>
    </div>
</div>
<div class="mdui-card login-card mdui-hidden" id="register_card">
    <div class="mdui-card-header mdui-color-indigo" style="height: 100px;">
        <div class="mdui-card-primary-title">Patient Registration
            <button class="mdui-btn mdui-btn-icon mdui-float-right" id="return_login"><i class="mdui-icon material-icons">arrow_back</i></button>
        </div>
    </div>

    <div class="mdui-card-content">
        <form method="post" action="#">
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="text" placeholder="Your Full Name" />
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Sex</label>
                <select class="mdui-textfield-input">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="text" placeholder="Username" />
            </div>
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="email" placeholder="Email" />
            </div>

            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="password" placeholder="Password" />
            </div>
            <div class="mdui-textfield">
                <input class="mdui-textfield-input" type="password" placeholder="Confirm Password" />
            </div>
        </form>
    </div>
    <div class="mdui-card-actions">
        <button class="mdui-btn mdui-ripple  mdui-float-right">Register</button>

    </div>
</div>

<script type="text/javascript">
    $('#register_btn').click(function() {
        $('#login_card').addClass('mdui-hidden');
        $('#register_card').removeClass('mdui-hidden');
    });
    $('#return_login').click(function() {
        $('#register_card').addClass('mdui-hidden');
        $('#login_card').removeClass('mdui-hidden');
    });
</script>

<?php include("../portal_components/footless.php"); ?>
