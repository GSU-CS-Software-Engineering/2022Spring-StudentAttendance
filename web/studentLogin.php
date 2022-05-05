 <?php session_start(); ?> 
<html>
<body>
<style>

.center {
  
  text-align: center;
}

.content {
  max-width: 500px;
  margin: auto; 
 
}

.button {
  color: #021f3f;
  border: 2px solid black;
  background-color: white;
  border-radius: 50px;
  align-items: center;
  display: flex;
  justify-content: center;
  height: 3em;
  width: 8em;
  font-size: large;
  font-weight: 600;
  transition-duration: 0.4s;
  cursor: pointer;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

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

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<style>
body {background-color: #ac925f;}
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
}
body {
  background-image: url('CollegeBackground.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;}
 </style>


<div class = "content center">
<form action="Back/StudentVerify.php" method="post">
<input type="text" name="Sname" placeholder="Student ID"><br>
<input type="submit" class = "button content" >

</form>


<a href='index.php' class = "button content">Go Back</button></a>
<img src="PP2.jpg" width="2000" height="400" class = "content">

</div>
</body>
</html>