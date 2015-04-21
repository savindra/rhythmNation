<?php
require_once('db_connect.php');

if(isset($_GET['q']) && isset($_GET['id'])){
	
	$q = intval($_GET['q']);//get order id
	$id = intval($_GET['id']);// get customer id
	
	$query = "SELECT o.order_id, o.date_added, o.total, os.name FROM orders o INNER JOIN order_status os ON o.order_status_id = os.order_status_id WHERE o.order_id='$q' AND o.customer_id='$id';";// query to select order details
	
	$response = @mysqli_query($dbc, $query);
	$count = 0;
	echo '<table class="large-12">';
	echo '<tr>';
	echo '<th>Order ID</th>';
	echo '<th>Date</th>';
	echo '<th>Product List</th>';
	echo '<th>Total</th>';
	echo '<th>Status</th>';
	echo '</tr>';
	if($response){
		while($row = mysqli_fetch_array($response)){
		  echo '<tr class="text-left">';
		  echo '<td>'.$row['order_id'].'</td>';
		  echo '<td>'.$row['date_added'].'</td>';
		  echo '<td>';
			//query to select invidual products of an order
			$query2 = "SELECT model, quantity FROM order_product WHERE order_id='$q';";
			$response2 = @mysqli_query($dbc, $query2); 
			if($response){
				while($row2 = mysqli_fetch_array($response2)){
					echo $row2['model'].' X '.$row2['quantity'].'<br />';
				}
			
		  echo '</td>';
		  echo '<td>'.$row['total'].'</td>';
		  echo '<td>'.$row['name'].'</td>';
		  echo '</tr>';
			}
		}
	} else {
		echo "Couldn't issue database query";
		echo mysqli_error($dbc);
	}
	echo '</table>';
}


if(!isset($_GET['q']) && isset($_GET['id'])){

	$id = intval($_GET['id']);
	
	$query = "SELECT o.order_id, o.date_added, o.total, os.name FROM orders o INNER JOIN order_status os ON o.order_status_id = os.order_status_id WHERE o.customer_id='$id';";
	
	$response = @mysqli_query($dbc, $query);
	$count = 0;
	echo '<table class="large-12">';
	echo '<tr>';
	echo '<th>Order ID</th>';
	echo '<th>Date</th>';
	echo '<th>Product List</th>';
	echo '<th>Total</th>';
	echo '<th>Status</th>';
	echo '</tr>';
	if($response){
		while($row = mysqli_fetch_array($response)){
		  echo '<tr class="text-left">';
		  echo '<td>'.$row['order_id'].'</td>';
		  $order_id = $row['order_id'];
		  echo '<td>'.$row['date_added'].'</td>';
		  echo '<td>';
			
			$query2 = "SELECT model, quantity FROM order_product WHERE order_id='$order_id';";
			$response2 = @mysqli_query($dbc, $query2); 
			if($response){
				while($row2 = mysqli_fetch_array($response2)){
					echo $row2['model'].' X '.$row2['quantity'].'<br />';
				}
			
		  echo '</td>';
		  echo '<td>'.$row['total'].'</td>';
		  echo '<td>'.$row['name'].'</td>';
		  echo '</tr>';
			}
		}
	} else {
		echo "Couldn't issue database query";
		echo mysqli_error($dbc);
	}
	echo '</table>';
}
?>