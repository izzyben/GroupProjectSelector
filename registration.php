<?php
/**
 * Created by PhpStorm.
 * User: Izzy Ben
 * Date: 13/04/2017
 * Time: 06:01
 */

include("dbconnect.php"); // Establishing connection with our database

if(empty($_POST[ 'usn'])){
    echo "Both fields are required.";
}