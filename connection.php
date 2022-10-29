<?php

$dbname = "shamrock";
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection

if (!$conn) {
  die('<script>alert("Connection failed: ")</script>' . mysqli_connect_error());
}



// mysqli_close($conn);

?>
