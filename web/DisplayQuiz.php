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
<style>
  input[type=submit] {
  width: 100%;
  background-color: #021f3f;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
</style>
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
        <?php
          //this is the quizid posted from QuizSelection.php
          
          $quizid = $_POST["quizid"];
          $sqlcount = "select count(questionmultiple) from quizmultiple where quizid = '$quizid'";
          $count = $pdo->prepare($sqlcount);
          $count->execute();
          

          $rowcount = (int) $count->fetchColumn();

          echo '<form action="GradeQuiz.php" method="post">';

          for ($i = 1; $i <= $rowcount; $i++) {
            $SQLQuestion = "SELECT QuestionMultiple FROM QuizMultiple WHERE QuizID = '$quizid' AND questionmultipleid = '$i'";
            $question = $pdo->prepare($SQLQuestion);
            $question->execute(); 
            $questionmultiple = $question->fetchColumn();

            echo '<div style="transform: scale(0.65); position: relative; top: -50px;">';
            echo '<h3>'.$questionmultiple.'</h3>';
            echo '<p>Choose 1 answer</p>';
            echo '<hr />';

            $SQLa = "SELECT a FROM QuizMultiple WHERE QuizID = '$quizid' AND questionmultipleid = '$i'";
            $choicea = $pdo->prepare($SQLa);
            $choicea->execute(); 
            $a = $choicea->fetchColumn();

            echo '<div id="block-11" style="padding: 10px;">';
                    echo '<label for="option-11" style=" padding: 5px; font-size: 2.5rem;">';
                      echo '<input type="radio" name="option['.$i.']" value="a" id="option-11" style="transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;" />';
                      echo ''.$a.'</label>';
                    echo '<span id="result-11"></span>';
                 echo '</div>';
                  echo '<hr />';

            $SQLb = "SELECT b FROM QuizMultiple WHERE QuizID = '$quizid' AND questionmultipleid = '$i'";
            $choiceb = $pdo->prepare($SQLb);
            $choiceb->execute(); 
            $b = $choiceb->fetchColumn();

            echo '<div id="block-11" style="padding: 10px;">';
            echo '<label for="option-11" style=" padding: 5px; font-size: 2.5rem;">';
              echo '<input type="radio" name="option['.$i.']" value="b" id="option-11" style="transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;" />';
              echo ''.$b.'</label>';
            echo '<span id="result-11"></span>';
         echo '</div>';
          echo '<hr />';

            $SQLc = "SELECT c FROM QuizMultiple WHERE QuizID = '$quizid' AND questionmultipleid = '$i'";
            $choicec = $pdo->prepare($SQLc);
            $choicec->execute(); 
            $c = $choicec->fetchColumn();

            echo '<div id="block-11" style="padding: 10px;">';
                    echo '<label for="option-11" style=" padding: 5px; font-size: 2.5rem;">';
                      echo '<input type="radio" name="option['.$i.']" value="c" id="option-11" style="transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;" />';
                      echo ''.$c.'</label>';
                    echo '<span id="result-11"></span>';
                 echo '</div>';
                  echo '<hr />';

            $SQLd = "SELECT d FROM QuizMultiple WHERE QuizID = '$quizid' AND questionmultipleid = '$i'";
            $choiced = $pdo->prepare($SQLd);
            $choiced->execute(); 
            $d = $choiced->fetchColumn();

            echo '<div id="block-11" style="padding: 10px;">';
                    echo '<label for="option-11" style=" padding: 5px; font-size: 2.5rem;">';
                      echo '<input type="radio" name="option['.$i.']" value="d" id="option-11" style="transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;" />';
                      echo ''.$d.'</label>';
                    echo '<span id="result-11"></span>';
                 echo '</div>';
                  echo '<hr />';
                  echo '</div>';

            $SQLanswer = "SELECT multipleanswers FROM QuizMultiple WHERE QuizID = '$quizid' AND questionmultipleid = '$i'";
            $multipleanswers = $pdo->prepare($SQLanswer);
            $multipleanswers->execute(); 
            $answer = $multipleanswers->fetchColumn();

            $SQLpoints = "SELECT points FROM QuizMultiple WHERE QuizID = '$quizid' AND questionmultipleid = '$i'";
            $multiplepoints = $pdo->prepare($SQLpoints);
            $multiplepoints->execute(); 
            $points = $multiplepoints->fetchColumn();
          }

          echo '<div style="transform: scale(0.65); position: relative; top: -50px;">';
          echo '<input type="hidden" value='.$quizid.' name="quizid" />';
          echo '<input class="button content" type="submit" placeholder="Submit Quiz">';
          echo '</div>';
            

        ?>
	</section>
	 <style>
    body {background-color:  #ac925f;}
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
        <p> Quiz is currently unavailable.

        <a href='QuizSelection.php' class="btn btn-primary" class = "block">Go Back</button></a>

        </p>
        <?php
          //this is the quizid posted from QuizSelection.php
          $quizid = $_POST["quizid"];
        ?>
	</section>
	 <style>
    body {background-color:  #021f3f;}
    </style>
</body>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
</html> 