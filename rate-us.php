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
    
    <?php
		$name = $email = $comment = $rating = $ratingResult = "";
		if($_SERVER["REQUEST_METHOD"] == "POST"){
		  
		  $name = test_input($_POST["name"]);
		  $email = test_input($_POST["email"]);
		  $comment = test_input($_POST["comment"]);
		  $rating = test_input($_POST["rating"]);
		  
		  require_once('functions/db_connect.php');
		  
		  $query = "INSERT INTO testimonal VALUES(NULL, ?, ?, ?, ?);";
		  
		  $stmt = mysqli_prepare($dbc, $query);
		  
		  mysqli_stmt_bind_param($stmt, "sssd", $email, $name, $comment, $rating);
		  
		  mysqli_stmt_execute($stmt);
		  
		  $affected_rows = mysqli_stmt_affected_rows($stmt);
		  
		  if($affected_rows == 1){
			  $ratingResult = "Your rating was recorded. Thank you!";
			  mysqli_stmt_close($stmt);
			  mysqli_close($dbc);
		  } else {
			  $ratingResult = "Error Occurred!";
			  mysqli_stmt_close($stmt);
			  mysqli_close($dbc);
		  }	
		}

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	?>
	
	<div class="row">
    	<div class="large-12 columns panel callout">
        	<h3>Rate Our Website</h3>
            <p><b>You can send comments about our website and / or products.</b>
            <br /><span style="color:green;"><?php echo $ratingResult; ?></span></p>
            <form action ="rate-us.php" name="rating-form" onSubmit="return validateRatingForm()" method="post">
            	<div class="row">
                	<div class="large-12 columns">
                    	<label>Name
                        	<input type="text" name="name" placeholder="Name (Required)" required>
                        </label>
                        <label>Email
                        	<input type="email" name="email" placeholder="Email" required>
                        </label>
                        <label>Comment
                        	<textarea name="comment" placeholder="Message here" required></textarea>
                        </label>
                        <label>Rating
                        	<select name="rating">
                            	<option value="1.0">1.0</option>
                                <option value="1.5">1.5</option>
                                <option value="2.0">2.0</option>
                                <option value="2.5">2.5</option>
                                <option value="3.0">3.0</option>
                                <option value="3.5">3.5</option>
                                <option value="4.0">4.0</option>
                                <option value="4.5">4.5</option>
                                <option value="5.0">5.0</option>
                            </select>
                        </label>
                        <label>
                    		<input type="checkbox" value="true"><b> Subscribe to our newsletter.</b>
                    	</label>
                        <div class="text-right">
                          <label>
                              <input type="submit" value="Submit" name="rating-submit" class="small button radius" />
                          </label>
                        </div>
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