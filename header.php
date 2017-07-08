<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Demo of Online Diagnostic Center Management System">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./libaries/mdl/material.css">
    <link rel="stylesheet" href="style.css">
    <title>Online Diagnostic Center Management</title>
</head>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
            <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title title-text">
<!--            <img class="android-logo-image" src="./images/first-aid-kit.png">-->
              Diagnostic Center
          </span>
                <!-- Add spacer, to align navigation to the right in desktop -->
                <div class="android-header-spacer mdl-layout-spacer"></div>
                <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                        <i class="material-icons">search</i>
                    </label>
                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input" type="text" id="search-field">
                    </div>
                </div>
                <!-- Navigation -->
                <div class="android-navigation-container">
                    <nav class="android-navigation mdl-navigation">
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Find Doctors</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Our Locations</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Medical Services</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Contact</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">About Us</a>
                    </nav>
                </div>
                <span class="android-mobile-title mdl-layout-title title-text">
<!--            <img class="android-logo-image" src="./images/first-aid-kit.png">-->
                    Diagnostic Center
                </span>
            </div>
        </div>

        <div class="android-drawer mdl-layout__drawer">
                  <span class="android-title mdl-layout-title title-text">
<!--            <img class="android-logo-image" src="./images/first-aid-kit.png">-->
              Diagnostic Center
            </span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="index.php">Home</a>
                <a class="mdl-navigation__link" href="">Find Doctors</a>
                <a class="mdl-navigation__link" href="">Our Locations</a>
                <a class="mdl-navigation__link" href="">Medical Services</a>
                <a class="mdl-navigation__link" href="">Contact</a>
                <a class="mdl-navigation__link" href="">About Us</a>
                <div class="android-drawer-separator"></div>
                <span class="mdl-navigation__link">Portals</span>
                <a class="mdl-navigation__link" href="user_login.php">Patient Portal</a>
                <a class="mdl-navigation__link" href="stuff_portals.php">Stuff Portal</a>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div class="page-content">




