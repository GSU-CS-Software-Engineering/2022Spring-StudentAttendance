<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    //stores the value from the button click on quizzes.php
    $quizID = $_POST['quizid'];
    $quizID = (int) $quizID;
    //this is a query to delete the quiz from the database
    $sqlQuiz = "DELETE FROM quiz WHERE quizid = '$quizID'";
    $deleteQuiz = $pdo->prepare($sqlQuiz);
    $deleteQuiz->execute();

    $sqlQuiz = "DELETE FROM quizmultiple WHERE quizid = '$quizID'";
    $deleteQuiz = $pdo->prepare($sqlQuiz);
    $deleteQuiz->execute();

    //send user back to quizzes.php (basically a refresh)
    header("location: quizzes.php");
  ?>
  </body>
</html>