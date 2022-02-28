 <?php session_start(); ?> 
<html>
<body>
 <?php $name = $_POST["Pname"];
$Pass = $_POST["pass"]; ?>
 <?php
 include 'DatabaseAccess.php';
//this will be replace with an input statment
$ProfessorNum = $name;
$password = $Pass;
//the student number will be the username
//the sqlID works echo $sqlID;
$sqlID = "SELECT ProfessorID From Professor where ProfessorID = ". $ProfessorNum;
$sqlPass = "SELECT Password From Professor where ProfessorID = ". $ProfessorNum;
$IDcheck = mysqli_query($conn, $sqlID);
$PassCheck = mysqli_query($conn,$sqlPass);
if(mysqli_num_rows($IDcheck) > 0 && mysqli_num_rows($PassCheck) > 0){
		$_SESSION["ProfessorID"] = $name;
		$_SESSION["Password"] = $Pass;
		header("location: ../ProfessorModel.php");
}
else{
	echo " wrong ID";
	header("location: ../ProfessorLogin.html");
}
mysqli_close($conn);
?>
</body>
</html>
