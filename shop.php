<?php
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "Shop";
			include 'includes/header.php';
  		?>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>
    
<div class="row">
	<div class="large-12">
    	<h4><b>Shop</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="main.php?ref=home">Home</a></li>
        	<li class="current"><a href="shop.php">Shop</a></li>
        </ul>
    </div>

</div>

<div class="row">

	<?php
		$category = "";
		if( isset($_GET['ref']) ){
			$ref = $_GET["ref"];
			$category = $ref;
		}
	?>

	<ul class="tabs" data-tab>
      <li class="tab-title active"><a href="#panel11">Guitars</a></li>
      <li class="tab-title"><a href="#panel21">Drum Sets</a></li>
      <li class="tab-title"><a href="#panel31">Keyboards</a></li>
	</ul>
    
    <div class="tabs-content">
      <div class="content <?php if($category == "" || $category == "guitars"){echo "active";}?>" id="panel11">
        <p>This is the first panel of the basic tab example. You can place all sorts of content here including a grid.</p>
      </div>
      <div class="content <?php if($category == "drumsets"){echo "active";}?>" id="panel21">
        <p>This is the second panel of the basic tab example. This is the second panel of the basic tab example.</p>
      </div>
      <div class="content <?php if($category == "keyboards"){echo "active";}?>" id="panel31">
        <p>This is the third panel of the basic tab example. This is the third panel of the basic tab example.</p>
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