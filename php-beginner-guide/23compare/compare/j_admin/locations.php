<?php
	$id = $_GET['location_id'];
	
	if ( empty ( $id ) ) {
		include('list-locations.php');
	} else {
		include('edit-locations.php');
	}
?>