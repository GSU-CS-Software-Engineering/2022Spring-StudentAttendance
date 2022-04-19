<!DOCTYPE html>
<?php session_start(); ?> 
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #1D40EF;
  overflow-x: hidden;
  padding-top: 20px;

}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #f1f1f1;
  display: block;
  
}

.sidenav a:hover {
  color: #FFD700;  
  background:  radial-gradient(circle at top left, blue 10px, white 11px);
}

h2 {
  margin-left: 160px; 
  font-size: 28px; 
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>


</head>
</head>
<body>
<?php include 'Back/DatabaseAccess.php';?>
<div class="sidenav">
<!--this will be a slidebar and have create Quiz, Edit Quiz, push Quiz-->
  <a href="quizzes.php">Quiz</a>
<!--this slidebar can upload Notes and delete notes-->
  <a href="#Notes">Notes</a>
<!--this is for view grades of all student-->
  <a href="grades.php">Grades</a>
<!-- this is a button that create  a qr code-->
    <a href="QR.php">QR code</a>
  <a href="#create">CreatePS</a>
  <!-- change href to a php that cancels the session for php-->
  <a href='index.php' class = "block">Logout</button></a>
  <p> &nbsp;&nbsp;&nbsp;</p>
  <img src="GSUsymbol.jpg" width="100" height="100">
</div>

  <h2>

  <style type="text/css">
  table {border:ridge 5px black;}
  table td {border: inset 1px #000;}
  table tr#ROW1 {background-color:gray; color:white;}
  table tr#ROW2 {background-color:white;} 

  </style>
  
  <table>
 
  <tr id="ROW1">
    <th>   Student   </th>
    <th>   Quiz 1   </th>
    <th>   Quiz 2   </th>
  </tr>
  <tr id="ROW2">
    <td> <?php print $StudentFirstName[$0] ." ".$StudentLastName[$0]; ?></td>
    <td contenteditable='true'> </td>
    <td contenteditable='true'> </td>
  </tr>
  <tr id="ROW1">
    <td> <?php print $StudentFirstName[$1] ." ".$StudentLastName[$1]; ?></td>
    <td contenteditable='true'> </td>
    <td contenteditable='true'> </td>
  </tr>
  <tr id="ROW2">
    <td> <?php print $StudentFirstName[$2] ." ".$StudentLastName[$2]; ?></td>
    <td contenteditable='true'> </td>
    <td contenteditable='true'> </td>
  </tr>
  <tr id="ROW1">
    <td> <?php print $StudentFirstName[$3] ." ".$StudentLastName[$3]; ?></td>
    <td contenteditable='true'> </td>
    <td contenteditable='true'> </td>
  </tr>
  <tr id="ROW2">
    <td> <?php print $StudentFirstName[$4] ." ".$StudentLastName[$4]; ?></td>
    <td contenteditable='true'> </td>
    <td contenteditable='true'> </td>
  </tr>

</table>

  </div>
  </div>
  <a href='grades.php' class = "block">Save</button></a>
</h2>
</div>
</body>
</html>