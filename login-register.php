<?php
require_once('functions/functions.php');
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
      
<div class="row large-12">
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
          <form>
          	<div class="row">
            	<div class="large-12 columns">
                	<label>Username or Email <span style="color:#F00">*</span>
                    	<input type="text" placeholder="Username/Email">
                    </label>
                    <label>Password <span style="color:#F00">*</span>
                    	<input type="password" placeholder="Password">
                    </label>
                    <label>
                    	<input type="checkbox" value="true"><b> Remember me</b>
                    </label>
                    <input type="submit" value="Login" class="small button radius" />
                </div>
            </div>
          </form>
        </div>
    </div>
    
    <div class="large-6 columns">
    	<h4>Register</h4>
        <div class="panel callout">
        das
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