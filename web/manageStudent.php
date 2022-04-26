<!DOCTYPE html>
<?php session_start();
  if (!(isset($_SESSION["ProfessorID"]))) {
    header('location: ProfessorLogin.php');
  }
?> 
<?php include 'Back/DatabaseAccess.php';?>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Professor</title>  
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
     <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    
    <!-- favicon Icon -->
    <!--<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">-->
    <!-- CSS Plugins -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animate.min.css">
    <!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>


<header class="navbar-fixed-top">
	<div class="container">
    	<div class="row">
        	<div class="header_top">
        		<div class="col-md-2">
            		<div class="logo_img">
					</div>
				</div>
					
				<div class="col-md-10">
					<div class="menu_bar">	
						<nav role="navigation" class="navbar navbar-default">
							<div class="navbar-header">
                                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
									<span class="icon-bar"></span>
                                  </button>
							   </div>
							   
							  <div class="collapse navbar-collapse" id="navbar">
                            
									<ul class="nav navbar-nav">
									  <li><a   href="ProfessorModel.php">Home Page</a></li>
									  <li><a href="quizzes.php">Quiz</a></li>
									  <li><a   href="QR.php">QR Code</a></li>
									   <li><a  href="grades.php">Grades</a></lit>
									   <li><a    href="manageProfessors.php">Professors</lit>
									   <li><a  href="manageStudent.php">Students</lit>
									  <li><a href='index.php' class = "block">Logout</a> </li>
									  <img src="GSUsymbol.jpg" width="100" height="100">
									</ul>      
                          		</div>
							  
							 
       			
						</nav>
					</div>
    	        </div>
			  
			  </div>
			</div>
		</div>
</header>
<section>
<div class="main">
  <h2>
    <style>
    body {background-color: 021f3f;}
		.card {
		border: 5px solid black;
	}
    </style>
  <?Php

	//this is a query to get the count of current professors in the database

  $sqlStudent = "SELECT COUNT(Studentid) FROM Student";
  $Student = $pdo->prepare($sqlStudent);
  $Student->execute();
  $rowCount = (int) $Student->fetchColumn();

	//this is to create cards for each professor

	if ($rowCount > 0) {
    // output data of each row
    for ($i = 0; $i <= $rowCount - 1; $i++) {
       //this will create a card for every row in the database
      $sqlStudentID = "SELECT studentid FROM student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
      $StudentData = $pdo->prepare($sqlStudentID);
      $StudentData->execute();
      $StudentID = (int) $StudentData->fetchColumn();
      $sqlStudentFName = "SELECT StudentFname FROM Student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
      $StudentFNameData = $pdo->prepare($sqlStudentFName);
      $StudentFNameData->execute();
      $StudentFName = $StudentFNameData->fetchColumn();
      $sqlStudentLName = "SELECT StudentLname FROM Student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
      $StudentLNameData = $pdo->prepare($sqlStudentLName);
      $StudentLNameData->execute();
      $StudentLName = $StudentLNameData->fetchColumn();

      echo '<div class="card" style="width: 18rem; id = "'.$StudentID.'">';
      echo '<div class= "card-body">';
      echo '<div class="text-center">';
      echo '<h5 class="card-title">';
      print $StudentFName ." ". $StudentLName;
      echo '</h5>';
      print $StudentID;
      echo '<form action="deleteStudent.php" method="post">';
      echo '<button class="btn btn-primary" type="submit" name="Studentid" value="'.$StudentID.'">Delete Student</a>';
      echo '</form>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<p> &nbsp;&nbsp;&nbsp;</p>';
	  }
  }
  ?>
  <div class="card" style="width: 18rem;">
  <div class="card-body">
  <div class="text-center">
  <a href="addStudent.php" class="btn btn-primary">Add Student</a>
  </div>
  </div>
  </div>
</h2>
</div>
</section>
</body>
</html>