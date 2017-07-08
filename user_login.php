<?php include("header.php"); ?>


<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col"></div>
    <div class="mdl-cell mdl-cell--4-col">
        <div class="mdl-card mdl-shadow--6dp">
            <div class="mdl-card__title mdl-color--primary mdl-color-text--white">
                <h2 class="mdl-card__title-text">Patient Login</h2>
            </div>
            <div class="mdl-card__supporting-text">
                <form action="#">
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="text" id="username" />
                        <label class="mdl-textfield__label" for="username">Username</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input class="mdl-textfield__input" type="password" id="userpass" />
                        <label class="mdl-textfield__label" for="userpass">Password</label>
                    </div>
                </form>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Log in</button>
                <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Forget Password</button>
                <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Sign Up</button>
            </div>
        </div>
    </div>
    <div class="mdl-cell mdl-cell--4-col"></div>
</div>


<?php include("footer.php"); ?>
