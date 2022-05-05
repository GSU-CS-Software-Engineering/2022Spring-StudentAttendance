<<<<<<< HEAD
﻿<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    $quizid = $_POST['quizid'];
    
    //this is a query to make sure the quiz table is not empty
    $sqlQuizzes = "SELECT COUNT(questionmultiple) FROM quizmultiple WHERE quizid = '$quizid'";
    $Quizzes = $pdo->prepare($sqlQuizzes);
    $Quizzes->execute();
    $rowCount = (int) $Quizzes->fetchColumn();
    if ($rowCount > 0) {
      ++$rowCount;
      $sqlQuiz = "INSERT INTO quizmultiple VALUES ('$quizid','question_text','a','b','c','d','?',0,0,'$rowCount')";
      $newQuiz = $pdo->prepare($sqlQuiz);
      $newQuiz->execute();
    } else {
      $sqlQuiz = "INSERT INTO quizmultiple VALUES ('$quizid','question_text','a','b','c','d','?',0,0,1)";
      $newQuiz = $pdo->prepare($sqlQuiz);
      $newQuiz->execute();
    }
    header("location: editQuiz.php?quizid=".$quizid);
  ?>
  </body>
=======
﻿<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    $quizid = $_POST['quizid'];
    
    //this is a query to make sure the quiz table is not empty
    $sqlQuizzes = "SELECT COUNT(questionmultiple) FROM quizmultiple WHERE quizid = '$quizid'";
    $Quizzes = $pdo->prepare($sqlQuizzes);
    $Quizzes->execute();
    $rowCount = (int) $Quizzes->fetchColumn();
    if ($rowCount > 0) {
      ++$rowCount;
      $sqlQuiz = "INSERT INTO quizmultiple VALUES ('$quizid','question_text','a','b','c','d','?',0,0,'$rowCount')";
      $newQuiz = $pdo->prepare($sqlQuiz);
      $newQuiz->execute();
    } else {
      $sqlQuiz = "INSERT INTO quizmultiple VALUES ('$quizid','question_text','a','b','c','d','?',0,0,1)";
      $newQuiz = $pdo->prepare($sqlQuiz);
      $newQuiz->execute();
    }
    header("location: editQuiz.php?quizid=".$quizid);
  ?>
  </body>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
</html>