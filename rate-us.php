<?php
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "Rate Us";
			include 'includes/header.php';
  		?>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>
    
    <div class="row">
	<div class="large-12">
    	<h4><b>RATE US</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="main.php?ref=home">Home</a></li>
            <li class="unavailable">Activity</li>
            <li class="current"><a href="rate-us.php">Rate Us</a></li>
        </ul>
    </div>

	</div>
	
	<div class="row">
    	<div class="large-12 columns panel callout">
        	<h3>Rate Our Website</h3>
            <p><b>You can send comments about our website and / or products.</b></p>
            
            <form>
            	<div class="row">
                	<div class="large-12 columns">
                    	<label>Name
                        	<input type="text" placeholder="Name (Required)">
                        </label>
                        <label>Email
                        	<input type="text" placeholder="Email">
                        </label>
                        <label>Comment
                        	<textarea placeholder="Message here"></textarea>
                        </label>
                        <label>
                    		<input type="checkbox" value="true"><b> Subscribe to our newsletter.</b>
                    	</label>
                        <label class="text-right">
                        	<input type="submit" value="Submit" class="small button radius" />
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>


 <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>