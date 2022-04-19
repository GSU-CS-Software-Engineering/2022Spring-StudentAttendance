<!DOCTYPE html>
<?php session_start(); ?> 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

.table {
  margin-left: 160px; 
  font-size: 28px; 
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>


</head>
</head>
<body>
<?php include 'Back/DatabaseAccess.php';?>
<div class="sidenav">
  <a  id = "bu" href="ProfessorModel.php">Home Page</a>
<!--this will be a slidebar and have create Quiz, Edit Quiz, push Quiz-->
  <a  id = "bu" href="quizzes.php">Quiz</a>
<!--this slidebar can upload Notes and delete notes-->
  <a  id = "bu" href="#Notes">Notes</a>
<!--this is for view grades of all student-->
  <a  id = "bu" href="grades.php">Grades</a>
<!-- this is a button that create  a qr code-->
  <a  id = "bu" href="QR.php">QR Code</a>
  <a  id = "bu" href="manageProfessors.php">Professors</a>
  <a  id = "bu" href="manageStudent.php">Students</a>
  <!-- change href to a php that cancels the session for php-->
  <a href='index.php' class = "block">Logout</button></a>
  <p> &nbsp;&nbsp;&nbsp;</p>
  <div class="text-center">
  <img src="GSUsymbol.jpg" width="100" height="100">
  </div>

  

  

  </div>
  </div>


</div>
<div class="table">
<style type="text/css">
  table {border:ridge 5px black;}
  table td {border: inset 1px #000;}
  table tr#ROW1 {background-color:gray; color:white;}
  table tr#ROW2 {background-color:white;} 

  </style>
  
  <table>
  <?php
  echo '<tr id="ROW1">';
    echo '<th>   Student   </th>';

    $sqlQuizzes = "SELECT COUNT(quizid) FROM quiz";

    $Quizzes = $pdo->prepare($sqlQuizzes);

    $Quizzes->execute();

    $rowCount = (int) $Quizzes->fetchColumn();
    if ($rowCount > 0) {
      for ($i = 0; $i <= $rowCount - 1; $i++) {

        $sqlQuizData = "SELECT quizid FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$i'";

        $quizData = $pdo->prepare($sqlQuizData);

        $quizData->execute();

        $quizID = (int) $quizData->fetchColumn();

        echo '<th>';
        print "Quiz ".$quizID;
        echo '</th>';
      }  
    }
    echo '</tr>';

  $sqlStudent = "SELECT * FROM Student";

	$Student = $pdo->prepare($sqlStudent);

	$Student->execute();

	$rowCount = $Student->rowCount();
  if ($rowCount > 0) {
	   for($i = 1; $i <= $rowCount; $i++){ 
		
			$sqlStudentFirstName = "SELECT StudentFname FROM Student Where StudentNumber =".$i;
			$sqlStudentLastName = "SELECT StudentLname FROM Student Where StudentNumber =".$i;
			
			$StudentFirstName = $pdo->prepare($sqlStudentFirstName);
			$StudentLastName = $pdo->prepare($sqlStudentLastName);
			
			$StudentFirstName->execute();
			$StudentLastName->execute();

			$StudentFirstName = $StudentFirstName->fetchColumn();
			$StudentLastName = $StudentLastName->fetchColumn();
      
      echo '<tr id="ROW2">';
      echo '  <td>';
      print $StudentFirstName." ".$StudentLastName;
      echo '  </td>';

      for ($x = 0; $x <= $quizID - 1; $x++){
        echo '  <td contenteditable=true>      </td>';
      } 
    
      echo '</tr>';   
    }
  }
?>
</table>
<a href='grades.php' class = "block">Save</button></a>
</div>
</body>
</html>
