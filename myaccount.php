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
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
			echo $login_session; 
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
          <li class="tab-title"><a href="#panel41">Tab 4</a></li>
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
                    <td><a href="#">Edit</a></td>
                </tr>
            </table>
          </div>
          <div class="content" id="panel21">
          	<div class="row">
            	<div class="large-6 columns">
                <?php
					$query = "SELECT * FROM payment WHERE customer_id='$customer_id'";
					$response = @mysqli_query($dbc, $query);
					
					$paymentfname = $paymentlname = $paymentaddr1 = $paymentaddr2 = $paymentcity = $paymentpostcode = $cardno = $expdate = "";
					if(mysqli_num_rows($response)){
						$row = mysqli_fetch_array($response);
						$paymentfname = $row['payment_firstname'];
						$paymentlname = $row['payment_lastname'];
						$paymentaddr1 = $row['payment_address1'];
						$paymentaddr22 = $row['payment_address2'];
						$paymentcity = $row['payment_city'];
						$paymentpostcode = $row['payment_postcode'];
						$cardno = $row['card_no'];
						$expdate = $row['expiration_date'];
					}
					
					if(isset($_POST['add-edit'])){
						
						$paymentfname = test_input($_POST['payment-firstname']);
						$paymentlname = test_input($_POST['payment-lastname']);
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
							
						}
						
						
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
                        	<input type="text" name="payment-firstname" value="<?php echo $paymentfname; ?>">
                        </label>
                        <label>Payment Lastname
                        	<input type="text" name="payment-lastname" value="<?php echo $paymentlname; ?>">
                        </label>
                        <label>Payment Address1
                        	<input type="text" name="payment-address1" value="<?php echo $paymentaddr1; ?>">
                        </label>
                        <label>Payment Address2
                        	<input type="text" name="payment-address2" value="<?php echo $paymentaddr2; ?>">
                        </label>
                        <label>Payment City
                        	<input type="text" name="payment-city" value="<?php echo $paymentcity; ?>">
                        </label>
                        <label>Payment Postcode
                        	<input type="text" name="payment-postcode" value="<?php echo $paymentpostcode; ?>">
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
                        	<input type="text" name="card-no" value="<?php echo $cardno; ?>">
                        </label>
                        <label>Expiration Date
                        	<input type="date" name="expiration-date" value="<?php echo $expdate; ?>">
                        </label>
                        <input type="submit" name="add-edit" value="Add/Edit" class="small button radius" /> 
                    </form>
                </div>
            </div>
          </div>
          <div class="content" id="panel31">
            <p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
          </div>
          <div class="content" id="panel41">
            <p>This is the fourth panel of the basic tab example. This is the fourth panel of the basic tab example.</p>
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