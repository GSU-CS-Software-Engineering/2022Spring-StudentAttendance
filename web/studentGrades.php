<?php session_start(); ?> 
 <?php
 include 'Back/DatabaseAccess.php';
 include 'Back/Attendance.php';
?> 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
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
<body>
<div class="sidenav">
  <a href="StudentModel.php">HomePage</a>
  <a href="QuizSelection.php">Quiz</a>
  <a href="#Notes">Notes</a>
  <a href=studentGrades.php>Grades</a>  
  <a href='Back/StudentLogout.php' class = "block">Logout</button></a>
  <p> &nbsp;&nbsp;&nbsp;</p>
  <img src="GSUsymbol.jpg" width="100" height="100">
</div>

<div class="table">
<h1>Grades</h1>
<style type="text/css">
  table {border:ridge 5px black;}
  table td {border: inset 1px #000;}
  table tr#ROW1 {background-color:gray; color:white;}
  table tr#ROW2 {background-color:white;} 

  </style>
  
  <table>
  <?php
  echo '<tr id="ROW1">';
    echo '<th>   Quiz   </th>';
    echo '<th>   Grade   </th>';
    echo '</tr>';

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
      
      echo '<tr id="ROW2">';
      echo '  <td>';
      print "Quiz ".$quizID;
      echo '  </td>';
      echo '  <td>      </td>';
      echo '</tr>';   
    }
  }
?>
</table>
</div>
</body>
</html>
