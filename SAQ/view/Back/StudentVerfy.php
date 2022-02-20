 <?php session_start(); ?> 
<html>
<body>
 <?php $name = $_POST["Sname"]; ?>
 <?php
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
//this will be replace with an input statment
$studentNum = $name;
//the student number will be the username
//the sqlID works echo $sqlID;
$sqlID = "SELECT StudentID From Student where StudentID = ". $studentNum;
//the studnet SSN will be the password
$IDcheck = mysqli_query($conn, $sqlID);
if(mysqli_num_rows($IDcheck) > 0){
		$_SESSION["StudentID"] = $name;
		header("location: ../StudentModel.html");
}
else{
	echo " wrong ID";
	header("location: ../StudentLogin.html");
}
mysqli_close($conn);
?>
</body>
</html>