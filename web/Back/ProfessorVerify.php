<<<<<<< HEAD
 <?php session_start(); ?> 
 <?php $name = $_POST["Pname"];
  if(empty($name)||ctype_space($name)){
	 header("location: ../ProfessorLogin.php");
 }
$Pass = $_POST["pass"]; 

 if(empty($Pass)||ctype_space($Pass)){
	 header("location: ../ProfessorLogin.php");
 }?>

 <?php
 include 'DatabaseAccess.php';
//this will be replace with an input statement
$ProfessorNum = $name;
$password = $Pass;
//the student number will be the username
//the sqlID works echo $sqlID;
$sqlID = "SELECT ProfessorID From Professor where ProfessorID = ". $ProfessorNum;
$sqlPass = "SELECT Password From Professor where ProfessorID = ". $ProfessorNum;
$sqlLName = "SELECT ProfessorNameL From Professor where ProfessorID = ". $ProfessorNum;
$IDcheck = $pdo->prepare($sqlID);
$IDcheck->execute();
$PassCheck = $pdo->prepare($sqlPass);
$PassCheck->execute();
$IDrowcount = $IDcheck->rowcount();
$passrowcount = $PassCheck->rowcount();

//this might return professor last name
$LastName = $pdo->prepare($sqlLName);
$LastName->execute();
$LName = $LastName->fetchColumn(0);
if($IDrowcount > 0 && $passrowcount > 0){
		$_SESSION["ProfessorID"] = $name;
		$_SESSION["Password"] = $Pass;
		$ProfessorL = $LName;
		$_SESSION["PLastName"] = $ProfessorL;
		header("location: ../ProfessorModel.php");
}
else{
		echo " wrong ID";
		header("location: ../ProfessorLogin.html");
}
?>
=======
 <?php session_start(); ?> 
 <?php $name = $_POST["Pname"];
  if(empty($name)||ctype_space($name)){
	 header("location: ../ProfessorLogin.php");
 }
$Pass = $_POST["pass"]; 

 if(empty($Pass)||ctype_space($Pass)){
	 header("location: ../ProfessorLogin.php");
 }?>

 <?php
 include 'DatabaseAccess.php';
//this will be replace with an input statement
$ProfessorNum = $name;
$password = $Pass;
//the student number will be the username
//the sqlID works echo $sqlID;
$sqlID = "SELECT ProfessorID From Professor where ProfessorID = ". $ProfessorNum;
$sqlPass = "SELECT Password From Professor where ProfessorID = ". $ProfessorNum;
$sqlLName = "SELECT ProfessorNameL From Professor where ProfessorID = ". $ProfessorNum;
$IDcheck = $pdo->prepare($sqlID);
$IDcheck->execute();
$PassCheck = $pdo->prepare($sqlPass);
$PassCheck->execute();
$IDrowcount = $IDcheck->rowcount();
$passrowcount = $PassCheck->rowcount();

//this might return professor last name
$LastName = $pdo->prepare($sqlLName);
$LastName->execute();
$LName = $LastName->fetchColumn(0);
if($IDrowcount > 0 && $passrowcount > 0){
		$_SESSION["ProfessorID"] = $name;
		$_SESSION["Password"] = $Pass;
		$ProfessorL = $LName;
		$_SESSION["PLastName"] = $ProfessorL;
		header("location: ../ProfessorModel.php");
}
else{
		echo " wrong ID";
		header("location: ../ProfessorLogin.html");
}
?>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
