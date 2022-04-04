<!DOCTYPE html> 
<html>
<body>
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

        body {background-color: powderblue;}
        body {background-image: url('GreenBackground.jpg');
         background-repeat: no-repeat;
          background-attachment: fixed;
          background-size: cover;}
         .block {
          display: block;
          width: 50%;
          border: none;
          background-color: #D3D3D3;
          color: white;
          padding: 14px 8px;
          font-size: 16px;
          cursor: pointer;
          text-align: center;
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

</style>

<h1> Quizzes </h1>
<p> Please Select your quiz! </p>
<a href='DisplayQuiz.html' class = "button button1">Quiz One</button></a>
<a href='DisplayQuiz.html' class = "button button1">Quiz Two</button></a>
<a href='DisplayQuiz.html' class = "button button1">Quiz Three</button></a>

    </body>
</html>