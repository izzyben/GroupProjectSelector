<?php

include ("dbconnect.php");

if (isset($_POST['signup1']))
{
    $username = $_POST['usn'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $first_name = $_POST['first'];
    $last_name = $_POST['last'];

    $sql = "INSERT INTO users ('Firstname','Lastname','username','password','email') VALUES ('$first_name','$last_name','$username','$password','$email');";

    $result = mysqli_query($db, $sql);
    if ($result) {
        echo "Success!! Login";
        header("location: index.html"); // Redirecting to Home Page
    }
    else {
        echo "<script language='JavaScript'> alert('Error in registering'); </script>";
        echo "<script type='text/javascript'> window.location='index.php'</script>";
    }
}