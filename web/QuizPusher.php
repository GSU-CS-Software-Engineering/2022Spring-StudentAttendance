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
    $true = $_POST['true'];
    
    
    $sqlName = $_SESSION["ProfessorID"]." ";
    $name = $sqlName;

if($true == 'true'){
    //Question query
   $query="UPDATE quiz
               SET pushable = 'true'
               WHERE quizid = '$quizid'";
       $insert_row=$pdo->query($query) or die ($pdo->error.__LINE__);
}else{
 $query="UPDATE quiz
               SET pushable = 'false'
               WHERE quizid = '$quizid'";
       $insert_row=$pdo->query($query) or die ($pdo->error.__LINE__);
}
}

header("location: editQuiz.php?quizid=".$quizid);

?>