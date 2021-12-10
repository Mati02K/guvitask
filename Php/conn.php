<?php

// Developement Environment
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "guvi";

// Connection credentials
$servername = "zzmlkns7k2.cotrxnkbw2g8.ap-south-1.rds.amazonaws.com";
$username = "zzmlknS7k2";
$password = "iQjKgG0s3H";
$dbname = "zzmlknS7k2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) 
{
  die("Connection failed : " . $conn->connect_error);
}
else
{
  // $sql = "CREATE TABLE `user_details` (
  //   `user_id` int(11) NOT NULL,
  //   `u_name` varchar(200) NOT NULL,
  //   `u_cno` varchar(200) NOT NULL,
  //   `u_email` varchar(200) NOT NULL,
  //   `u_dob` date NOT NULL,
  //   `u_addr` varchar(200) NOT NULL,
  //   `username` varchar(200) NOT NULL,
  //   `userpass` varchar(200) NOT NULL,
  //   `u_token` varchar(255) NOT NULL
  // ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    
  //   if ($conn->query($sql) === TRUE) {
  //     echo "Table user_details created successfully";
  //   } else {
  //     echo "Error creating table: " . $conn->error;
  //   }
}
?>