<?php
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "Testimonals";
			include 'includes/header.php';
  		?>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
			require_once('functions/db_connect.php');
			
			$query = "SELECT * FROM testimonal ORDER BY RAND() LIMIT 5";
			
			$response = @mysqli_query($dbc, $query);
			
			if($response){
				echo '<div class="row">';
				while($row = mysqli_fetch_array($response)){
					echo  $row['email'] . '<br />' .
					$row['name'] . '<br />' . 
					$row['comment'] . '<br />'; 
				}
				echo '</div>';
			} else {
				echo "Couldn't issue database query";
				echo mysqli_error($dbc);
				
			}
			mysqli_close($dbc);
  ?>
	
	


 <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>