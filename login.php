<?php

include("dbconnect.php"); // Establishing connection with our database
if(empty($_POST[ "username"]) || empty($_POST[ "password"]))
 {

     echo "Both fields are required.";
 }else
 {
     $username=$_POST['username'];
     $password=$_POST['password'];

$sql = "SELECT user_id FROM users WHERE (username='$username' OR email='$username') and password='$password'; ";
$type = "SELECT user_id FROM users WHERE (user_type='standard');";
$result1 = mysqli_query($db,$sql);
$result2 = mysqli_query($db,$type);
if( mysqli_num_rows($result1) == 1)
 {
     if ($result1 == $result2) {
         header("location: studentprofile.html"); // Redirecting To Student Profile Page
     }
     else{
         header("location: adminprofile.html"); // Redirecting To Administrator Profile Page
     }
 }
 else
 {
     echo "<script language=\"JavaScript\">\n";
     echo "alert('Username or Password was incorrect!');\n";
     echo "window.location='index.html'";
     echo "</script>";
     //die(header("location:index.html?loginFailed=true&reason=password"));
     //echo "Incorrect username or password. ";
 }
}

$result->close();
$db->close();


?>

