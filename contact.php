<?php
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "Contact Us";
			include 'includes/header.php';
  		?>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>
    
<div class="row">
	<div class="large-12">
    	<h4><b>CONTACT US</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="main.php?ref=home">Home</a></li>
            <li class="current"><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>

</div>

<div class="row">

	<div class="large-9 columns panel callout">
    	<h4><b>Feel Free to Contact Us</b></h4>
        
        <div id="googleMap" style="width:auto;height:380px;"></div>
       
        <br>
        <h5><b>Contact Us</b></h5>
        
        <form>
          <div class="row">
            <div class="large-12 columns">
              <label>Name (required)
                <input type="text" placeholder="Your Name" />
              </label>
              
              <label>Email (required)
                <input type="email" placeholder="Your Email" />
              </label>
              
              <label>Message (required)
        		<textarea placeholder="Message here"></textarea>
              </label>
              
              <input type="submit" value="Submit" class="small button radius" />
              <a href="#" class="small button radius">Clear</a>
              
            </div>
          </div>
        </form>
    
    </div>
    
    <div class="large-3 columns panel">
    	<h4><b>Address</b></h4>
        
        <p>296<br> Bauddhaloka Mawatha<br /> Colombo 00700</p>
        
        <p>Tel No: +94112495659</p>‎
        
    
    </div>


</div>

 <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>