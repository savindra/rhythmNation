<?php
require_once('functions/db_connect.php');

session_start();

$user_check = $_SESSION['login_user'];

$query = "SELECT username FROM customer WHERE username='$user_check'";

$response = @mysqli_query($dbc, $query);

$row = mysqli_fetch_array($response);

$login_session = $row['username'];

if(!isset($login_session)){
	mysqli_close($dbc);
	header('Location: index.php');
}

?>