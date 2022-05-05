<?php session_start(); ?> 

<?php
include 'Back/DatabaseAccess.php';

if (isset($_POST['submit'])){
    //Get Post variables
    $question_number = $_POST['question_number'];
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];
    $pointes = $_POST['Points'];
    $quizid = $_POST['quizid'];
    $choices = array();
    $choices1 = $_POST['choice1'];
    $choices2 = $_POST['choice2'];
    $choices3 = $_POST['choice3'];
    $choices4 = $_POST['choice4'];

    $sqlName = $_SESSION["ProfessorID"]." ";
    $name = $sqlName;

    //Question query
   $query="UPDATE quizmultiple
               SET quizid = '$quizid', questionmultipleid = '$question_number', questionmultiple = '$question_text', a = '$choices1', b ='$choices2', c = '$choices3', d = '$choices4',multipleanswers = '$correct_choice', points = '$pointes'  
               WHERE quizid = '$quizid' AND questionmultipleid = '$question_number'";
       $insert_row=$pdo->query($query) or die ($pdo->error.__LINE__);


}

header("location: editQuiz.php?quizid=".$quizid);

?>

