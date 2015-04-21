<?php
include('functions/session.php');
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "My Account";
			include 'includes/header.php';
  		?>
        <script>
			function showOrder() {
				var str = document.getElementById("order-id").value;
				var id = document.getElementById("customer-id").value;
				if (str == "") {
					document.getElementById("order-id").innerHTML = "";
					return;
				} else { 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById("result").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","functions/getorder.php?q="+str+"&id="+id,true);
					xmlhttp.send();
				}
			}
			
			function showOrderAll() {
				var id = document.getElementById("customer-id").value;
				if (id == "") {
					document.getElementById("customer-id").innerHTML = "";
					return;
				} else { 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById("result").innerHTML = xmlhttp.responseText;
						}
					}
					xmlhttp.open("GET","functions/getorder.php?id="+id,true);
					xmlhttp.send();
				}
			}
		
		</script>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>   
<div class="row">
	<div class="large-12">
    	<h4><b>MY ACCOUNT</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="main.php?ref=home">Home</a></li>
            <li class="current"><a href="myaccount.php">My Account</a></li>
        </ul>
    </div>
</div>

<div class="row">
	<div class="large-12 columns">
    	<ul class="tabs" data-tab>
          <li class="tab-title active"><a href="#panel11">Personal Information</a></li>
          <li class="tab-title"><a href="#panel21">Payment Information</a></li>
          <li class="tab-title"><a href="#panel31">Track Item</a></li>
          <li class="tab-title"><a href="#panel41">Edit Details</a></li>
        </ul>
        <div class="tabs-content">
          <div class="content active" id="panel11">
          	<h5 class="text-center">Account Information</h5>
            <table class="large-12">
                <tr>
                	<th>Username</th>
                    <td><?php echo $login_session; ?></td>
                </tr>
                <tr>
                	<th>Password</th>
                    <td>*****</td>
                    <td><a href="#">Edit</a></td>
                </tr>
            </table>
            <h5 class="text-center">Email & Contact Information</h5>
            <table class="large-12">
                <tr>
                	<th>Registered email address</th>
                    <td class="text-left"><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                	<th>Registered name and address</th>
                    <td>
                    <?php
						$address_id = $row['address_id'];
						$customer_id = $row['customer_id'];
						
						$query = "SELECT * FROM address WHERE address_id='$address_id'";

						$response = @mysqli_query($dbc, $query);

						$row = mysqli_fetch_array($response);
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$address1 = $row['address1'];
						$address2 = $row['address2'];
						$city = $row['city'];
						$country_id = $row['country_id'];
						$postcode = $row['postcode'];
						
						$query = "SELECT name FROM country WHERE country_id='$country_id'";

						$response = @mysqli_query($dbc, $query);

						$row = mysqli_fetch_array($response);
						$country = $row['name'];
						
						echo '<p class="text-left">' . $firstname . ' ' . $lastname . '<br/>';
						echo $address1 . '<br/>';
						echo $address2 . '<br />';
						echo $city . ' ' . $postcode . '<br />';
						echo $country . '</p>';
					?>
                    
                    </td>
                    <td><a href="myaccount.php#panel41">Edit</a></td>
                </tr>
            </table>
          </div>
          <div class="content" id="panel21">
          	<div class="row">
            	<div class="large-6 columns">
                <?php
					$query = "SELECT * FROM payment WHERE customer_id='$customer_id'";
					$response = @mysqli_query($dbc, $query);
					
					$paymentfname = $paymentlname = $paymentcompany = $paymentaddr1 = $paymentaddr2 = $paymentcity = $paymentpostcode = $cardno = $expdate = "";
					if(mysqli_num_rows($response)){
						$row = mysqli_fetch_array($response);
						$paymentfname = $row['payment_firstname'];
						$paymentlname = $row['payment_lastname'];
						$paymentcompany = $row['payment_company'];
						$paymentaddr1 = $row['payment_address1'];
						$paymentaddr2 = $row['payment_address2'];
						$paymentcity = $row['payment_city'];
						$paymentpostcode = $row['payment_postcode'];
						$cardno = $row['card_no'];
						$expdate = $row['expiration_date'];
					}
					
					if(isset($_POST['add-edit'])){
						
						$paymentfname = test_input($_POST['payment-firstname']);
						$paymentlname = test_input($_POST['payment-lastname']);
						$paymentcompany = test_input($_POST['payment-company']);
						$paymentaddr1 = test_input($_POST['payment-address1']);
						$paymentaddr2 = test_input($_POST['payment-address2']);
						$paymentcity = test_input($_POST['payment-city']);
						$paymentpostcode = test_input($_POST['payment-postcode']);
						$paymentcountry = test_input($_POST['country']);
						$cardno = test_input($_POST['card-no']);
						$expdate = test_input($_POST['expiration-date']);
						
						
						$query = "SELECT * FROM payment WHERE customer_id='$customer_id'";
						$response = @mysqli_query($dbc, $query);
						
						if(mysqli_num_rows($response)){
							$query = "UPDATE payment SET payment_firstname='$paymentfname', payment_lastname='$paymentlname', payment_company='$paymentcompany', payment_address1='$paymentaddr1', payment_address2='$paymentaddr2', payment_city='$paymentcity', payment_postcode='$paymentpostcode', payment_country='$paymentcountry', card_no='$cardno', expiration_date='$expdate' WHERE customer_id='$customer_id'";
						} else {
							$query = "INSERT INTO payment VALUES(NULL, '$customer_id', '$paymentfname', '$paymentlname', '$paymentcompany', '$paymentaddr1', '$paymentaddr2', '$paymentcity', '$paymentpostcode', '$paymentcountry', '$cardno', '$expdate')";
						}
						$dbc->query($query);
						
					}
					
					function test_input($data) {
					  $data = trim($data);
					  $data = stripslashes($data);
					  $data = htmlspecialchars($data);
					  return $data;
					}
				
				?>          
    
                	<form action="" method="post">
                    	<label>Payment Firstname
                        	<input type="text" name="payment-firstname" value="<?php echo $paymentfname; ?>" required>
                        </label>
                        <label>Payment Lastname
                        	<input type="text" name="payment-lastname" value="<?php echo $paymentlname; ?>" required>
                        </label>
                        <label>Payment Company
                        	<input type="text" name="payment-company" value="<?php echo $paymentcompany; ?>">
                        </label>
                        <label>Payment Address1
                        	<input type="text" name="payment-address1" value="<?php echo $paymentaddr1; ?>" required>
                        </label>
                        <label>Payment Address2
                        	<input type="text" name="payment-address2" value="<?php echo $paymentaddr2; ?>">
                        </label>
                        <label>Payment City
                        	<input type="text" name="payment-city" value="<?php echo $paymentcity; ?>" required>
                        </label>
                        <label>Payment Postcode
                        	<input type="text" name="payment-postcode" value="<?php echo $paymentpostcode; ?>" required>
                        </label>
                        <label>Payment Country
                          <select name="country">
                              <?php
                                  require_once('functions/db_connect.php');
                                  $query = "SELECT * FROM country";
                                  $response = @mysqli_query($dbc, $query);
                                  
                                  if($response){
                                      while($row = mysqli_fetch_array($response)){
                                          echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                      }
                                  } else {
                                      echo "Couldn't issue database query";
                                      echo mysqli_error($dbc);
                                      
                                  }
                              ?>
                          </select>
                        </label>
                        <label>Card No
                        	<input type="number" name="card-no" value="<?php echo $cardno; ?>" required>
                        </label>
                        <label>Expiration Date
                        	<input type="date" name="expiration-date" value="<?php echo $expdate; ?>" required>
                        </label>
                        <input type="submit" name="add-edit" value="Add/Edit" class="small button radius" /> 
                    </form>
                </div>
            </div>
          </div>
          
          <div class="content" id="panel31">
            <div class="row large-12 columns">
            
            <?php
				if(isset($_POST['order-submit'])){
					$order_id = test_input($_POST['order-id']);
				}
			?>
              <form action="" onClick="showOrder()" type="get">
                <label>Order ID
                  <input type="number" id ="order-id" name="order-id" required>
                  <input type="hidden" id="customer-id" value="<?php echo $customer_id; ?>">
                </label>
                	<div class="large-9 columns">
                    	<input type="button" name="order-submit" value="Search" class="small button radius">
                    </div>
              </form>
              <form action="" onClick="showOrderAll()" type="get">
              	<input type="hidden" id="customer-id" value="<?php echo $customer_id; ?>">
                <div class="large-1 columns">
              		<input type="button" name="order-submit" value="View All" class="small button radius">
                </div>
              </form>
            </div>
            <div id="result" class="large-12 columns"></div>
          </div>
          
          <div class="content" id="panel41">
            <div class="row">
            
            	<div class="large-12 columns">
                
                <!-- Change Password -->
                <?php
					$message1 = "";
					if(isset($_POST['password-change-submit'])){

						$username = $_SESSION['login_user'];
						$password = test_input($_POST['current-password']);
						$newpassword = test_input($_POST['new-password']);
						
						$query = "SELECT customer_id FROM customer WHERE username='$username' AND password='$password'";
						$response = @mysqli_query($dbc, $query);
						
						if(mysqli_num_rows($response)){
							$query = "UPDATE customer SET password='$newpassword' WHERE username='$username'";
							$dbc->query($query);
							$message1 = "Your password has been changed.";
						} else {
							$message1 = "Your password is wrong.";
						}
					}
				
				?>
                <!-- Change Password -->
                
                <!-- Change Address -->
                <?php
					$message2 = "";
					if(isset($_POST['address-change-submit'])){
						
						$username = $_SESSION['login_user'];
						$firstname = test_input($_POST['address-firstname']);
						$lastname = test_input($_POST['address-lastname']);
						$company = test_input($_POST['address-company']);
						$address1 = test_input($_POST['address1']);
						$address2 = test_input($_POST['address2']);
						$city = test_input($_POST['city']);
						$country_id = test_input($_POST['country']);
						$postcode = test_input($_POST['postcode']);
						
						$result = $dbc->query("SELECT address_id FROM customer WHERE username='$username'");
						$obj = $result->fetch_object();
						$address_id = $obj->address_id;
						
						$query = "UPDATE address SET firstname='$firstname', lastname='$lastname', company='$company', address1='$address1', address2='$address2', city='$city', country_id='$country_id', postcode='$postcode' WHERE address_id='$address_id'";
						$dbc->query($query);
						$message2 = "Your address details changed.";
					}
				?>
                <!-- Change Address -->
                
                    <form action="" method="post">
                    	<div class="large-4 columns">
                        	<h5>Change Password</h5>
                          <div class="panel">
                              <label>Password
                                  <input type="password" name="current-password" required>
                              </label>
                              <label>New Password
                                  <input type="password" name="new-password" required>
                              </label>
                              <label>Confirm Password
                                  <input type="password" name="confirm-new-password" required>
                              </label>
                              <input type="submit" name="password-change-submit" class="small radius button">
                              <p><?php echo $message1; ?></p>
                          </div>
                        </div>
                     </form>
                     
                     
                     <form action="" method="post">   
                        <div class="large-7 columns">
                        	<h5>Change Address</h5>
                          <div class="panel">
                              <label>Firstname
                                  <input type="text" name="address-firstname" required>
                              </label>
                              <label>Lastname
                                  <input type="text" name="address-lastname" required>
                              </label>
                              <label>Company
                                  <input type="text" name="address-company" required>
                              </label>
                              <label>Address 1
                                  <input type="text" name="address1" required>
                              </label>
                              <label>Address 2
                                  <input type="text" name="address2" required>
                              </label>
                              <label>City
                                  <input type="text" name="city" required>
                              </label>
                              <label>Country
                              <select name="country">
                                  <?php
                                      require_once('functions/db_connect.php');
                                      $query = "SELECT * FROM country";
                                      $response = @mysqli_query($dbc, $query);
                                      
                                      if($response){
                                          while($row = mysqli_fetch_array($response)){
                                              echo '<option value="' . $row['country_id'] . '">' . $row['name'] . '</option>';
                                          }
                                      } else {
                                          echo "Couldn't issue database query";
                                          echo mysqli_error($dbc);
                                          
                                      }
                                  ?>
                              </select>
                            </label>
                            <label>Postcode
                                  <input type="number" name="postcode" required>
                              </label>
                            <input type="submit" name="address-change-submit" class="small radius button">
                            <p><?php echo $message2; ?></p>
                          </div>
                        </div>
                    </form>
                </div>
                
            </div>
          </div>
          
        </div>
    </div>
</div>

 <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>