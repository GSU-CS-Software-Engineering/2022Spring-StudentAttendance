 <?php session_start(); ?> 
<html>
<body>
 <?php $name = $_POST["Sname"]; ?>
 <?php
 include 'DatabaseAccess.php';
//this will be replace with an input statment
$studentNum = $name;
//the student number will be the username
//the sqlID works echo $sqlID;
$sqlID = "SELECT StudentID From Student where StudentID = ". $studentNum;
//the studnet SSN will be the password
$IDcheck = mysqli_query($conn, $sqlID);
if(mysqli_num_rows($IDcheck) > 0){
		$_SESSION["StudentID"] = $name;
		header("location: ../StudentModel.php");
}
else{
	echo " wrong ID";
	header("location: ../StudentLogin.html");
}
mysqli_close($conn);
?>
</body>
</html>