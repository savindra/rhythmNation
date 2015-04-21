<?php

session_start();
require_once('db_connect.php');

if(isset($_GET['emptycart']) && $_GET['emptycart'] == 1){
	$return_url = base64_decode($_GET["return_url"]); //return url
    unset($_SESSION['products']);
    header('Location:'.$return_url);
}

if(isset($_POST['type']) && $_POST['type'] == 'add'){// if add to cart is set
	$product_id = filter_var($_POST['product_id'], FILTER_SANITIZE_STRING);
	$quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);
	$return_url = base64_decode($_POST["return_url"]);
	
	$results = $dbc->query("SELECT model, price FROM product WHERE product_id='$product_id'");// retrive product details from datavase
	
	$obj = $results->fetch_object();
	
	if($results){// if product is found in database
		
		$new_product = array(array('name'=>$obj->model, 'pid'=>$product_id, 'qty'=>$quantity, 'price'=>$obj->price));
		
		if(isset($_SESSION['products'])){// if a session variable is declared for products
			$found = false;// flag variable to store whether item is found in cart or not
			
			foreach($_SESSION['products'] as $cart_itm){// loop through each product in the cart
				
				if($cart_itm['pid'] == $product_id){// if the product is already exist in the cart
					
					$product[] = array('name'=>$cart_itm['name'], 'pid'=>$cart_itm['pid'], 'qty'=>$quantity, 'price'=>$cart_itm['price']);
					$found = true;
				} else {// if the product does not exist in the cart
					$product[] = array('name'=>$cart_itm['name'], 'pid'=>$cart_itm['pid'], 'qty'=>$cart_itm['qty'], 'price'=>$cart_itm['price']);
				}
				
			}
			
			if($found == false){// if new product mergea two arrays
				$_SESSION['products'] = array_merge($product, $new_product);
			}else {
				$_SESSION['products'] = $product;
			}
			
		} else {// if no session variable declared 
			$_SESSION['products'] = $new_product;
		}
	}
	header('Location:'.$return_url);// return back to the visited url
}



if(isset($_GET['removep']) && isset($_GET['return_url']) && isset($_SESSION['products'])){
	
	$product_id = $_GET['removep'];
	$return_url = base64_decode($_GET["return_url"]);
	
	foreach($_SESSION['products'] as $cart_itm){
		
		if($cart_itm['pid'] != $product_id){
			$product[] = array('name'=>$cart_itm['name'], 'pid'=>$cart_itm['pid'], 'qty'=>$cart_itm['qty'], 'price'=>$cart_itm['price']);
		}
		$_SESSION['products'] = $product;
		
	}
	header('Location:'.$return_url);
	
}


?>