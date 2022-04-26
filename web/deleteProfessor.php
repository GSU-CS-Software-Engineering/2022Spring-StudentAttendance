<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    //stores the value from the button click on ManageProfessor.php

    $professorID = $_POST['professorid'];
    //this is a query to delete the professor from the database

    $sqlProfessor = "DELETE FROM professor WHERE professorid = '$professorID'";
    $deleteProfessor = $pdo->prepare($sqlProfessor);
    $deleteProfessor->execute();

    //send user back to manageProfessors.php (basically a refresh)
    header("location: manageProfessors.php");
  ?>
  </body>
</html>