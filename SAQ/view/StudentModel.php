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

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
<?php include 'Back/DatabaseAccess.php';
	  include 'Back/Attendance.php';?>
<div class="sidenav">
  <a href="#Quiz">Quiz</a>
  <a href="#Notes">Notes</a>
  <a href="#Grades">Grades</a>  
  <a href='Back/StudentLogout.php' class = "block">Logout</button></a>
  <p> &nbsp;&nbsp;&nbsp;</p>
  <img src="GSUsymbol.jpg" width="100" height="100">
</div>

<div class="main">
  <h2>Welcome,<?Php
  $sqlName = $_SESSION["StudentID"]." ";
  $Sname = $sqlName;
   print $Sname; 
?></h2>
 <button onclick="Hello()" class = "block">Im here</button>
</div>
   
</body>
</html> 