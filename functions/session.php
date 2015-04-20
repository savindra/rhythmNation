<?php
session_start();
require_once('functions/db_connect.php');

$user_check = $_SESSION['login_user'];

$query = "SELECT * FROM customer WHERE username='$user_check'";

$response = @mysqli_query($dbc, $query);

$row = mysqli_fetch_array($response);

$login_session = $row['username'];

if(!isset($login_session)){
	mysqli_close($dbc);
	header('Location: login-register.php');
}

?>