<?php 
	
	$dbUser = '';
	$dbPassword = '';
	$host = '';
	try{
		$con = new PDO("mysql:host=$host;dbname=dbname",$dbUser,$dbPassword);
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		
	}catch(PDOException $e){
		echo "Error:".$e->getMessage();
	}

 ?>
