<?php

	$conn = new PDO( 'mysql:host=localhost;dbname=projet_db', 'root', '' );
	
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}

	
		
?>