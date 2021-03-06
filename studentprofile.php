<?php
session_start();
require_once 'dbconnect.php'; // Establishing connection with our database
$username = $_SESSION['username'];

// FROM (http://www.mysqltutorial.org/php-querying-data-from-mysql-table/)
try {
    $pdo = new PDO("mysql:host=$connectstr_dbhost;dbname=$connectstr_dbname", $connectstr_dbusername, $connectstr_dbpassword);


    $q = $pdo->query("SELECT Lastname,Firstname,email FROM users WHERE username = '$username'");
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $connectstr_dbname :" . $e->getMessage());
}

$pdo = null;
?>
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
    <link rel="stylesheet" href="/css/style.css" type="text/css" /> <!--Link to My Stylesheet-->


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
            <span class="mdl-layout-title"><?php echo $username;?>'s Profile</span>
            <div class="mdl-layout-spacer"></div>

            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="hdrbtn">
                <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hdrbtn">
                <li class="mdl-menu__item"><a href="index.html"><?php session_abort(); ?> Logout</a></li>
            </ul>
        </div>
    </header><br><br>

    <div id="Prof" style="width: 80%; margin-left: 20%">
        <?php while ($row = $q->fetch()): ?>
        <label> First Name: <?php echo htmlspecialchars($row['Firstname']) ?> </label><br><br>
        <label> Last Name: <?php echo htmlspecialchars($row['Lastname']) ?> </label><br><br>
        <label> Email Address: <?php echo htmlspecialchars($row['email']) ?> </label><br><br>
        <?php endwhile; ?>
    </div>

    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="images/user.jpg" class="demo-avatar">
            <section class="demo-avatar-dropdown">
                <span><?php echo $username;?><p>Student</p></span>
                <div class="mdl-layout-spacer"></div>
                <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                </button>
                <section>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <li class="mdl-menu__item"><a onclick="document.getElementById('id03').style.display='block'; document.getElementById('Prof').style.display='none'">Change Profile Picture</a></li>
                </ul>
                </section>
            </section>
        </header>
        <div class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <button class="mdl-navigation__link tablinks"  onclick="openMenu(event,'Hme')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i><b style="color: #0d47a1">Home</b></button>
            <button class="mdl-navigation__link tablinks"  onclick="openMenu(event,'Inb')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i><b style="color: #0d47a1">Inbox</b></button>
            <button class="mdl-navigation__link tablinks"  onclick="openMenu(event,'Msg')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><b style="color: #0d47a1">Send Message</b></button>
            <button class="mdl-navigation__link tablinks"  onclick="openMenu(event,'Grp')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i><b style="color: #0d47a1">Group</b></button>
            <div class="mdl-layout-spacer"></div>
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
    </div>

    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <div id="Hme" class="tabcontent">
                <h3>Where does it come from?</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div id="Inb" class="tabcontent">
                <h3>Where does it come from?</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div id="Msg" class="tabcontent">
                <h3>Where does it come from?</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div id="Grp" class="tabcontent">
                <h3>Where does it come from?</h3>
                <p>Group Tab</p>
            </div>

        </div>
    </main>
</div>

<!--Photo Upload Popup Box-->
<section id="id03" class="modal" style="cursor:pointer">
    <section class="modal-form animate-zoom" style="max-width: 500px; cursor:auto">
        <section class="modal-center"><br>
            <span onclick="document.getElementById('id03').style.display='none'" class="closebtn closebtn-size closebtn-position closebtn:hover closebtn:focus" title="Close Form">&times</span>
            <img src="images/profile%20pic.jpg" alt="Change upload photo" style="width: 40%" class="changepic"
        </section>
        <section class="form-container">
            <form action="fileupload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <output id="list"></output>
                <input type="submit" value="Upload Image" name="upload">
            </form>
        </section>
    </section>
</section>

<script src="Javascript/material.min.js"></script>


</body>
</html>
