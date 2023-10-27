<?php 
session_start(); 
include_once('db_conn.php');

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['username']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$stmt = $conn->prepare(
			"SELECT * FROM user WHERE username=? AND password=? limit 1");
		$stmt->execute(array($uname,$pass));
		

		$result = $stmt -> rowCount();

		if ($result!=0) {
			
            	$_SESSION['username'] = $uname;
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect User name or password");
		        exit();
			}
		}
	}
	
else{
	header("Location: index.php");
	exit();
}
?>