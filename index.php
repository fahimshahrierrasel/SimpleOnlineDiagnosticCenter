<?php include("./includes/components/header.php"); ?>

<div class="mdui-row">
    <div class="mdui-col-xs-12 header-part">
        <div style="padding: 10%;">
            <div class="mdui-typo-display-3 mdui-text-center mdui-text-color-white-text" style="padding: 2%">
                An easy way to get<br/>medical services online
            </div>
            <div class="mdui-text-center">
                <button data-scroll-tp class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-pink header-part-btn mdui-text-capitalize">Make Doctor Appointment</button>
                <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-pink header-part-btn mdui-text-capitalize">Register for Test</button>
            </div>
        </div>
        <a class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-white mdui-btn-icon arrowdown-btn" id="next_div"><i class="mdui-icon material-icons">keyboard_arrow_down</i></a>
    </div>
</div>

<div class="mdui-row" id="div-2" style="margin-top: 30px">
    <div class="mdui-col-xs-6 appointment-div"></div>
    <div class="mdui-col-xs-6">
        <div class="mdui-typo-display-2-opacity mdui-p-a-1">
            Make appointment<br/>from online
        </div>
        <div class="mdui-typo-body-2 mdui-p-a-1">
            Online Diagnostice Center is a fast way to make an appointment to your doctor.
        </div>
    </div>
</div>
<div class="mdui-row" id="div-3" style="margin-top: 30px">

    <div class="mdui-col-xs-6">
        <div class="mdui-typo-display-2-opacity mdui-p-a-1">
            Register for <br/>medical test
        </div>
        <div class="mdui-typo-body-2 mdui-p-a-1">
            Online Diagnostice Center is a fast way to make an appointment to your doctor.
        </div>
    </div>
    <div class="mdui-col-xs-6 test-div"></div>
</div>
<div class="mdui-row" id="div-3" style="margin-top: 30px">
    <div class="mdui-col-xs-6 reports-div" >

    </div>
    <div class="mdui-col-xs-6">

    </div>
</div>

<div class="mdui-row" id="div-3" style="margin-top: 30px">
    <div class="mdui-col-xs-6 mdui-text-center mdui-p-a-5">
        <i class="mdui-icon material-icons mdui-typo-display-4 mdui-p-a-2">accessibility</i>
        <div class="mdui-typo-headline mdui-p-a-2">Get Freedom</div>
        <div class="mdui-typo-body-1 mdui-p-a-1">
            All your financial information in Google Wallet is encrypted and stored on Google’s protected servers in secure locations. If needed, you can quickly remove access to your account on any device at
        </div>
    </div>
    <div class="mdui-col-xs-6 mdui-text-center mdui-p-a-5">
        <i class="mdui-icon material-icons mdui-typo-display-4 mdui-p-a-2">favorite</i>
        <div class="mdui-typo-headline mdui-p-a-2">Have Everything</div>
        <div class="mdui-typo-body-1 mdui-p-a-1">
            All your financial information in Google Wallet is encrypted and stored on Google’s protected servers in secure locations. If needed, you can quickly remove access to your account on any device at
        </div>
    </div>
</div>

<script>
    $("#next_div").click(function() {
        $('html,body').animate({
                scrollTop: $("#div-2").offset().top-64},
            1500);
    });
</script>

<?php include("./includes/components/footer.php"); ?>
