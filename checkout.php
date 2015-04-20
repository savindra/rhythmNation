<?php
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "Checkout";
			include 'includes/header.php';
  		?>
        
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>
    
<div class="row">
	<div class="large-12">
    	<h4><b>CHECKOUT</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="main.php?ref=home">Home</a></li>
            <li><a href="viewcart.php">Cart</a></li>
            <li class="current"><a href="contact.php">CHECKOUT</a></li>
        </ul>
    </div>

</div>

<div class="row">

	<div class="large-12 columns">
    	<?php
		
			if(isset($_SESSION['attempt_checkout']) && $_SESSION['attempt_checkout'] == "no_payment"){
				
				echo '<h3 class="text-center">Order Failed</h3>';
				echo '<p class="text-center">Please add payment details to your account before checkout.</p>';
				unset($_SESSION['attempt_checkout']);
			}
			
			else if(isset($_SESSION['attempt_checkout']) && $_SESSION['attempt_checkout'] == "invalid_qty"){
				
				echo '<h3 class="text-center">Order Failed</h3>';
				echo '<p class="text-center">Invalid quantity for '.$_SESSION['invalid_products'].'</p>';
				unset($_SESSION['attempt_checkout']);
				unset($_SESSION['invalid_products']);
			}
			
			else if(isset($_SESSION['attempt_checkout']) && $_SESSION['attempt_checkout'] == "success"){
				
				echo '<h3 class="text-center">Order Success</h3>';
				echo '<p class="text-center">You order is completed. Thank you for shopping with us.
				<br />Your order ID: '.$_SESSION['order_id'].'</p>';
				unset($_SESSION['attempt_checkout']);
				unset($_SESSION['order_id']);
				
			}
			
			else {
				
				header("location: viewcart.php");
				
			}
		
		?>
    
    </div>

</div>

 <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>