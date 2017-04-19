<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome|Student</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="images/favicon.png">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/material.min.css">
    <link rel="stylesheet" href="css/studentprofile.css">
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>
</head>
<body>
<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Home</span>
            <div class="mdl-layout-spacer"></div>

            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item">Logout</li>
            </ul>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="images/user.jpg" class="demo-avatar">
            <div class="demo-avatar-dropdown">
                <span><label><?php echo $_POST["username"];?></label><p>Student</p></span>
                <div class="mdl-layout-spacer"></div>
                <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <li class="mdl-menu__item">Change Profile Picture</li>
                </ul>
            </div>
        </header>
        <div class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <button class="mdl-navigation__link tablinks"  href="" onclick="openMenu(event,'Hme')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i><b style="color: #0d47a1">Home</b></button>
            <button class="mdl-navigation__link tablinks" href="" onclick="openMenu(event,'Inb')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i><b style="color: #0d47a1">Inbox</b></button>
            <button class="mdl-navigation__link tablinks" href="" onclick="openMenu(event,'Msg')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><b style="color: #0d47a1">Send Message</b></button>
            <button class="mdl-navigation__link tablinks" href="" onclick="openMenu(event,'Grp')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i><b style="color: #0d47a1">Group</b></button>
            <div class="mdl-layout-spacer"></div>
        </div>
    </div>

    <!--Javascript for Menu Navigation-->
    <script>
        function openMenu(evt, menuName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the link that opened the tab
            document.getElementById(menuName).style.display = "block";
            evt.currentTarget.className += " active";
        }

    </script>


    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <div id="Hme" class="tabcontent">
                <h3>Thank God it worked!!!!</h3>
                <p>God is great</p>
            </div>

            <div id="Inb" class="tabcontent">
                <h3>Thank God</h3>
                <p>God is great forever</p>
            </div>

            <div id="Msg" class="tabcontent">
                <h3>Thank God</h3>
                <p>Message Tab</p>
            </div>

            <div id="Grp" class="tabcontent">
                <h3>Thank God</h3>
                <p>Group Tab</p>
            </div>

        </div>
    </main>
</div>

<script src="Javascript/material.min.js"></script>
</body>
</html>
