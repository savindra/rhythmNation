<?php
require_once('../functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

	<head>
    	<?php
			if(isset($_GET['ref'])){
			  $ref = $_GET["ref"];
			  if($ref == "home"){
				  $pageTitle = 'Home';
			  }else if($ref == "oshada") {
				  $pageTitle = 'Oshada CV';
			  }else if($ref == "pumudu") {
				  $pageTitle = 'Pumudu CV';
			  }else if($ref == "savindra") {
				  $pageTitle = 'Savindra CV';
			  }else if($ref == "yesin") {
				  $pageTitle = 'Yesin CV';
			  }else if($ref == "contact") {
				  $pageTitle = 'Contact Us';	  
			  }else{
				  $pageTitle = '404';
			  }
			}else{
				$pageTitle = '404';
			}
			include 'header.php';
  		?>
    </head>
  
  <body>
  
  	<?php
			include 'menu.php';
  	?>
  
  	<?php
		
		if(isset($_GET['ref'])){
			$ref = $_GET["ref"];
			if($ref == "savindra" || $ref == "oshada" || $ref == "pumudu" || $ref == "yesin"){
				getPage('includes/cv', $ref, '404');
			}else {
				getPage('includes', $ref, '404');
			}
			
		}else{
			getPage('includes', '404');
		}
	?>
    
    
    
    <footer>
	  <?php
          include 'footer.php';
      ?>
    </footer>
    
  </body>
</html>
