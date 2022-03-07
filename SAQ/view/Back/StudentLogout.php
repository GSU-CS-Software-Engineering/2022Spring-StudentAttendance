 <?php session_start(); ?> 
<html>
<body>
 <?php
 include 'DatabaseAccess.php';
 $sqlName = $_SESSION["StudentID"];
$sqlBye = "UPDATE student SET Attendance = '0' WHERE (StudentID = '".$sqlName."');";
if (mysqli_query($conn, $sqlBye)) {
echo "Record updated successfully";
}else {
echo "Error updating record: " . $conn->error;
}
header("location: ../LoginPage.html");

mysqli_close($conn);
?>
</body>
</html>