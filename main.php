<?php
require_once('functions/functions.php');
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
			  }else if($ref == "tos") {
				  $pageTitle = 'Terms of Service';  
			  }else if($ref == "privacy-policy") {
				  $pageTitle = 'Privacy Policy';
			  }else if($ref == "about-us") {
				  $pageTitle = 'About Us';	  
			  }else{
				  $pageTitle = '404';
			  }
			}else{
				$pageTitle = 'Home';
			}
			include 'includes/header.php';
  		?>
        <link rel="stylesheet" type="text/css" href="css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
    </head>
  
  <body>
  
  	<?php
			include 'includes/menu.php';
  	?>
  
  	<?php
		$ref = "";
		if(isset($_GET['ref'])){
			$ref = $_GET["ref"];
			if($ref == "savindra" || $ref == "oshada" || $ref == "pumudu" || $ref == "yesin"){
				getPage('includes/cv', $ref, '404');
			}
			else if($ref == "tos" || $ref == "privacy-policy" || $ref == "about-us"){
				getPage('includes/pages', $ref, '404');
			} else {
				getPage('includes', $ref, '404');
			}
			
		}else{
			if($ref == "" ){
				getPage('includes', 'home','404');
			}else{
				getPage('includes', '404');
			}
		}
	?>
    
    <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>
