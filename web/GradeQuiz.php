<?Php session_start();
  if (isset($_SESSION["StudentID"])) {
    if ((time() - $_SESSION['last_login_timestamp']) > 3600) {
      header('location: /Back/StudentLogout.php');
    }
  } else {
    header('location: /Back/StudentLogout.php');
  }
?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    //stores the quizid of the quiz taken

    $quizID = $_POST['quizid'];
    //this is a query to find the correct answers from the database

    $i = 1;
    $pointsEarned = 0;
    $totalPoints = 0;
    foreach ($_POST['option'] as $select)
    {
        $SQLanswer = "SELECT multipleanswers FROM QuizMultiple WHERE QuizID = '$quizID' AND questionmultipleid = '$i'";
        $multipleanswers = $pdo->prepare($SQLanswer);
        $multipleanswers->execute(); 
        $answer = $multipleanswers->fetchColumn();

        $SQLpoints = "SELECT points FROM QuizMultiple WHERE QuizID = '$quizID' AND questionmultipleid = '$i'";
        $multiplepoints = $pdo->prepare($SQLpoints);
        $multiplepoints->execute(); 
        $points = $multiplepoints->fetchColumn();
        $totalPoints += $points;
        if ($select == $answer)
        {
            $pointsEarned += $points;
        }
        $i++;
    }

    $studentID = $_SESSION["StudentID"];
    $studentGrade = ($pointsEarned / $totalPoints) * 100;

    $sqlQuizGrade = "INSERT INTO quizgrades VALUES ('$quizID', '$studentID', '$studentGrade', '$pointsEarned', '$totalPoints')";
    $quizGrade = $pdo->prepare($sqlQuizGrade);
    $quizGrade->execute();

    //send user to the grades page
    header("location: studentGrades.php");
  ?>
  </body>
</html>