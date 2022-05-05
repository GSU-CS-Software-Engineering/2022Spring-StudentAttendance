<?php session_start(); 
if (isset($_SESSION["StudentID"])) {
  if ((time() - $_SESSION['last_login_timestamp']) > 3600) {
    header('location: /Back/StudentLogout.php');
  }
} else {
  header('location: /Back/StudentLogout.php');
}
?> 
<script>
  setTimeout(function() {window.location.replace("https://saq-trailrun.herokuapp.com/Back/StudentLogout.php")}, 900000);
</script>
 <?php
 include 'Back/DatabaseAccess.php';
 include 'Back/Attendance.php';
?> 
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	
    <title>Student</title>  
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
						Welcome
  <?Php
  $sqlfName = $_SESSION["SFirstName"];
  $fname = $sqlfName;
   print $fname; 
?>
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
									  <li><a  href="StudentModel.php">Home Page</a></li>
									  <li><a  href="QuizSelection.php">Quiz</a></li>
									  <li><a href="notes.php">Notes</a></li>
									   <li><a  href="studentGrades.php">Grades</a> 
									  <li><a href='Back/StudentLogout.php' class = "block">Logout</a> </li>
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
<div class="table">
<h1>Grades</h1>
<style type="text/css">
  table {border:ridge 5px black;}
  table td {border: inset 1px #000;}
  table tr#ROW1 {background-color:gray; color:white;}
  table tr#ROW2 {background-color:white;} 

  </style>
  
  <table>
  <?php
  echo '<tr id="ROW1">';
    echo '<th>   Quiz   </th>';
    echo '<th>   Grade   </th>';
    echo '</tr>';

    $sqlQuizzes = "SELECT COUNT(quizid) FROM quiz";
    $Quizzes = $pdo->prepare($sqlQuizzes);
    $Quizzes->execute();
    $rowCount = (int) $Quizzes->fetchColumn();
    $studentID = $_SESSION["StudentID"];

    if ($rowCount > 0) {
      for ($i = 0; $i <= $rowCount - 1; $i++) {
        $sqlIsPushed = "SELECT pushable FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$i'";
        $isPushed = $pdo->prepare($sqlIsPushed);
        $isPushed->execute();
        $pushed = $isPushed->fetchColumn();
        if ($pushed == "true") {
          $sqlQuizData = "SELECT quizid FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$i'";
          $quizData = $pdo->prepare($sqlQuizData);
          $quizData->execute();
          $quizID = (int) $quizData->fetchColumn();
          $sqlQuizGrade = "SELECT grades FROM quizgrades WHERE quiz = '$quizID' AND studentid = '$studentID'";
          $quizGrade = $pdo->prepare($sqlQuizGrade);
          $quizGrade->execute();
          $grade = $quizGrade->fetchColumn();
          echo '<tr id="ROW2">';
          echo '  <td>';
          print "Quiz ".$quizID;
          echo '  </td>';
          echo '  <td>';
          print $grade;
          echo '  </td>';
          echo '</tr>';
        }
      }
    }
?>
</table>
</div>
</section>
    <style>
    body {background-color: ac925f  
    }
    </style>
    </style>
</body>
</html>
