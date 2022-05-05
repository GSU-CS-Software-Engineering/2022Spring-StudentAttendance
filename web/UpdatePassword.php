<?Php session_start(); ?>
<html>
  <body>
    <?php
    include 'Back/DatabaseAccess.php';
    //stores the values from the submission on UpdatePassword.php

    $professorID = $_POST['professorid'];
    $oldPassword = $_POST['oldpassword'];
    $newPassword = $_POST['newpassword'];
    //this is a query to verify the old password with the database

    $sqlOldPassword = "SELECT password FROM professor WHERE professorid = '$professorID'";
    $oldPasswordData = $pdo->prepare($sqlOldPassword);
    $oldPasswordData->execute();
    $VerifiedOldPassword = $oldPasswordData->fetchColumn();

    //if the entered old password matches the one in the database update with the new password

    if($oldPassword == $VerifiedOldPassword) {
        $sqlNewPassword = "UPDATE professor SET password = '$newPassword' WHERE professorid = '$professorID'";
        $updatePassword = $pdo->prepare($sqlNewPassword);
        $updatePassword->execute();
    }

    //send user back to manageProfessors.php (basically a refresh)
    header("location: manageProfessors.php");
  ?>
  </body>
</html>