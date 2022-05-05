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
?>
<script>
  setTimeout(function() {window.location.replace("https://saq-trailrun.herokuapp.com/Back/StudentLogout.php")}, 900000);
</script>
<html>
<body>
    <style>
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
       <p> No quizzes available! :( </p> 
        
</body>
=======
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
?>
<html>
<body>
    <style>
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
       <p> No quizzes available! :( </p> 
        
</body>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
</html> 