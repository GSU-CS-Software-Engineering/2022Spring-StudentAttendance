<<<<<<< HEAD
<!DOCTYPE html>
 <?php session_start(); 
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

<style>
body {background-color: #ac925f;}
	.card {
		border: 5px solid black;
	}
</style>
<section>
<div class="main">
  <h2>Welcome, Professor <?Php
  $sqlName = $_SESSION["PLastName"]." ";
  $name = $sqlName;
   print $name; 
?>

<?Php 
	//this are query to get the student name
	$sqlStudent = "SELECT * FROM Student";

	//prepare sql statment
	$Student = $pdo->prepare($sqlStudent);
//	$Attendence = $pdo->prepare($sqlAttendence);
	//$StudentFirstName = $pdo->prepare($sqlStudentFirstName);
	//$StudentLastName = $pdo->prepare($sqlStudentLastName);
	//$StudentID = $pdo->prepare($sqlStudentID);
	// excurte statments
	$Student->execute();

	$rowCount = $Student->rowCount();
	//this is to create card exmamples
		//$Student =$Student->fetchColumn(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

	if ($rowCount > 0) {
       //thsi will create a card for every row in the database	
	   for($i = 0; $i <= $rowCount - 1; $i++){ 
			$sqlAttendence = "SELECT Attendence FROM Student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
			$sqlStudentFirstName = "SELECT studentfname FROM student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
			$sqlStudentLastName = "SELECT studentlname FROM student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
			$sqlStudentID = "SELECT StudentID FROM student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
			//pdo-prepare
			$Attendence = $pdo->prepare($sqlAttendence);
			$StudentFirstName = $pdo->prepare($sqlStudentFirstName);
			$StudentLastName = $pdo->prepare($sqlStudentLastName);
			$StudentID = $pdo->prepare($sqlStudentID);
			//executes
			$Attendence->execute();
			$StudentFirstName->execute();
			$StudentLastName->execute();
			$StudentID->execute();
			//fetch
			$StudentAttendence = $Attendence->fetchColumn();
			$StudentFirstName = $StudentFirstName->fetchColumn();
			$StudentLastName = $StudentLastName->fetchColumn();
			$StudentID = $StudentID->fetchColumn();
	   if($StudentAttendence == 1){
	echo '<div class="card bg-success text-white" style="width: 25rem; id = "'.$StudentID.'">';
	echo '<div class= "card-body">';
	print $StudentFirstName ." ".$StudentLastName." ".$StudentID;
	echo '</div>';
	echo '</div>';
	echo '<p> &nbsp;&nbsp;&nbsp;</p>';
	   }
	   else{
	echo '<div class="card bg-danger text-white" style="width: 25rem; id = "'.$StudentID.'">';
	echo '<div class= "card-body">';
	print $StudentFirstName ." ".$StudentLastName." ".$StudentID;
	echo '</div>';
	echo '</div>';
	echo '<p> &nbsp;&nbsp;&nbsp;</p>';  
	   }
	   }
} else {
    echo "0 results";
}
?>
</h2>
</div>
</section>
</body>
=======
<!DOCTYPE html>
 <?php session_start(); 
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

<style>
body {background-color: #ac925f;}
	.card {
		border: 5px solid black;
	}
</style>
<section>
<div class="main">
  <h2>Welcome, Professor <?Php
  $sqlName = $_SESSION["PLastName"]." ";
  $name = $sqlName;
   print $name; 
?>

<?Php 
	//this are query to get the student name
	$sqlStudent = "SELECT * FROM Student";

	//prepare sql statment
	$Student = $pdo->prepare($sqlStudent);
//	$Attendence = $pdo->prepare($sqlAttendence);
	//$StudentFirstName = $pdo->prepare($sqlStudentFirstName);
	//$StudentLastName = $pdo->prepare($sqlStudentLastName);
	//$StudentID = $pdo->prepare($sqlStudentID);
	// excurte statments
	$Student->execute();

	$rowCount = $Student->rowCount();
	//this is to create card exmamples
		//$Student =$Student->fetchColumn(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);

	if ($rowCount > 0) {
       //thsi will create a card for every row in the database	
	   for($i = 0; $i <= $rowCount - 1; $i++){ 
			$sqlAttendence = "SELECT Attendence FROM Student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
			$sqlStudentFirstName = "SELECT studentfname FROM student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
			$sqlStudentLastName = "SELECT studentlname FROM student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
			$sqlStudentID = "SELECT StudentID FROM student ORDER BY studentlname ASC LIMIT 1 OFFSET '$i'";
			//pdo-prepare
			$Attendence = $pdo->prepare($sqlAttendence);
			$StudentFirstName = $pdo->prepare($sqlStudentFirstName);
			$StudentLastName = $pdo->prepare($sqlStudentLastName);
			$StudentID = $pdo->prepare($sqlStudentID);
			//executes
			$Attendence->execute();
			$StudentFirstName->execute();
			$StudentLastName->execute();
			$StudentID->execute();
			//fetch
			$StudentAttendence = $Attendence->fetchColumn();
			$StudentFirstName = $StudentFirstName->fetchColumn();
			$StudentLastName = $StudentLastName->fetchColumn();
			$StudentID = $StudentID->fetchColumn();
	   if($StudentAttendence == 1){
	echo '<div class="card bg-success text-white" style="width: 25rem; id = "'.$StudentID.'">';
	echo '<div class= "card-body">';
	print $StudentFirstName ." ".$StudentLastName." ".$StudentID;
	echo '</div>';
	echo '</div>';
	echo '<p> &nbsp;&nbsp;&nbsp;</p>';
	   }
	   else{
	echo '<div class="card bg-danger text-white" style="width: 25rem; id = "'.$StudentID.'">';
	echo '<div class= "card-body">';
	print $StudentFirstName ." ".$StudentLastName." ".$StudentID;
	echo '</div>';
	echo '</div>';
	echo '<p> &nbsp;&nbsp;&nbsp;</p>';  
	   }
	   }
} else {
    echo "0 results";
}
?>
</h2>
</div>
</section>
</body>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
</html> 