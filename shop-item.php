<?php
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pid = "";
			if( isset($_GET['pid']) ){
				$ref = $_GET["pid"];
				$pid = $ref;
			} else {
				header("location: shop.php");
			}
			
			require_once('functions/db_connect.php');
			
			$query = "SELECT * FROM product WHERE product_id='$pid'";
			
			$response = @mysqli_query($dbc, $query);
			
			if($response){
                  while($row = mysqli_fetch_array($response)){
                      $pageTitle = $row['model'];
					  $image = $row['image'];
					  $price = $row['price'];
					  $prod_desc = $row['product_desc'];
                  }
             } else {
                  echo "Couldn't issue database query";
                  echo mysqli_error($dbc);
                  
			 }
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
        	<li><a href="?ref=home">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li class="current"><a href="shop-item.php?pid=<?php echo $pid; ?>"><?php echo $pageTitle; ?></a></li>
        </ul>
    </div>

</div>

<div class="row">

	<div class="large-6 columns">
    	<img src="<?php echo $image; ?>"/>
    </div>
    
    <div class="large-6 columns">
    	<h4><?php echo $pageTitle; ?></h4>
        <hr>
        <p><b>$<?php echo $price; ?></b></p>
        <hr>
        <p><?php echo $prod_desc; ?></p>
    </div>


</div>

 <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>