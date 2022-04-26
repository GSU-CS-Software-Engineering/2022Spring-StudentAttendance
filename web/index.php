<!DOCTYPE HTML>
<html>
<body>
<style>
	#bu{
		text-decoration: none;
	}
.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Control the left side */
.left {
  left: 0;
  background-color: #ac925f;
}

/* Control the right side */
.right {
  right: 0;
  background-color: #021f3f;
}
.block {
  display: block;
  width: 50%;
  border: none;
  background-color: #4CAF50;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}
.block:hover {
  background-color: #021f3f;
  color: black;
}
.button {
  border: none;
  color: white;
  padding: 16px 250px;
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
  border: 2px solid #0000FF;
}

.button1:hover {
  background-color: #021f3f;
  color: white;
}

</style>
<div class="split left">
	<h1 style="background-color:white;">Login</h1>
</div>
<div class="split right">	
	<a  id = "bu" href='studentLogin.php' class = "button button1">Student</button></a>
	<a  id = "bu" href='ProfessorLogin.php'class = "button button1">Professor</button></a>
<style>
body {background-color: powderblue;}
</style>
</div>
</body>
</html>