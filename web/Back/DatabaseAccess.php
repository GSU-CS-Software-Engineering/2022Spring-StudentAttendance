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
