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
	?>
    
    <div class="row">
	<div class="large-12">
    	<h4><b>TESTIMONALS</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="main.php?ref=home">Home</a></li>
            <li class="current"><a href="testimonals.php">Testimonals</a></li>
        </ul>
    </div>

	</div>
	
    <div class="row">
    <div class="large-12 columns testimonals">
    	<br>
      <ul class="example-orbit-content" data-orbit>
      <?php
              require_once('functions/db_connect.php');
              
              $query = "SELECT * FROM testimonal ORDER BY RAND() LIMIT 5";
              
              $response = @mysqli_query($dbc, $query);
              $count = 0;
              if($response){
                  while($row = mysqli_fetch_array($response)){
                      echo  '<li data-orbit-slide="headline-' .++$count. '">' .
					  '<div class="text-center"> <p>' . $row['comment'] . '</p> <hr> <p>' . $row['name'] . 
					  '<br />' . $row['rating'] . ' out of 5 rating. </p> </div> </li>';
                  }
              } else {
                  echo "Couldn't issue database query";
                  echo mysqli_error($dbc);
                  
              }
              mysqli_close($dbc);
      ?>
      </ul>
    </div>
	</div>
	


 <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>