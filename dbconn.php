<?php
// db_connection.php

$host = 'localhost';      // or your database host
$user = 'root';           // your database username
$password = '';           // your database password
$dbname = 'crm_db'; // your database name

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
