<?php
require_once('functions/functions.php');
?>
<?php
	include('functions/login.php');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "Login / Register";
			include 'includes/header.php';
  		?>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>
      
<div class="row">
	<div>
    	<h4><b>LOGIN / REGISTER</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="?ref=home">Home</a></li>
            <li class="current"><a href="?ref=login-register">LOGIN / REGISTER</a></li>
        </ul>
    </div>

</div>

<div class="row">
	<div class="large-6 columns">
    	<h4>Login</h4>
        <div class="panel callout">
          <form action="" method="post">
          	<div class="row">
            	<div class="large-12 columns">
                	<label>Username <span style="color:#F00">*</span>
                    	<input name="username" type="text" placeholder="Username" required>
                    </label>
                    <label>Password <span style="color:#F00">*</span>
                    	<input name="password" type="password" placeholder="Password" required>
                    </label>
                    <label>
                    	<input type="checkbox" value="true"><b> Remember me</b>
                    </label>
                    <input type="submit" name="login-submit" value="Login" class="small button radius" />
             		<span><?php echo $error; ?></span>
                </div>
            </div>
          </form>
        </div>
    </div>
</div>
<div class="row">    
    <div class="large-12 columns">
    	<h4>Register</h4>
        <p>New Customer? Register here.</p>
        <div class="panel callout">
        <?php
			include('functions/register.php');
		?>
        <form action="" method="post">
        	<div class="row">
            	<div class="large-6 columns">
                	<label>First Name
                    	<input type="text" name="f-name" placeholder="First Name" required>
                    </label>
                    <label>Last Name
                    	<input type="text" name="l-name" placeholder="Last Name" required>
                    </label>
                    <label>Company Name
                    	<input type="text" name="company-name" placeholder="Company Name">
                    </label>
                    <label>Email Address
                    	<input type="email" name="email" placeholder="Email" required>
                    </label>
                    <label>Username
                    	<input type="text" name="username" placeholder="Username" required>
                    </label>
                    <label>Password
                    	<input type="password" name="password" placeholder="Password" required>
                    </label>
                    <label>Confirm Password
                    	<input type="password" name="c-password" placeholder="Confirm Password" required>
                    </label>
                </div>
                
                <div class="large-6 columns">
                	<label>Address 1
                    	<input type="text" name="address-1" placeholder="Address 1" required>
                    </label>
                    <label>Address 2
                    	<input type="text" name="address-2" placeholder="Address 2" required>
                    </label>
                    <label>City
                    	<input type="text" name="city" placeholder="City" required>
                    </label>
                    <label>Zip Code
                    	<input type="text" name="zip-code" placeholder="Zip Code" required>
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
								mysqli_close($dbc);
							?>
                        </select>
                    </label>
                    <label>Phone Number
                    	<input type="text" name="phone" placeholder="Phone Number">
                    </label>
                </div>
            </div>
             <input type="submit" name="register-submit" value="Register" class="small button radius" />
             <br/>
             <span><?php echo $result; ?></span>
        </form>
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