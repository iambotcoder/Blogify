<?php
$username = "root"; //mysql username
$password = ""; //mysql password
$hostname = "localhost"; //hostname
$databasename = 'Blogify'; //databasename
$connecDB = mysqli_connect($hostname, $username, $password, $databasename)or die('Could not connect to the database');
?>