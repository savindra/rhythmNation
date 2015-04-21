<?php
session_set_cookie_params(3600,"/");
if(session_status() == PHP_SESSION_NONE){
	session_start(); 
}
$error = '';

if(isset($_POST['login-submit'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		$error = "Username or Password is empty.";
	} else {
		$username = test_input($_POST['username']);
		$password = test_input($_POST['password']);	
		
		require_once('functions/db_connect.php');
		
		$query = "SELECT * FROM customer WHERE username='$username' AND password='$password';";
		
		if($result = @mysqli_query($dbc, $query)){
			if (mysqli_num_rows($result) == 1) {
				$_SESSION['login_user'] = $username;
				header("location: myaccount.php");
   	 		}else {
				$error = "Username or Password is invalid";
			}
		}
		mysqli_close($dbc);
	}
}

function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

?>