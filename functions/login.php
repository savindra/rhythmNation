<?php
session_start();
$error = '';

if(isset($_POST['login-submit'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		$error = "Username or Password is empty.";
	} else {
		$username = test_input($_POST['username']);
		$password = test_input($_POST['password']);	
		
		require_once('functions/db_connect.php');
		
		$query = "SELECT * FROM customer WHERE username=? AND password=?;";
		
		$stmt = mysqli_prepare($dbc, $query);
		
		mysqli_stmt_bind_param($stmt, "ss", $username, $password);
		
		$r = mysqli_stmt_execute($stmt);
		
		if($r){
			$result = mysqli_stmt_get_result($stmt);
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