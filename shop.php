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
        <?php
			require_once('functions/db_connect.php');
			$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			$query = "SELECT * FROM product WHERE category_id=1";
			
			$response = @mysqli_query($dbc, $query);
			$count = 0;
			if($response){
                  while($row = mysqli_fetch_array($response)){
					  if($row['quantity'] == 0){
					  	$status = "disabled";
					  } else {
						 $status = ""; 
					  }
					  
                      echo  '<div class="large-3 columns">
					  <a href="shop-item.php?pid=' . $row['product_id'] . '"><img src="' . $row['image'] . '"></a><br/><br/>
					  <a href="shop-item.php?pid=' . $row['product_id'] . '"><p class="text-center"><b>' . $row['model'] . '</b></p></a>
					  <p class="text-center">$' . $row['price'] . '</p>
					  <form action="functions/cart_update.php" method="post">
					  	<div class="text-center">
					  		<input type="submit" name="add-to-cart" value="ADD TO CART" class="tiny button radius " '.$status.'>
							<input type="hidden" name="product_id" value="'.$row['product_id'].'">
							<input type="hidden" name="quantity" value="1">
                    		<input type="hidden" name="type" value="add">
                    		<input type="hidden" name="return_url" value="'.$current_url.'" />
						</div>
					  </form>
					  </div>';
                  }
              } else {
                  echo "Couldn't issue database query";
                  echo mysqli_error($dbc); 
              }
		?>
      </div>
      <div class="content <?php if($category == "drum-sets"){echo "active";}?>" id="panel21">
        
        <?php
			require_once('functions/db_connect.php');
			$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			$query = "SELECT * FROM product WHERE category_id=2";
			
			$response = @mysqli_query($dbc, $query);
			$count = 0;
			if($response){
                  while($row = mysqli_fetch_array($response)){
					  if($row['quantity'] == 0){
					  	$status = "disabled";
					  } else {
						 $status = ""; 
					  }
					  
                      echo  '<div class="large-3 columns">
					  <a href="shop-item.php?pid=' . $row['product_id'] . '"><img src="' . $row['image'] . '"></a><br/><br/>
					  <a href="shop-item.php?pid=' . $row['product_id'] . '"><p class="text-center"><b>' . $row['model'] . '</b></p></a>
					  <p class="text-center">$' . $row['price'] . '</p>
					  <form action="functions/cart_update.php" method="post">
					  	<div class="text-center">
					  		<input type="submit" name="add-to-cart" value="ADD TO CART" class="tiny button radius" '.$status.'>
							<input type="hidden" name="product_id" value="'.$row['product_id'].'">
							<input type="hidden" name="quantity" value="1">
                    		<input type="hidden" name="type" value="add">
                    		<input type="hidden" name="return_url" value="'.$current_url.'" />
						</div>
					  </form>
					  </div>';
                  }
              } else {
                  echo "Couldn't issue database query";
                  echo mysqli_error($dbc);   
              }
		?>
        
      </div>
      <div class="content <?php if($category == "keyboards"){echo "active";}?>" id="panel31">
        
        <?php
			require_once('functions/db_connect.php');
			$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			$query = "SELECT * FROM product WHERE category_id=3";
			
			$response = @mysqli_query($dbc, $query);
			$count = 0;
			if($response){
                  while($row = mysqli_fetch_array($response)){
					  if($row['quantity'] == 0){
					  	$status = "disabled";
					  } else {
						 $status = ""; 
					  }
					  
                      echo  '<div class="large-3 columns">
					  <a href="shop-item.php?pid=' . $row['product_id'] . '"><img src="' . $row['image'] . '"></a><br/><br/>
					  <a href="shop-item.php?pid=' . $row['product_id'] . '"><p class="text-center"><b>' . $row['model'] . '</b></p></a>
					  <p class="text-center">$' . $row['price'] . '</p>
					  <form action="functions/cart_update.php" method="post">
					  	<div class="text-center">
					  		<input type="submit" name="add-to-cart" value="ADD TO CART" class="tiny button radius" '.$status.'>
							<input type="hidden" name="product_id" value="'.$row['product_id'].'">
							<input type="hidden" name="quantity" value="1">
                    		<input type="hidden" name="type" value="add">
                    		<input type="hidden" name="return_url" value="'.$current_url.'" />
						</div>
					  </form>
					  </div>';
                  }
              } else {
                  echo "Couldn't issue database query";
                  echo mysqli_error($dbc);
                  
              }
			  mysqli_close($dbc);
		?>
        
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