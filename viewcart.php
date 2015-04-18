<?php
require_once('functions/functions.php');
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    	<?php
			$pageTitle = "Cart";
			include 'includes/header.php';
  		?>
</head>
 
<body>   
  <?php
			include 'includes/menu.php';
  	?>
    
<div class="row">
	<div class="large-12">
    	<h4><b>Cart</b></h4>
    	<ul class="breadcrumbs">
        	<li><a href="main.php?ref=home">Home</a></li>
            <li class="current"><a href="viewcart.php">Cart</a></li>
        </ul>
    </div>

</div>

<div class="row">

	<div class="large-12">
    
    <?php
		if(isset($_SESSION['products'])){
			
			require_once('functions/db_connect.php');
			
			$total = 0;
			$cart_items = 0;
			$current_url = base64_encode("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			echo '<table class="large-12">';
			foreach($_SESSION['products'] as $cart_itm){
				
				$pid = $cart_itm['pid'];
				$result = $dbc->query("SELECT model, price, image FROM product WHERE product_id='$pid' LIMIT 1");
				$obj = $result->fetch_object();
				
				echo '<tr>';
					echo '<td class="text-left">';
							echo '<img class="cartitem" width="75" height="75" align="left" src="' . $obj->image . '">';
							echo '<b>'.$obj->model.'</b>' . '<br/>';
							echo "Qty: " . $cart_itm['qty'];
					echo '</td>';
				
					echo '<td>';
						echo '<b>'."$".$obj->price*$cart_itm['qty'].'</b>';
					echo '</td>';
				
					echo '<td>';
						echo '<a href="functions/cart_update.php?removep='.$cart_itm['pid'].'&return_url='.$current_url.'">Remove</a>';
					echo '</td>';
				echo '</tr>';
				
				$subtotal = ($obj->price*$cart_itm['qty']);
				$total += $subtotal;
			}
			echo '<tr>';
				echo '<td class="text-right">';
					echo '<b>'."Total:".'<b>';
				echo '</td>';
				echo '<td>';
					echo '<b>$'.$total.'<b>';
				echo '</td>';
			echo '</tr>';
			echo '</table>';
			echo '<a href="functions/cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a>';
		} else {
			echo '<p>Your Cart is Empty.</p>';
		}
		
		
	?>
    
    
    
    </div>

</div>

 <footer>
	  <?php
          include 'includes/footer.php';
      ?>
    </footer>
    
  </body>
</html>