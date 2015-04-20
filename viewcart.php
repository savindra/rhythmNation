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
							echo '<b><a href="shop-item.php?pid='.$pid.'">'.$obj->model.'</a></b>' . '<br/>';
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
			
			echo '<form action="" method="post">';
				echo '<div class="large-12 text-right">';
				echo '<input type="submit"  name="continue-shopping" value="Continue Shopping" class="small button radius">&nbsp;';
				echo '<input type="submit" data-reveal-id="firstModal" name="checkout-submit" value="Checkout" class="small button radius">';
				echo '</div>';
			echo '</form>';
			
		} else {
			echo '<div style="height:500px" class="large-12">';
			echo '<p><strong>Your Cart is Empty.</strong></p>';
			echo '</div>';
		}
		
		
	?>
    
    
    <?php
		if(isset($_POST['continue-shopping'])){
			header("location: shop.php");
		}
		
		if(isset($_SESSION['login_user']) && isset($_SESSION['products']) && isset($_POST['checkout-submit'])){
			$_SESSION['background'] = "";
			$loginuser = $_SESSION['login_user'];
			
			$result = $dbc->query("SELECT * FROM customer WHERE username='$loginuser'");
			$obj = $result->fetch_object();

			$customer_id = $obj->customer_id;
			$address_id = $obj->address_id;
			
			
			$query = "SELECT payment_id FROM payment WHERE customer_id='$customer_id'";
			$response = @mysqli_query($dbc, $query);
			if(mysqli_num_rows($response)){
				
				if($response){
					while($row = mysqli_fetch_array($response)){
						$payment_id = $row['payment_id'];
					}
				}
				
				$validateQty = true;
				$invalidProduct = "";
				
				foreach($_SESSION['products'] as $cart_itm){
				
					$pid = $cart_itm['pid'];
					$qty = $cart_itm['qty'];
					
					$result = $dbc->query("SELECT quantity, model FROM product WHERE product_id='$pid'");
					$obj = $result->fetch_object();
					
					if($qty > $obj->quantity){
						$validateQty = false;
						$invalidProduct += $obj->model . ", ";
					}
				}
				
				if($validateQty == true){
					$result = $dbc->query("SELECT * FROM address INNER JOIN country ON address.country_id=country.country_id WHERE address_id='$address_id'");
					$obj = $result->fetch_object();
					
					$order_status = 1;
					$ship_firstname = $obj->firstname;
					$ship_lastname = $obj->lastname;
					$ship_company = $obj->company;
					$ship_address1 = $obj->address1;
					$ship_address2 = $obj->address2;
					$ship_city = $obj->city;
					$ship_postcode = $obj->postcode;
					$ship_country = $obj->name;
					
					date_default_timezone_set('Asia/Kolkata');
					$date_added = date('Y-m-d H:i:s');
					
					$query = "INSERT INTO orders VALUES(NULL, '$customer_id', '$payment_id', '$order_status', '$ship_firstname', '$ship_lastname', '$ship_company', '$ship_address1', '$ship_address2', '$ship_city', '$ship_postcode', '$ship_country', '$date_added', '$total')";
					
					$dbc->query($query);
					
					$result = $dbc->query("SELECT order_id FROM orders ORDER BY order_id DESC LIMIT 1;");
					$obj = $result->fetch_object();
					$order_id = $obj->order_id;
					
					foreach($_SESSION['products'] as $cart_itm){
						
						$pid = $cart_itm['pid'];
						$qty = $cart_itm['qty'];
						$result = $dbc->query("SELECT model FROM product WHERE product_id='$pid'");
						$obj = $result->fetch_object();
						$model = $obj->model;
						
						$query = "UPDATE product SET quantity=quantity - '$qty' WHERE product_id='$pid'";
						$dbc->query($query);
						
						$query = "INSERT INTO order_product VALUES(NULL, '$order_id', '$pid', '$model', '$qty')";
						$dbc->query($query);
						
						unset($_SESSION['products']);
						
						$_SESSION['attempt_checkout'] = "success";
						$_SESSION['order_id'] = $order_id;
						
						if($total >= 0 && $total <= 100){
							$_SESSION['background'] = "#FFFF66";
						} else if ($total > 100 && $total <= 500){
							$_SESSION['background'] = "#FF9966";
						} else {
							$_SESSION['background'] = "#FF6666";
						}
						header("location: checkout.php");
					}
				} else {
					$_SESSION['attempt_checkout'] = "invalid_qty";
					$_SESSION['invalid_products'] = $invalidProduct;	
					header("location: checkout.php");
				}
					
			} else {
				$_SESSION['attempt_checkout'] = "no_payment";	
				header("location: checkout.php");
			}
		}
		
		if(!isset($_SESSION['login_user']) && isset($_SESSION['products']) && isset($_POST['checkout-submit'])){
			header("location: login-register.php");
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