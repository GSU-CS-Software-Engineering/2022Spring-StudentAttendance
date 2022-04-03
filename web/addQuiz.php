<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    //this is a query to make sure the quiz table is not empty
    $sqlQuizzes = "SELECT COUNT(quizid) FROM quiz";
    $Quizzes = $pdo->preapre($sqlQuizzes);
    $Quizzes->execute();
    $rowCount = (int) $Quizzes->fetchColumn();
    if ($rowCount > 0) {
      ++$rowCount;
      $sqlQuiz = "INSERT INTO quiz VALUES (?, 0, 0)";
      $newQuiz = $pdo->prepare($sqlQuiz);
      $newQuiz->execute($rowCount);
    } else {
      $sqlQuiz = "INSERT INTO quiz VALUES (1, 0, 0)";
      $newQuiz = $pdo->prepare($sqlQuiz);
      $newQuiz->execute();
    }
    header("location: quizzes.php");
  ?>
  </body>
</html>