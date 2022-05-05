<<<<<<< HEAD
<!DOCTYPE html>
<?php session_start(); ?> 
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
<div class="table">
<style type="text/css">
  table {border:ridge 5px black;}
  table td {border: inset 1px #000;}
  table tr#ROW1 {background-color:gray; color:white;}
  table tr#ROW2 {background-color:white;} 

  </style>
  
  <table>
  <?php
  echo '<tr id="ROW1">';
    echo '<th>   Student   </th>';

    $sqlQuizzes = "SELECT COUNT(quizid) FROM quiz";

    $Quizzes = $pdo->prepare($sqlQuizzes);

    $Quizzes->execute();

    $rowCount = (int) $Quizzes->fetchColumn();
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
  
          echo '<th>';
          print "Quiz ".$quizID;
          echo '</th>';
  
        }
      }  
    }
    echo '</tr>';

  $sqlStudent = "SELECT * FROM Student";

	$Student = $pdo->prepare($sqlStudent);

	$Student->execute();

	$rowCount = $Student->rowCount();
  if ($rowCount > 0) {
	   for($i = 1; $i <= $rowCount; $i++){ 
			$sqlStudentFirstName = "SELECT StudentFname FROM Student Where StudentNumber =".$i;
			$sqlStudentLastName = "SELECT StudentLname FROM Student Where StudentNumber =".$i;
      $sqlStudentID = "SELECT studentid FROM Student Where StudentNumber =".$i;
			$StudentFirstName = $pdo->prepare($sqlStudentFirstName);
			$StudentLastName = $pdo->prepare($sqlStudentLastName);
      $studentID = $pdo->prepare($sqlStudentID);
			$StudentFirstName->execute();
			$StudentLastName->execute();
      $studentID->execute();
			$StudentFirstName = $StudentFirstName->fetchColumn();
			$StudentLastName = $StudentLastName->fetchColumn();
      $studentID = $studentID->fetchColumn();
  
      echo '<tr id="ROW2">';
      echo '  <td>';
      print $StudentFirstName." ".$StudentLastName;
      echo '  </td>';
    
        for ($x = 0; $x <= $quizID - 1; $x++) {
          $sqlIsPushed = "SELECT pushable FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$x'";
          $isPushed = $pdo->prepare($sqlIsPushed);
          $isPushed->execute();
          $pushed = $isPushed->fetchColumn();
          if ($pushed == "true") {
            $sqlQuizData = "SELECT quizid FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$x'";
            $quizData = $pdo->prepare($sqlQuizData);
            $quizData->execute();
            $quizID = (int) $quizData->fetchColumn();
            $sqlQuizGrade = "SELECT grades FROM quizgrades WHERE quiz = '$quizID' AND studentid = '$studentID'";
            $quizGrade = $pdo->prepare($sqlQuizGrade);
            $quizGrade->execute();
            $grade = $quizGrade->fetchColumn();
            echo '<td>';
            print $grade;
            echo '</td>';
          }
        }  
       

      echo '</tr>';   
    }
  }
?>
</table>
<a href='editGrades.php' class="btn btn-primary" class = "block">Edit</button></a>
</div>
</section>
    <style>
    body {background-color:  #ac925f;}
    </style>
</body>
</html>
=======
<!DOCTYPE html>
<?php session_start(); ?> 
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
<div class="table">
<style type="text/css">
  table {border:ridge 5px black;}
  table td {border: inset 1px #000;}
  table tr#ROW1 {background-color:gray; color:white;}
  table tr#ROW2 {background-color:white;} 

  </style>
  
  <table>
  <?php
  echo '<tr id="ROW1">';
    echo '<th>   Student   </th>';

    $sqlQuizzes = "SELECT COUNT(quizid) FROM quiz";

    $Quizzes = $pdo->prepare($sqlQuizzes);

    $Quizzes->execute();

    $rowCount = (int) $Quizzes->fetchColumn();
    if ($rowCount > 0) {
      for ($i = 0; $i <= $rowCount - 1; $i++) {

        $sqlQuizData = "SELECT quizid FROM quiz ORDER BY quizid ASC LIMIT 1 OFFSET '$i'";

        $quizData = $pdo->prepare($sqlQuizData);

        $quizData->execute();

        $quizID = (int) $quizData->fetchColumn();

        echo '<th>';
        print "Quiz ".$quizID;
        echo '</th>';

      }  
    }
    echo '</tr>';

  $sqlStudent = "SELECT * FROM Student";

	$Student = $pdo->prepare($sqlStudent);

	$Student->execute();

	$rowCount = $Student->rowCount();
  if ($rowCount > 0) {
	   for($i = 1; $i <= $rowCount; $i++){ 
		
			$sqlStudentFirstName = "SELECT StudentFname FROM Student Where StudentNumber =".$i;
			$sqlStudentLastName = "SELECT StudentLname FROM Student Where StudentNumber =".$i;
			
			$StudentFirstName = $pdo->prepare($sqlStudentFirstName);
			$StudentLastName = $pdo->prepare($sqlStudentLastName);
			
			$StudentFirstName->execute();
			$StudentLastName->execute();

			$StudentFirstName = $StudentFirstName->fetchColumn();
			$StudentLastName = $StudentLastName->fetchColumn();
      
      echo '<tr id="ROW2">';
      echo '  <td>';
      print $StudentFirstName." ".$StudentLastName;
      echo '  </td>';
    
        for ($x = 0; $x <= $quizID - 1; $x++){
          echo '  <td>      </td>';
        }  
       

      echo '</tr>';   
    }
  }
?>
</table>
<a href='editGrades.php' class="btn btn-primary" class = "block">Edit</button></a>
</div>
</section>
    <style>
    body {background-color:  #021f3f;}
    </style>
</body>
</html>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
