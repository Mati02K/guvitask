<?php

// Developement Environment
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "guvi";

// Connection credentials
$servername = "remotemysql.com";
$username = "zzmlknS7k2";
$password = "iQjKgG0s3H";
$dbname = "zzmlknS7k2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}

?>