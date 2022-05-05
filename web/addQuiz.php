<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    //this is a query to make sure the quiz table is not empty
    $sqlQuizzes = "SELECT MAX(quizid) FROM quiz";
    $Quizzes = $pdo->prepare($sqlQuizzes);
    $Quizzes->execute();
    $rowCount = (int) $Quizzes->fetchColumn();
    if ($rowCount > 0) {
      ++$rowCount;
      $sqlQuiz = "INSERT INTO quiz VALUES ('$rowCount', 0, 0)";
      $newQuiz = $pdo->prepare($sqlQuiz);
      $newQuiz->execute();
    } else {
      $sqlQuiz = "INSERT INTO quiz VALUES (1, 0, 0)";
      $newQuiz = $pdo->prepare($sqlQuiz);
      $newQuiz->execute();
    }
    header("location: quizzes.php");
  ?>
  </body>
</html>