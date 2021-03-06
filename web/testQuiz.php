<!DOCTYPE html> 
<html>
  <head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
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

p {
  margin-left: 160px; 
  font-size: 28px; 
  padding: 0px 10px;
}


h1 {
  margin-left: 160px; 
  font-size: 28px; 
  padding: 0px 10px;
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

        

            <p> 
                <div style='transform: scale(0.65); position: relative; top: -50px;'>
                    <h3>What class are you currently in?</h3>
                    <p>Choose 1 answer</p>
                    <hr />

                <div id='block-11' style='padding: 10px;'>
                    <label for='option-11' style=' padding: 5px; font-size: 2.5rem;'>
                      <input type='radio' name='option' value='6/24' id='option-11' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                      Computer Security</label>
                    <span id='result-11'></span>
                  </div>
                  <hr />

                  <div id='block-12' style='padding: 10px;'>
                    <label for='option-12' style=' padding: 5px; font-size: 2.5rem;'>
                      <input type='radio' name='option' value='6' id='option-12' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                      Computer Capstone</label>
                    <span id='result-12'></span>
                  </div>
                  <hr />

                  <div id='block-12' style='padding: 10px;'>
                    <label for='option-12' style=' padding: 5px; font-size: 2.5rem;'>
                      <input type='radio' name='option' value='6' id='option-12' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                      Computer Graphics</label>
                    <span id='result-12'></span>
                  </div>
                  <hr />


                  <input type="submit" value="Submit">

            </p>

        

        <a href='QuizSelection.php' class = "block">Go Back</button></a>

        </h1>
</body>
</html> 