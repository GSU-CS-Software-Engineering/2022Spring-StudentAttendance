<<<<<<< HEAD
<?php session_start(); 
    include 'DatabaseAccess.php';
    $sqlName = $_SESSION["StudentID"];
    $sqlBye = 'UPDATE student SET Attendence = 0 WHERE StudentID =' .$sqlName;
    $goodbye = $pdo->prepare($sqlBye);
    $goodbye->execute();
    $rowCount = $goodbye->rowcount();
    $details = $goodbye->fetchAll();
    if ($details = 0) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: ";
    }
    session_destroy();
    header("location: ../index.php");

?>
=======
<?php session_start(); 
    include 'DatabaseAccess.php';
    $sqlName = $_SESSION["StudentID"];
    $sqlBye = 'UPDATE student SET Attendence = 0 WHERE StudentID =' .$sqlName;
    $goodbye = $pdo->prepare($sqlBye);
    $goodbye->execute();
    $rowCount = $goodbye->rowcount();
    $details = $goodbye->fetchAll();
    if ($details = 0) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: ";
    }
    session_destroy();
    header("location: ../index.php");

?>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
