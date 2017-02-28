<?php
	$product_id = $_GET['cat_id'];
	
	if ( empty ( $product_id ) ) {
		include('list-categories.php');
	} else {
		include('edit-category.php');
	}
?>