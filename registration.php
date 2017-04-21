<?php


include("dbconnect.php"); // Establishing connection with our database


if (isset($_POST['signup'])) {
//    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['usn'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    $r_password = $_POST['psw-repeat'];
    $first_name = $_POST['first'];
    $last_name = $_POST['first'];





        $user_check = $db->query("SELECT * FROM users WHERE username = '" . $username . "' OR email = '" . $username . "'");

        if ($user_check->num_rows != 0) {

            echo "<script language=\"JavaScript\">\n";
            echo "alert('Username/Email Address has been Registered!! Login or Register with another Username/Email');\n";
            echo "window.location='index.html'";
            echo "</script>";

        } else {
            $sql = "INSERT INTO users (Firstname,Lastname,username,password,email) VALUES ('$first_name','$last_name','$username','$password','$email');";

            $result = mysqli_query($db, $sql);
            if ($result) {
                echo "Success!! Login";
                header("location: index.html"); // Redirecting to Home Page
            } else {
                echo "<script language='JavaScript'> alert('Error in registering'); </script>";
                echo "<script type='text/javascript'> window.location='index.html'</script>";
            }
        }
    }


