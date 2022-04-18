<!DOCTYPE html> 
<html>
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <style>

        .button {
          border: none;
          color: white;
          padding: 16px 500px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          transition-duration: 0.4s;
          cursor: pointer;
        }

        .button1 {
          background-color: white; 
          color: black; 
          border: 2px solid #4CAF50;
        }

        
        
        .block:hover {
          background-color: #ddd;
          color: black;

          text-align:center;
        }

        h1{
            width:100%;
            height:200px;
            display:flex;
            justify-content: center;
            align-items: center;
            

        }

        p{
            width: 100%;
            height: -50px;
            display: flex;
            justify-content: center;
            align-items: center;

}

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

  <div class="sidenav">
    <a href="QuizSelection.php">Quiz</a>
    <a href="#Notes">Notes</a>
    <a href="studentGrades.php">Grades</a>  
    <a href='Back/StudentLogout.php' class = "block">Logout</button></a>
    <p> &nbsp;&nbsp;&nbsp;</p>
    <img src="GSUsymbol.jpg" width="100" height="100">
  </div>

<h1> Quizzes </h1>
<p> Please Select your quiz! </p>
<a href='testQuiz.php' class = "button button1">Quiz One</button></a>
<a href='DisplayQuiz.php' class = "button button1">Quiz Two</button></a>
<a href='DisplayQuiz.php' class = "button button1">Quiz Three</button></a>

<a href='StudentModel.php' class = "block">Go Back</button></a>

    </body>
</html>