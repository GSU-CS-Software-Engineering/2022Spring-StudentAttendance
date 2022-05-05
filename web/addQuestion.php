<?Php session_start(); ?>
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
</html>