<<<<<<< HEAD
<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    $professorID = $_POST["professorid"];
    $professorPass = $_POST["professorpassword"];
    $professorFName = $_POST["professorFName"];
    $professorLName = $_POST["professorLName"];
    if (is_null($professorID) || is_null($professorPass) || is_null($professorFName) || is_null($professorLName)) {
        header("location: manageProfessors.php");
    }
    //this is a query to add the professor with the specified name and id from addProfessor.php
    $sqlProfessor = "INSERT INTO professor VALUES ('$professorID', '$professorPass', '$professorFName', '$professorLName')";
    $addProfessor = $pdo->prepare($sqlProfessor);
    $addProfessor->execute();
    
    header("location: manageProfessors.php");
  ?>
  </body>
=======
<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    $professorID = $_POST["professorid"];
    $professorPass = $_POST["professorpassword"];
    $professorFName = $_POST["professorFName"];
    $professorLName = $_POST["professorLName"];
    if (is_null($professorID) || is_null($professorPass) || is_null($professorFName) || is_null($professorLName)) {
        header("location: manageProfessors.php");
    }
    //this is a query to add the professor with the specified name and id from addProfessor.php
    $sqlProfessor = "INSERT INTO professor VALUES ('$professorID', '$professorPass', '$professorFName', '$professorLName')";
    $addProfessor = $pdo->prepare($sqlProfessor);
    $addProfessor->execute();
    
    header("location: manageProfessors.php");
  ?>
  </body>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
</html>