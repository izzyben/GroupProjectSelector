<?php
define('DB_SERVER', 'your-azure-server');
define('DB_USERNAME', 'your-user name' );
define('DB_PASSWORD', 'your-password');
define('DB_DATABASE', 'your-database');
$db = mysqli_connect( DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
?>
