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
<style>

h2 {
    height: 600px;
    width: 800px; 
    display: flex;
  flex-direction: column;
  justify-content: center;

}

    </style>


<div class="main">
  <h2>
    <form action="createProfessor.php" method="post">
        <div class="form-group">
            <label for="staticID" class="col-sm-2 col-form-label">Professor ID</label>
            <input type="text" readonly class="form-control" name="professorid" value=<?php echo $_POST["professorid"];?>>
        </div>
        <div class="form-group">
            <label for="oldPasswordEntry">Old Password</label>
            <input type="password" class="form-control" name="oldpassword" placeholder="Enter Old Password">
        </div>
        <div class="form-group">
            <label for="newPasswordEntry">New Password</label>
            <input type="password" class="form-control" name="newpassword" placeholder="Enter New Password">
        </div>
        <input class="btn btn-secondary" type="button" value="Cancel" onClick="window.location='https://saq-trailrun.herokuapp.com/manageProfessors.php'">
    <input class="btn btn-primary" type="submit"> 
    </form>
</h2>
</div>
<style>
    body {background-color:  #ac925f;}
    </style>
</body>
=======
<!DOCTYPE html>
<?php session_start();
  if (!(isset($_SESSION["ProfessorID"]))) {
    header('location: ProfessorLogin.php');
  }
?> 
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
</head>
<body>
<?php include 'Back/DatabaseAccess.php';?>
<div class="sidenav">
  <a href="ProfessorModel.php">Home Page</a>
<!--this will be a slidebar and have create Quiz, Edit Quiz, push Quiz-->
  <a href="quizzes.php">Quiz</a>
<!--this slidebar can upload Notes and delete notes-->
  <a href="#Notes">Notes</a>
<!--this is for view grades of all student-->
  <a href="grades.php">Grades</a>
<!-- this is a button that create  a qr code-->
    <a href="QR.php">QR Code</a>
  <a href="manageProfessors.php">Professors</a>
  <a href="manageStudent.php">Students</a>
  <!-- change href to a php that cancels the session for php-->
  <a href='index.php' class = "block">Logout</button></a>
  <p> &nbsp;&nbsp;&nbsp;</p>
  <div class="text-center">
  <img src="GSUsymbol.jpg" width="100" height="100">
  </div>
</div>
<div class="main">
  <h2>
    <style>
    body {background-color: powderblue;}
    </style>
    <form action="createProfessor.php" method="post">
        <div class="form-group">
            <label for="staticID" class="col-sm-2 col-form-label">Professor ID</label>
            <input type="text" readonly class="form-control" name="professorid" value=<?php echo $_POST["professorid"];?>>
        </div>
        <div class="form-group">
            <label for="oldPasswordEntry">Old Password</label>
            <input type="password" class="form-control" name="oldpassword" placeholder="Enter Old Password">
        </div>
        <div class="form-group">
            <label for="newPasswordEntry">New Password</label>
            <input type="password" class="form-control" name="newpassword" placeholder="Enter New Password">
        </div>
        <input class="btn btn-secondary" type="button" value="Cancel" onClick="window.location='https://saq-trailrun.herokuapp.com/manageProfessors.php'">
    <input class="btn btn-primary" type="submit"> 
    </form>
</h2>
</div>
</body>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
</html>