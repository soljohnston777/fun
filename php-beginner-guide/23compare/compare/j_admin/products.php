<?php
	$product_id = $_GET['product_id'];
	
	if ( empty ( $product_id ) ) {
		include('list-products.php');
	} else {
		include('edit-product.php');
	}
?>