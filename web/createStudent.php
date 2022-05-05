<<<<<<< HEAD
<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    $StudentID = $_POST["Studentid"];
    $StudentFName = $_POST["StudentFName"];
    $StudentLName = $_POST["StudentLName"];
    if (is_null($StudentID) || is_null($StudentFName) || is_null($StudentLName)) {
        header("location: manageStudent.php");
    }
    $sqlNumStudents = "SELECT MAX(studentnumber) from student";
    $numStudents = $pdo->prepare($sqlNumStudents);
    $numStudents->execute();
    $rowCount = (int) $numStudents->fetchColumn();
    ++$rowCount;
    //this is a query to add the Student with the specified name and id from addStudent.php
    $sqlStudent = "INSERT INTO Student VALUES ('$StudentID', '$StudentFName', '$StudentLName', 0, 0, '$rowCount')";
    $addStudent = $pdo->prepare($sqlStudent);
    $addStudent->execute();
    header("location: manageStudent.php");
  ?>
  </body>
=======
<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    $StudentID = $_POST["Studentid"];
    $StudentFName = $_POST["StudentFName"];
    $StudentLName = $_POST["StudentLName"];
    if (is_null($StudentID) || is_null($StudentFName) || is_null($StudentLName)) {
        header("location: manageStudent.php");
    }
    $sqlNumStudents = "SELECT MAX(studentnumber) from student";
    $numStudents = $pdo->prepare($sqlNumStudents);
    $numStudents->execute();
    $rowCount = (int) $numStudents->fetchColumn();
    ++$rowCount;
    //this is a query to add the Student with the specified name and id from addStudent.php
    $sqlStudent = "INSERT INTO Student VALUES ('$StudentID', '$StudentFName', '$StudentLName', 0, 0, '$rowCount')";
    $addStudent = $pdo->prepare($sqlStudent);
    $addStudent->execute();
    header("location: manageStudent.php");
  ?>
  </body>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
</html>