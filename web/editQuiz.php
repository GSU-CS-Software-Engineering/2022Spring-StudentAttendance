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
									  <li><a  href= "ProfessorModel.php">HomePage</a></li>
									  <li><a  href="quizzes.php">Quiz</a></li>
									  <li><a  href="#Notes">Notes</a></li>
									  <li><a  href="grades.php">Grades</a></li>
									  <li><a  href="QR.php">QR Code</a></li>
									  <li><a  href="manageProfessors.php">Professors</a></li>
									  <li><a  href="manageStudent.php">Students</a></li>
									  <li><a  href='index.php' class = "block">Logout</a> </li>
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

<h1>
<form method="post" action ="quizzes.php">
      <input type="hidden" value="<?php echo $quizid; ?>" name="quizid" />
      <button class='btn btn-primary'>
        Go Back
      </button>
</form>
</h1>

  <h2>
    <style>
    body {background-color: #ac925f;}
		.card {
		border: 5px solid black;
		background-color:  White;
	}
	
    </style>
  <?Php
      if($_GET){
       $quizid = $_GET['quizid']; // print_r($_GET); //remember to add semicolon      
      }else{
        $quizid = $_POST['quizid'];
      }
      
  	//this is a query to get the count of current quizzes in the database
  
    $sqlQuizzes = "SELECT COUNT(questionmultiple) FROM quizmultiple WHERE quizid = '$quizid'";
    $Quizzes = $pdo->prepare($sqlQuizzes);
    $Quizzes->execute();
    $rowCount = (int) $Quizzes->fetchColumn();
    
    $sqlQuizzes = "SELECT pushable FROM quiz WHERE quizid = '$quizid'";
      $pushable = $pdo->prepare($sqlQuizzes);
      $pushable->execute();
      $pushed = $pushable->fetchColumn();
      
      if($pushed == 'true'){
         $pushable = 'Pushed';
      }else{
         $pushable = 'Unpushed';
      }
      
  	//this is to create cards for each quiz
  
  	if ($rowCount > 0) {
      // output data of each row
      for ($i = 1; $i <= $rowCount; $i++) {
         //this will create a card for every row in the database
        $sqlQuizData = "SELECT questionmultiple FROM quizmultiple WHERE quizid = '$quizid' AND questionmultipleid = '$i'";
        $quizData = $pdo->prepare($sqlQuizData);
        $quizData->execute();
        $question = $quizData->fetchColumn();
        
        $sqlQuizData = "SELECT questionmultipleid FROM quizmultiple WHERE quizid = '$quizid' AND questionmultiple = '$question' AND questionmultipleid = '$i'";
         $quizData = $pdo->prepare($sqlQuizData);
       $quizData->execute();
        $questionid = $quizData->fetchColumn();
        
        echo '<div class="card" style="width: 18rem; id = "'.$question.'">';
        echo '<div class= "card-body">';
        echo '<div class="text-center">';
        echo '<h5 class="card-title">';
        print "".$question;
        echo '</h5>';
        echo '<form action="Questionedit.php" method="post">';
        echo '<input type="hidden" name="questionmultipleid" value="'.$questionid.'"/>';
        echo '<button class="btn btn-primary" type="submit" name="quizid" value="'.$question.'">Edit Question</a>';
        echo '</form>';
        echo '<form action="deleteQuestion.php" method="post">';
        echo '<input type="hidden" name="questionmultipleid" value="'.$questionid.'"/>';
        echo '<input type="hidden" name="quizid" value="'.$quizid.'"/>';
        echo '<button class="btn btn-primary" type="submit" name="question" value="'.$question.'">Delete Question</a>';
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
    <form method="post" action ="addQuestion.php">
      <input type="hidden" value="<?php echo $quizid; ?>" name="quizid" />
          
              <button class="btn btn-primary" input type="submit" name="submit">Add Question </a>
          
      </form>
    </div>
    </div>
    </div>
  </h2>
  <form method="post" action ="QuizPusher.php">
   <input type="hidden" value="<?php echo $quizid; ?>" name="quizid" />
  <input type="hidden" value="false" name="true" />
      <p>
          <input type="submit" name="submit" value="Unpush" />
      </p>
  </form>
     <form method="post" action ="QuizPusher.php">
      <input type="hidden" value="<?php echo $quizid; ?>" name="quizid" />
       <input type="hidden" value="true" name="true" />
       <p>
      <input type="submit" name="submit" value="Push" />
       </p>
        </form>
        
       <p>
          <?php echo $pushable; ?>
       </p>  
  </div>
  </section>
  </body>
  </html> 