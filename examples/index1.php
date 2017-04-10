<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Welcome|Group Project Team Selector (GPTS)</title>
    <link href="assets/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Login</h1><br><br>
<form action="../login.php" method="post">
    <input type="text" name="username" placeholder="Username" /><br><br>
    <input type="password" name="password" placeholder="Password" /><br><br>
    <input type="submit" name="submit" value="Log In" />
    <?php
    $reasons = array("password"=>"Wrong Username or Password", "blank"=> "You have left one or more fields blank.");
    if ($_GET["loginFailed"]){
        echo $reasons[$_GET["reason"]];
    }
    ?>
</form>

</body>
</html>