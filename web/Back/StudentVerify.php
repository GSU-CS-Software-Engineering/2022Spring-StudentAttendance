<<<<<<< HEAD
 <?php session_start();
 $name = $_POST["Sname"];
 if(empty($name)||ctype_space($name)){
	 header("location: ../studentLogin.php");
 }
 include 'DatabaseAccess.php';
//this will be replace with an input statment
$studentNum = $name;
//the student number will be the username
//the sqlID works echo $sqlID;
$sqlID = 'SELECT StudentID From Student where StudentID = '. $studentNum;
//the studnet SSN will be the password
$IDcheck = $pdo->prepare($sqlID);
$IDcheck->execute();
$rowCount = $IDcheck->rowcount();
//this will select the student first and last name
$sqlSFName = "SELECT StudentFName From Student where StudentID =" . $studentNum;
$SFirstName = $pdo->prepare($sqlSFName);
$SFirstName->execute();
$SFName = $SFirstName->fetchColumn(0);
if($rowCount > 0){
		$_SESSION["StudentID"] = $name;
		$StudentF = $SFName;
		$_SESSION["SFirstName"] = $StudentF;
		$_SESSION['last_login_timestamp'] = time();
		header("location: ../StudentModel.php");
}
else{
		
		header("location: ../studentLogin.php");
}
=======
 <?php session_start();
 $name = $_POST["Sname"];
 if(empty($name)||ctype_space($name)){
	 header("location: ../studentLogin.php");
 }
 include 'DatabaseAccess.php';
//this will be replace with an input statment
$studentNum = $name;
//the student number will be the username
//the sqlID works echo $sqlID;
$sqlID = 'SELECT StudentID From Student where StudentID = '. $studentNum;
//the studnet SSN will be the password
$IDcheck = $pdo->prepare($sqlID);
$IDcheck->execute();
$rowCount = $IDcheck->rowcount();
//this will select the student first and last name
$sqlSFName = "SELECT StudentFName From Student where StudentID =" . $studentNum;
$SFirstName = $pdo->prepare($sqlSFName);
$SFirstName->execute();
$SFName = $SFirstName->fetchColumn(0);
if($rowCount > 0){
		$_SESSION["StudentID"] = $name;
		$StudentF = $SFName;
		$_SESSION["SFirstName"] = $StudentF;
		$_SESSION['last_login_timestamp'] = time();
		header("location: ../StudentModel.php");
}
else{
		
		header("location: ../studentLogin.php");
}
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
?>