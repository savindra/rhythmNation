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
        
        <script>
			function contactClear(){
				document.getElementById('name').value = "";
				document.getElementById('email').value = "";
				document.getElementById('message').value = "";
			}
		</script>
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

	<div class="large-9 columns">
    	<div class="panel callout radius">
          <h4><b>Feel Free to Contact Us</b></h4>
          
          <div id="googleMap" style="width:auto;height:380px;"></div>
         
          <br>
          <h5><b>Contact Us</b></h5>
          
          <?php
              $message="";
              if(isset($_POST['contact-submit'])){
                  
                  $name = test_input($_POST['name']);
                  $email = test_input($_POST['email']);
                  $message = test_input($_POST['message']);
                  
                  $formcontent = "From: '$name' \n\nMessage: '$message'";
                  $recipient = "cybernerd93@gmail.com";
                  $subject = "RhythmNation - Contact Form";
                  $mailheader = "From: $email \r\n";
                  
                  mail($recipient, $subject, $formcontent, $mailheader) or die("Error!"); 
                  $message = "Thank you for the message, We will contact you soon.";
              }
          
              function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
          ?>
          
          <form action="" method="post">
            <div class="row">
              <div class="large-12 columns">
                <label>Name (required)
                  <input type="text" id="name" name="name" placeholder="Your Name" required />
                </label>
                
                <label>Email (required)
                  <input type="email" id="email" name="email" placeholder="Your Email" required />
                </label>
                
                <label>Message (required)
                  <textarea id="message" name="message" placeholder="Message here" required></textarea>
                </label>
                
                <input type="submit" name="contact-submit" value="Submit" class="small button radius" />
                <input onClick="contactClear()" type="button" name="contact-clear" value="Clear" class="small button radius" />
                <p><strong><?php echo $message ?></strong></p>
            </div>
           </div>
          </div>
        </form>
        
    
    </div>
    
    <div class="large-3 columns">
    	<div class="panel radius">
          <h4><b>Address</b></h4>
          
          <p>296<br> Bauddhaloka Mawatha<br /> Colombo 00700</p>
          
          <p>Tel No: +94112495659</p>‎
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