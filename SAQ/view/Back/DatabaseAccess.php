<?php session_start(); ?> 
<html>
<body>
 <?php
 //change as need to match databases in mysql bench
$servername = "localhost";
$username = "root";
$password = "1234";
$db = "saq";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

</body>
</html>