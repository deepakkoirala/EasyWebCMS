<?php
require("init.php");
if(isset($_SESSION['sessUserId'])){		//User authentication
	header("Location: index.php");
	exit();
}

if(isset($_POST['submit'])){
	$name = $_POST['txtDoman'];
	$password = $_POST['txtPass'];
	if(!empty($name) || !empty($password)){
		if(empty($name)){
			$error = "Type your username";
		}
		else if(empty($password)){
			$error = "Type your password";
		}
		else{
			if(strlen($name)>10){
				$error = "The length of the username should not be more than 10 characters.";
			}
			else{
				//checking if the username is registered or not
			}
		}
		
	}
	else{
		$error = "Both fields are empty!";
	}
	


	if(empty($error)){
	$userExists = $users -> validate($name,$password);
	if($userExists)
	{
		$users -> updateLastLogin($_SESSION['sessUserId']);
		$users -> updateLoginTimes($_SESSION['sessUserId']);
		
		header("Location: index.php");
		exit();
	}
	else
	{
		$error = "Login failed!! Try again";
	}
	}
}
?>
