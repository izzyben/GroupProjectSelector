<?php
session_start();
require_once 'dbconnect.php'; // Establishing connection with our database
$username = $_SESSION['username'];

//// FROM (http://www.mysqltutorial.org/php-querying-data-from-mysql-table/)
//try {
//    $pdo = new PDO("mysql:host=$connectstr_dbhost;dbname=$connectstr_dbname", $connectstr_dbusername, $connectstr_dbpassword);
//
//
//
//    $q = $pdo->query("SELECT * FROM active_users ORDER BY username");
//$q->setFetchMode(PDO::FETCH_ASSOC);
//} catch (PDOException $e) {
//die("Could not connect to the database $connectstr_dbname :" . $e->getMessage());
//}

?>


<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome|Administrator</title>

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
    <link rel="stylesheet" href="css/adminprof.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
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
                <li class="mdl-menu__item"><a href="index.html"><?php session_abort(); ?>Logout</li>
            </ul>
        </div>
    </header>
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
            <img src="images/user.jpg" class="demo-avatar">
            <div class="demo-avatar-dropdown">
                <span><p>Administrator</p></span>
                <div class="mdl-layout-spacer"></div>
                <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <li class="mdl-menu__item">Change Profile Picture</li>
                    <li class="mdl-menu__item"><i class="material-icons">add</i><a onclick="document.getElementById('id01').style.display='block'"> Create Group...</a></li>
                </ul>
            </div>
        </header>
        <div class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
            <button class="mdl-navigation__link tablinks" href=""  onclick="openMenu(event,'Hme')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">home</i><b style="color: #0d47a1"> Home</b></button>
            <button class="mdl-navigation__link tablinks" href=""  onclick="openMenu(event,'Inb')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">inbox</i><b style="color: #0d47a1">Inbox</b></button>
            <button class="mdl-navigation__link tablinks" href="" onclick="openMenu(event,'Msg')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">forum</i><b style="color: #0d47a1">Send Message</b></button>
            <button class="mdl-navigation__link tablinks" href="" onclick="openMenu(event,'Req')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">report</i><b style="color: #0d47a1">Requests</b></button>
            <button class="mdl-navigation__link tablinks" href="" onclick="openMenu(event,'Upd')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">flag</i><b style="color: #0d47a1">Updates</b></button>
            <button class="mdl-navigation__link tablinks" href="" onclick="openMenu(event,'Grp')"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i><b style="color: #0d47a1">Groups</b></button>
            <a class="mdl-layout-spacer"></a>
        </div>


        <!--Javascript for Text File Upload-->
        <script type="text/javascript">
            function readSingleFile(evt) {
                //Retrieve the first (and only!) File from the FileList object
                var f = evt.target.files[0];

                if (f) {
                    var r = new FileReader();
                    r.onload = function(e) {
                        var contents = e.target.result;
                        alert( "Got the file.\n"
                            +"name: " + f.name + "\n"
                            +"type: " + f.type + "\n"
                            +"size: " + f.size + " bytes\n"
                            + "starts with: " + contents.substr(1, contents.indexOf("\n"))
                        );
                        document.getElementById('textfilearea').value=  contents;
                    }
                    r.readAsText(f);

                } else {
                    alert("Failed to load file");
                }
            }

            document.getElementById('listupload').addEventListener('change', readSingleFile, false);
        </script>




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

        <script>
            function groupNumber(val) {
                document.getElementById('grpnum').value=val;
            }

            function studentNumber(val) {
                document.getElementById('studnum').value=val;
            }


        </script>


    </div>
    <main class="mdl-layout__content mdl-color--grey-100">
        <div class="mdl-grid demo-content">
            <div id="Hme" class="tabcontent">
                <h3>Where does it come from?</h3>
                <p>God is great</p>
            </div>

            <div id="Inb" class="tabcontent">
            <h3>Where does it come from?</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div id="Msg" class="tabcontent">
                <h3>Where does it come from?</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div id="Req" class="tabcontent">
                <h3>Where does it come from?</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div id="Upd" class="tabcontent">
                <h3>Where does it come from?</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

            <div id="Grp" class="tabcontent">
                <h3>Where does it come from?</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>

        </div>
    </main>
</div>

!--Create Group Popup Box-->
<section id="id01" class="modal" style="cursor:pointer">
    <section class="modal-form animate-zoom" style="max-width: 500px; cursor:auto">
        <section class="modal-center"><br>
            <header class="demo-header mdl-color--green-100 is-casting-shadow">
                <span class="mdl-layout-title">Create Random Groups</span>
                <span onclick="document.getElementById('id01').style.display='none'" class="closebtn closebtn-size closebtn-position closebtn:hover closebtn:focus" title="Close Form">&times</span>
            </header>
            <img src="images/grouppic.png" alt="Change upload photo" style="width: 40%" class="changepic">
            <form action="creategroup.php" style="align-self: auto">
                <label>Project Name</label>
                <input class="profilename" type="text" onblur=value='Optional' onfocus="value=''" style=" border-radius: 10% ;width: 50%;-webkit-appearance: textfield;-webkit-writing-mode: horizontal-tb;background-color: white;-webkit-rtl-ordering: logical;user-select: text"><br><br>

                <label>Number of Groups</label>
                <input type="range" min="2" max="30" value="2" onchange="groupNumber(this.value);">
                <input type="text" id="grpnum" value="2" style="width: 4%; border: hidden "><br><br>

                <label>Students Per Group</label>
                <input type="range" min="2" max="10" value="2" onchange="studentNumber(this.value);">
                <input type="text" id="studnum" value="2" style="width: 4%; border: hidden "><br><br>

                <textarea autofocus="autofocus" id="textfilearea" style="width: 20em; height: 13.5em" onblur="this.placeholder='Please Type the Names of Students to be Grouped in a line each....'" onfocus="this.placeholder=''"></textarea><br>
                <label>Upload List: </label><input type="file" name="listUpload" value="Upload List" id="listUpload" onclick="readSingleFile()">

            </form>
        </section>
        <section class="form-container clearfix">
            <form action="fileupload.php" method="post" enctype="multipart/form-data">
                <button type="button" name="cancelgrp" style="background-color: #e53935" class="regcancelbtn">Cancel Group Creation</button>
                <button type="submit" class="regcancelbtn" style="background-color: seagreen" name="grpcreate">Create Group</button>
            </form>
        </section>
    </section>
</section>

<script src="Javascript/material.min.js"></script>
</body>
</html>
