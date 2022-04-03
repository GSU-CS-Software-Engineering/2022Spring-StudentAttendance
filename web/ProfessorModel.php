<!DOCTYPE html>
 <?php session_start(); ?> 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="refresh" content="30">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #1D40EF;
  overflow-x: hidden;
  padding-top: 20px;

}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #f1f1f1;
  display: block;
  
}

.sidenav a:hover {
  color: #FFD700;  
  background:  radial-gradient(circle at top left, blue 10px, white 11px);
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>
<body>
<?php include 'Back/DatabaseAccess.php';?>
<div class="sidenav">
<!--this will be a slidebar and have create Quiz, Edit Quiz, push Quiz-->
  <a href="quizzes.php">Quiz</a>
<!--this slidebar can upload Notes and delete notes-->
  <a href="#Notes">Notes</a>
<!--this is for view grades of all student-->
  <a href="#Grades">Grades</a>
<!-- this is a button that create  a qr code-->
    <a href="QR.php">QR code</a>
  <a href="#create">CreatePS</a>
  <!-- change href to a php that cancels the session for php-->
  <a href='index.php' class = "block">Logout</button></a>
  <p> &nbsp;&nbsp;&nbsp;</p>
  <img src="GSUsymbol.jpg" width="100" height="100">
</div>
<div class="main">
  <h2>Welcome, Professor <?Php
  $sqlName = $_SESSION["PLastName"]." ";
  $name = $sqlName;
   print $name; 
?>

<?Php 
	//this are query to get the student name
	$sqlStudent = "SELECT StudentFname, StudentLname, StudentID, Attendence FROM Student";
	$sqlAttendence = "SELECT Attendence FROM Student";
	$sqlStudentFirstName = "SELECT StudentFname FROM Student";
	$sqlStudentLastName = "SELECT StudentLname FROM Student";
	$sqlStudentID = "SELECT StudentID FROM Student";
	//prepare sql statment
	$Student = $pdo->prepare($sqlStudent, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
	$Attendence = $pdo->prepare($sqlAttendence);
	$StudentFirstName = $pdo->prepare($sqlStudentFirstName);
	$StudentLastName = $pdo->prepare($sqlStudentLastName);
	$StudentID = $pdo->prepare($sqlStudentID);
	// excurte statments
	$Student->execute();
	$Attendence->execute();
	$StudentFirstName->execute();
	$StudentLastName->execute();
	$StudentID->execute();
	$rowCount = $StudentID->rowCount();
	//this is to create card exmamples
		$Student =$Student->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
		$StudentAttendence = $Attendence->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
		$StudentFirstName = $StudentFirstName->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
		$StudentLastName = $StudentLastName->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
		$StudentID = $StudentID->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
	if ($rowCount > 0) {
       //thsi will create a card for every row in the database	
	   for($i = 0; $i <= $rowCount-1; $i++){
	   if($StudentAttendence[$i] == 1){
	echo '<div class="card bg-success text-white" style="width: 18rem; id = "'.$StudentID[$i].'">';
	echo '<div class= "card-body">';
	print $StudentFirstName[$i] ." ".$StudentLastName[$i]." ".$StudentID[$i];
	echo '</div>';
	echo '</div>';
	echo '<p> &nbsp;&nbsp;&nbsp;</p>';
	   }
	   else{
	echo '<div class="card bg-danger text-white" style="width: 18rem; id = "'.$StudentID[$i].'">';
	echo '<div class= "card-body">';
	print $StudentFirstName[$i] ." ".$StudentLastName[$i]." ".$StudentID[$i];
	echo '</div>';
	echo '</div>';
	echo '<p> &nbsp;&nbsp;&nbsp;</p>';  
	   }
	   }
} else {
    echo "0 results";
}
?>
</h2>
</div>
</body>
</html> 