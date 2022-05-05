<<<<<<< HEAD
<!DOCTYPE html> 
<?php
  session_start();
  if (isset($_SESSION["StudentID"])) {
    if ((time() - $_SESSION['last_login_timestamp']) > 3600) {
      header('location: /Back/StudentLogout.php');
    }
  } else {
    header('location: /Back/StudentLogout.php');
  }
  include 'Back/DatabaseAccess.php';
?>
<script>
  setTimeout(function() {window.location.replace("https://saq-trailrun.herokuapp.com/Back/StudentLogout.php")}, 900000);
</script>
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
<div class="main">
<h1>Select a quiz</h1>
<h2>
<?php
  $sqlQuizzes = "SELECT COUNT(quizid) FROM quiz";
  $Quizzes = $pdo->prepare($sqlQuizzes);
  $Quizzes->execute();
  $rowCount = (int) $Quizzes->fetchColumn();
  $studentID = $_SESSION["StudentID"];

  if ($rowCount > 0) {
    // output data of each row
    for ($i = 0; $i <= $rowCount - 1; $i++) {
       //this will create a card for every row in the database
      $sqlQuizData = "SELECT quizid FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$i'";
      $quizData = $pdo->prepare($sqlQuizData);
      $quizData->execute();
      $quizID = (int) $quizData->fetchColumn();
      $sqlIsPushed = "SELECT pushable FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$i'";
      $isPushed = $pdo->prepare($sqlIsPushed);
      $isPushed->execute();
      $pushed = $isPushed->fetchColumn();
      $sqlTaken = "SELECT COALESCE((SELECT grades FROM quizgrades WHERE quiz = '$quizID' AND studentid = '$studentID'), -1)";
      $taken = $pdo->prepare($sqlTaken);
      $taken->execute();
      $takenValue = $taken->fetchColumn();
      if ($pushed == "true" and $takenValue == -1) {
        echo '<div class="card" style="width: 18rem; id = "'.$quizID.'">';
        echo '<div class= "card-body">';
        echo '<div class="text-center">';
        echo '<h5 class="card-title">';
        print "Quiz ".$quizID;
        echo '</h5>';
        echo '<form action="DisplayQuiz.php" method="post">';
        echo '<button class="btn btn-primary" type="submit" name="quizid" value="'.$quizID.'">Take Quiz</a>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<p> &nbsp;&nbsp;&nbsp;</p>';
      }
	  }
  }
?>
</h2>
</div>
</section>
  <style>
    body {background-color:  #ac925f;}
		.card {
		border: 5px solid black;
		background-color:  White;
	}
    </style>
    </body>
=======
<!DOCTYPE html> 
<?php
  session_start();
  include 'Back/DatabaseAccess.php';
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
?>,
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
									  <li><a  href="StudentModel.php">HomePage</a></li>
									  <li><a  href="QuizSelection.php">Quiz</a></li>
									  <li><a href="#Notes">Notes</a></li>
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
<div class="main">
<h1>Select a quiz</h1>
<h2>
<?php
  $sqlQuizzes = "SELECT COUNT(quizid) FROM quiz";
  $Quizzes = $pdo->prepare($sqlQuizzes);
  $Quizzes->execute();
  $rowCount = (int) $Quizzes->fetchColumn();

  if ($rowCount > 0) {
    // output data of each row
    for ($i = 0; $i <= $rowCount - 1; $i++) {
       //this will create a card for every row in the database
      $sqlQuizData = "SELECT quizid FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$i'";
      $quizData = $pdo->prepare($sqlQuizData);
      $quizData->execute();
      $quizID = (int) $quizData->fetchColumn();
      echo '<div class="card" style="width: 18rem; id = "'.$quizID.'">';
      echo '<div class= "card-body">';
      echo '<div class="text-center">';
      echo '<h5 class="card-title">';
      print "Quiz ".$quizID;
      echo '</h5>';
      echo '<form action="DisplayQuiz.php" method="post">';
      echo '<button class="btn btn-primary" type="submit" name="quizid" value="'.$quizID.'">Take Quiz</a>';
      echo '</form>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '<p> &nbsp;&nbsp;&nbsp;</p>';
	  }
  }
?>
</h2>
</div>
</section>
  <style>
    body {background-color:  #021f3f;}
    </style>
    </body>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
</html>