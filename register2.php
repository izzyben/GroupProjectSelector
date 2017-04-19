<?php

include ("dbconnect.php");

if (isset($_POST['signup1']))
{
    $username = $_POST['usn'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $first_name = $_POST['first'];
    $last_name = $_POST['last'];


    $user_check = $link->query("SELECT * FROM users WHERE username = '" . $username . "' OR email = '" . $email . "'");

    if ($user_check->num_rows == 1) {

        echo "<script language='JavaScript'> alert('User ALready Exists'); </script>";
    }
    else {

        $sql = "INSERT INTO users (Firstname,Lastname,username,password,email) VALUES ('$first_name','$last_name','$username','$password','$email');";

        $result = mysqli_query($db, $sql);
        if ($result) {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Registration Successful!');\n";
            echo "window.location='index.html'";
            echo "</script>";
            header("location: index.html"); // Redirecting to Home Page
        } else {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Username or Password was incorrect!');\n";
            echo "window.location='index.html'";
            echo "</script>";
        }
    }
}