<<<<<<< HEAD
<?php session_start(); ?> 
 <?php
 //change as need to match databases in postgresql bench
$host = "ec2-54-204-56-171.compute-1.amazonaws.com";
$user = "cfroimuroniqbj";
$port = "5432";
$dbname = "d2bljp697b90oh";
$password = "3ad56a1abe8412e3979219f2794c88d5d0fb6ca727ba94e8976dbe5493a2b2d5";
// Create connection
$conn = "pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname . ";user=" . $user  . ";password=" . $password;
// Check connection
try{
	$pdo = new PDO($conn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo 'it works'; 
}
catch(PDOException $e){
	echo 'failed to connect' . $e->getMessage();
}
?>
=======
<?php session_start(); ?> 
 <?php
 //change as need to match databases in postgresql bench
$host = "ec2-3-223-213-207.compute-1.amazonaws.com";
$user = "eattntiavabzcb";
$port = "5432";
$dbname = "d5iigfb03cmb2q";
$password = "1b814448ec7ee155f05e7d6edd898cf3a05aa1bcaee2e0f6178fe4530d4fa0c8";
// Create connection
$conn = "pgsql:host=" . $host . ";port=" . $port . ";dbname=" . $dbname . ";user=" . $user  . ";password=" . $password;
// Check connection
try{
	$pdo = new PDO($conn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo 'it works'; 
}
catch(PDOException $e){
	echo 'failed to connect' . $e->getMessage();
}
?>
>>>>>>> bbe4e773663973c18432da6798d2ee2630fe5268
