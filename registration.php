<?php
/**
 * Created by PhpStorm.
 * User: Izzy Ben
 * Date: 13/04/2017
 * Time: 06:01
 */

include("dbconnect.php"); // Establishing connection with our database

$username= $_POST['usn'];
$password= $_POST['psw'];
$email= $_POST['usn'];
$r_password= $_POST['psw-repeat'];

$first_name = stripslashes($first_name);
$username = stripslashes($username);
$password = stripslashes($password);
$email = stripslashes($email);
$r_password = stripslashes($r_password);

$u_sql = "SELECT username FROM users WHERE username='$username;";
$e_sql = "SELECT email FROM users WHERE email='$email';";

$u_result = mysqli_query($db,$u_sql);
$e_result = mysqli_query($db,$e_sql);

if ( mysqli_num_rows($u_result) == 1){
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Username is Taken. Please Choose another Username');\n";
    echo "window.location='index.html'";
    echo "</script>";
}

if ( mysqli_num_rows($e_result) == 1) {
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Email is Already Registered');\n";
    echo "window.location='index.html'";
    echo "</script>";
}

if ($password != $r_password) {
    echo("Error... Passwords do not match");
    exit;
}