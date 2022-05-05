<<<<<<< HEAD
<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    //stores the value from the button click on ManageStudent.php

    $StudentID = $_POST['Studentid'];
    //this is a query to delete the professor from the database

    $sqlStudent = "DELETE FROM Student WHERE Studentid = ". $StudentID;
    $deleteStudent = $pdo->prepare($sqlStudent);
    $deleteStudent->execute();

    //send user back to manageStudent.php (basically a refresh)
    header("location: manageStudent.php");
  ?>
  </body>
=======
<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    //stores the value from the button click on ManageStudent.php

    $StudentID = $_POST['Studentid'];
    //this is a query to delete the professor from the database

    $sqlStudent = "DELETE FROM Student WHERE Studentid = ". $StudentID;
    $deleteStudent = $pdo->prepare($sqlStudent);
    $deleteStudent->execute();

    //send user back to manageStudent.php (basically a refresh)
    header("location: manageStudent.php");
  ?>
  </body>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
</html>