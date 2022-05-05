<?php include 'Back/DatabaseAccess.php';?>
<!DOCTYPE html>
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
<style>
body {background-color: 021f3f;}
	.card {
		border: 5px solid black;
		background-color:  White;
	}
</style>
<h2>Change a question</h2>
    <? $question = $_POST['quizid'];
        $questionid = $_POST['questionmultipleid'];
        
          $sqlQuizData = "SELECT a FROM quizmultiple WHERE questionmultiple = '$question' AND questionmultipleid = '$questionid'";
          $quizData = $pdo->prepare($sqlQuizData);
          $quizData->execute();
          $a = $quizData->fetchColumn();
    
          $sqlQuizData = "SELECT b FROM quizmultiple WHERE questionmultiple = '$question' AND questionmultipleid = '$questionid'";
          $quizData = $pdo->prepare($sqlQuizData);
          $quizData->execute();
          $b = $quizData->fetchColumn();
          
          $sqlQuizData = "SELECT c FROM quizmultiple WHERE questionmultiple = '$question' AND questionmultipleid = '$questionid'";
           $quizData = $pdo->prepare($sqlQuizData);
          $quizData->execute();
           $c = $quizData->fetchColumn();
           
           $sqlQuizData = "SELECT d FROM quizmultiple WHERE questionmultiple = '$question' AND questionmultipleid = '$questionid'";
           $quizData = $pdo->prepare($sqlQuizData);
           $quizData->execute();
           $d = $quizData->fetchColumn();
           
           $sqlQuizData = "SELECT multipleanswers FROM quizmultiple WHERE questionmultiple = '$question' AND questionmultipleid = '$questionid'";
           $quizData = $pdo->prepare($sqlQuizData);
            $quizData->execute();
            $cc = $quizData->fetchColumn();
                      
            $sqlQuizData = "SELECT points FROM quizmultiple WHERE questionmultiple = '$question' AND questionmultipleid = '$questionid'";
            $quizData = $pdo->prepare($sqlQuizData);
           $quizData->execute();
             $p = $quizData->fetchColumn();
               
             $sqlQuizData = "SELECT quizid FROM quizmultiple WHERE questionmultiple = '$question' AND questionmultipleid = '$questionid'";
               $quizData = $pdo->prepare($sqlQuizData);
                 $quizData->execute();
                  $quizid = $quizData->fetchColumn();

    
      //$_SESSION['editid'] = '$quizid';
      ?>
                    <form method="post" action ="BackEdit.php">
                        <p>
                            <label>Question</label>
                            <input type="text" value="<?php echo $question; ?>" name="question_text" />
                        </p>
  
                           <input type="hidden" value="<?php echo $quizid; ?>" name="quizid" />
                           <input type="hidden" value="<?php echo $questionid; ?>" name="question_number" />
                        <p>
                            <label>Choice a: </label>
                            <input type="text" value="<?php echo $a; ?>" name="choice1" />
                        </p>
                        <p>
                            <label>Choice b: </label>
                            <input type="text" value="<?php echo $b; ?>" name="choice2" />
                        </p>
                        <p>
                            <label>Choice c: </label>
                            <input type="text" value="<?php echo $c; ?>" name="choice3" />
                        </p>
                        <p>
                            <label>Choice d: </label>
                            <input type="text" value="<?php echo $d; ?>" name="choice4" />
                        </p>
                        <p>
                            <label>Correct choice letter </label>
                            <input type="text" value="<?php echo $cc; ?>" name="correct_choice" />
                        </p>
                        <p>
                             <label>Points </label>
                             <input type="number" value="<?php echo $p; ?>" name="Points" />
                        </p>
                        
                        <p>
                            <input type="submit" name="submit" value="Submit" />
                        </p>
                    </form>
</body>
</section>
</html> 