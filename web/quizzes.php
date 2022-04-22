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
  <a href="ProfessorModel.php">Home Page</a>
<!--this will be a slidebar and have create Quiz, Edit Quiz, push Quiz-->
  <a href="quizzes.php">Quiz</a>
<!--this slidebar can upload Notes and delete notes-->
  <a href="#Notes">Notes</a>
<!--this is for view grades of all student-->
  <a href="grades.php">Grades</a>
<!-- this is a button that create  a qr code-->
  <a href="QR.php">QR Code</a>
  <a href="manageProfessors.php">Professors</a>
  <a  id = "bu" href="manageStudent.php">Students</a>
  <!-- change href to a php that cancels the session for php-->
  <a href='index.php' class = "block">Logout</button></a>
  <p> &nbsp;&nbsp;&nbsp;</p>
  <div class="text-center">
  <img src="GSUsymbol.jpg" width="100" height="100">
  </div>
</div>
<div class="main">
  <h2>
    <style>
    body {background-color: powderblue;}
    </style>
  <?Php

	//this is a query to get the count of current quizzes in the database

  $sqlQuizzes = "SELECT COUNT(quizid) FROM quiz";
  $Quizzes = $pdo->prepare($sqlQuizzes);
  $Quizzes->execute();
  $rowCount = (int) $Quizzes->fetchColumn();

	//this is to create cards for each quiz

	if ($rowCount > 0) {
    // output data of each row
    for ($i = 0; $i <= $rowCount - 1; $i++) {
       //this will create a card for every row in the database
      $sqlQuizData = "SELECT quizid FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$i'";
      $quizData = $pdo->prepare($sqlQuizData);
      $quizData->execute();
      $quizID = (int) $quizData->fetchColumn();
      echo '<div class="card" style="width: 18rem; id = "'.$quizID.'">';
      echo '<div class= "card-body">';
      echo '<div class="text-center">';
      echo '<h5 class="card-title">';
      print "Quiz ".$quizID;
      echo '</h5>';
      echo '<form action="editQuiz.php" method="post">';
      echo '<button class="btn btn-primary" type="submit" name="quizid" value="'.$quizID.'">Edit Quiz</a>';
      echo '</form>';
      echo '<form action="deleteQuiz.php" method="post">';
      echo '<button class="btn btn-primary" type="submit" name="quizid" value="'.$quizID.'">Delete Quiz</a>';
      echo '</form>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<p> &nbsp;&nbsp;&nbsp;</p>';
	  }
  }
  ?>
  <div class="card" style="width: 18rem;">
  <div class="card-body">
  <div class="text-center">
  <a href="addQuiz.php" class="btn btn-primary">Add Quiz</a>
  </div>
  </div>
  </div>
</h2>
</div>
</body>
</html>