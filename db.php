<?php
$servername = "localhost";
$username = "AndreaD";
$password = "clipCLOP47?";
$dbname = "comau125_andrea";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// echo "Database Login successful<br>";
