<?php
	$id = $_GET['merchant_id'];
	
	if ( empty ( $id ) ) {
		include('list-merchants.php');
	} else {
		include('edit-merchant.php');
	}
?>