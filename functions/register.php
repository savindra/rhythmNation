<?php
$firstname = $lastname = $company = $address1 = $address2 = $city = $country_id = $postcode = "";
$email = $telephone = $username = $password = $date_added = $ip = "";
$result = "";
if(isset($_POST['register-submit'])){
	$firstname = test_input($_POST['f-name']);
	$lastname = test_input($_POST['l-name']);
	$company = test_input($_POST['company-name']);
	$address1 = test_input($_POST['address-1']);
	$address2 = test_input($_POST['address-2']);
	$city = test_input($_POST['city']);
	$country_id = test_input($_POST['country']);
	$postcode = test_input($_POST['zip-code']);
	$email = test_input($_POST['email']);
	$telephone = test_input($_POST['phone']);
	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);
	
	date_default_timezone_set('Asia/Kolkata');
	$date_added = date('Y-m-d H:i:s');
	
	$ip = $_SERVER['REMOTE_ADDR'];
	
	require_once('functions/db_connect.php');
	
	$query = "INSERT INTO address VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?);";
	
	$stmt = mysqli_prepare($dbc, $query);
	
	mysqli_stmt_bind_param($stmt, "ssssssii", $firstname, $lastname, $company, $address1, $address2, $city, $country_id, $postcode  );
	
	mysqli_stmt_execute($stmt);
	
	$affected_rows = mysqli_stmt_affected_rows($stmt);
	
	if($affected_rows == 1){
	  mysqli_stmt_close($stmt);
	  //mysqli_close($dbc);
	} else {
	  mysqli_stmt_close($stmt);
	  //mysqli_close($dbc);
	}
	
	$query = "SELECT address_id FROM address ORDER BY address_id DESC LIMIT 1;";
	
	$response = @mysqli_query($dbc, $query);
	
	if($response){
		while($row = mysqli_fetch_array($response)){
			$address_id = $row['address_id'];
		}
	}
	//mysqli_close($dbc);
	
	$query = "INSERT INTO customer VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, NULL, ?, ?);";
	
	$stmt = mysqli_prepare($dbc, $query);
	
	mysqli_stmt_bind_param($stmt, "issssssss", $address_id, $firstname, $lastname, $email, $telephone, $username, $password, $date_added,  $ip);
	
	mysqli_stmt_execute($stmt);
	
	$affected_rows = mysqli_stmt_affected_rows($stmt);
	
	if($affected_rows == 1){
	  $result = "Registration Complete. You may login now.";
	  mysqli_stmt_close($stmt);
	  mysqli_close($dbc);
	} else {
	  mysqli_stmt_close($stmt);
	  mysqli_close($dbc);
	}
	
}


?>