<?php
/**
 * Created by PhpStorm.
 * User: Izzy Ben
 * Date: 13/04/2017
 * Time: 06:01
 */

include("dbconnect.php"); // Establishing connection with our database

//$username= $_POST['usn'];
//$password= $_POST['psw'];
//$email= $_POST['usn'];
//$r_password= $_POST['psw-repeat'];
//
//$first_name = stripslashes($first_name);
//$username = stripslashes($username);
//$password = stripslashes($password);
//$email = stripslashes($email);
//$r_password = stripslashes($r_password);
//
//$u_sql = "SELECT username FROM users WHERE username=$username;";
//$e_sql = "SELECT email FROM users WHERE email=$email;";
//
//$u_result = mysqli_query($db,$u_sql);
//$e_result = mysqli_query($db,$e_sql);
//
//if ( mysqli_num_rows($u_result) != 0){
//    echo "<script language=\"JavaScript\">\n";
//    echo "alert('Username is Taken. Please Choose another Username');\n";
//    echo "window.location='index.html'";
//    echo "</script>";
//}
//
//elseif ( mysqli_num_rows($e_result) != 1) {
//    echo "<script language=\"JavaScript\">\n";
//    echo "alert('Email is Already Registered');\n";
//    echo "window.location='index.html'";
//    echo "</script>";
//}
//
//elseif ($password != $r_password) {
//    echo("Error... Passwords do not match");
//    exit;
//}
//
//else{
//    echo "<script language=\"JavaScript\">\n";
//    echo "alert('Registration Successful!!');\n";
//    echo "alert('You can Login When the Page is Refreshed');";
//    echo "window.location='index.html'";
//    echo "</script>";
//}

$usernameErr = $emailErr = $passwordErr = $r_passwordErr = $last_nameErr = $first_nameErr = "";
$username = $email = $password = $r_password = $last_name = $first_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = test_input($_POST["usn"]);
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["psw"]);
    $r_password = test_input($_POST["psw-repeat"]);
    $first_name = test_input($_POST["f-name"]);
    $last_name = test_input($_POST["l-name"]);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["usn"])) {
        $usernameErr = "Name is required";
    } else {
        $username = test_input($_POST["usn"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
            $usernameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["psw"])) {
        $passwordErr = "Password is Required";
    } else {
        $password = test_input($_POST["psw"]);
    }

    if (empty($_POST["f-name"])) {
        $first_nameErr = "Input Your First Name";
    } else {
        $first_name = test_input($_POST["f-name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
            $first_nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["l-name"])) {
        $last_nameErr = "Input Your Last Name";
    } else {
        $last_name = test_input($_POST["l-name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
            $last_nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["psw-repeat"])) {
        $r_passwordErr = "Please Confirm Your Password";
    } else {
        $r_password = test_input($_POST["psw-repeat"]);
    }
}