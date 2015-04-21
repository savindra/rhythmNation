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
				$pid = $ref; //get the product id requested
			} else {
				header("location: shop.php"); //if product id is not set redirect
			}
			$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			require_once('functions/db_connect.php'); // get database details
			
			$query = "SELECT * FROM product WHERE product_id='$pid'";
			
			$response = @mysqli_query($dbc, $query); //retrieve details of product from product id
			
			if($response){ // if product found assing prduct details to variables
                  while($row = mysqli_fetch_array($response)){
                      $pageTitle = $row['model'];
					  $category_id = $row['category_id'];
					  $image = $row['image'];
					  $price = $row['price'];
					  $prod_desc = $row['product_desc'];
					  $quantity = $row['quantity'];
                  }
             } else {
                  echo "Couldn't issue database query";
                  echo mysqli_error($dbc);
                  
			 }
			 $result = $dbc->query("SELECT category_desc FROM category WHERE category_id='$category_id'");
			 $obj = $result->fetch_object();
			 $category = $obj->category_desc; //get the category name
			 
			include 'includes/header.php';
  		?>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>
    
<div class="row">
	<div class="large-12">
    	<h4><b><?php echo $pageTitle; ?></b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="?ref=home">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="shop.php?ref=<?php echo strtolower(str_replace(" ", "-", $category)) ?>"><?php echo $category ?></a></li>
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
        <p><b><?php echo $quantity; ?> IN STOCK</b></p>
        <form action="functions/cart_update.php" method="post">
        	<div class="large-4 large-offset-8 columns text-right">
            	<label>
                	<input type="number" name="quantity" value="1" min="1" max="<?php echo $quantity; ?>">
                    <button class="small button radius">Add to cart</button>
                    <input type="hidden" name="product_id" value="<?php echo $pid; ?>">
                    <input type="hidden" name="type" value="add">
                    <input type="hidden" name="return_url" value="<?php echo $current_url; ?>" />
                </label>
            </div>
        </form>
    </div>

</div>

<div class="row">
	<br>
	<div class="large-12 columns">
    	<ul class="tabs" data-tab role="tablist">
          <li class="tab-title active" role="presentational" ><a href="#panel2-1" role="tab" tabindex="0" aria-selected="true" controls="panel2-1">Desciption</a></li>
          <li class="tab-title" role="presentational" ><a href="#panel2-2" role="tab" tabindex="0"aria-selected="false" controls="panel2-2">Images</a></li>
        </ul>
        <div class="tabs-content">
          <section role="tabpanel" aria-hidden="false" class="content active" id="panel2-1">
            <p><?php echo $prod_desc; ?></p>
          </section>
          <section role="tabpanel" aria-hidden="true" class="content" id="panel2-2">
            <ul class="clearing-thumbs" data-clearing>
              <?php
			  $query = "SELECT product_image.image FROM product INNER JOIN product_image ON product.product_id = product_image.product_id WHERE product.product_id='$pid'";
			  
			  $response = @mysqli_query($dbc, $query);
			
			  if($response){
                  while($row = mysqli_fetch_array($response)){
					  echo '<li><a href="' . $row['image'] . '"><img width="150" height="150" src="' . $row['image'] . '"></a></li>';
                  }
              } else {
                  echo "Couldn't issue database query";
                  echo mysqli_error($dbc);  
			  }
			  mysqli_close($dbc);
			  ?>
            
            </ul>
          </section>
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