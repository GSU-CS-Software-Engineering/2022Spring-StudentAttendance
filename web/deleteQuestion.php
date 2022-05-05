<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    //stores the value from the button click
    $question = $_POST['question'];
    $questionid = $_POST['questionmultipleid'];
    $quizid = $_POST['quizid'];
    
    //this is a query to delete the question from the database
    $sqlQuiz = "DELETE FROM quizmultiple WHERE quizid = '$quizid' AND questionmultipleid = '$questionid'";
    $deleteQuestion = $pdo->prepare($sqlQuiz);
    $deleteQuestion->execute();

    //send user back to quizzes.php (basically a refresh)
   header("location: editQuiz.php?quizid=".$quizid);
  ?>
  </body>
</html>