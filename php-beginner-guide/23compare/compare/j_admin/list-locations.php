<?php
	//Edit Product
	require_once('../load.php');
	require_once('admin-load.php');
	$current_user = $j->checkLogin();
	
	//Set our theme
	$theme = 'default';
	
	//Create our form nonce
	$nonce = $j->j_nonce('add-category', time());
	
	//Get our categories array
	$locations = $j->getLocations();
?>

<?php $ja->getAdminHeader($theme); ?>
	<div id="main">
		<h3>Locations <a class="new-button" id="existing-locations-new-button" href="<?php echo JURL; ?>j_admin/add-location.php">Add New Location</a></h3>
		<table id="existing-locations" class="display-table">
			<thead>
				<tr>
					<th class="id-cell">ID</th>
					<th>Merchant</th>
					<th>Address</th>
					<th>Address 2</th>
					<th>City</th>
					<th>State</th>
					<th>ZipCode</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($locations as $location) : ?>
					<?php $merchant = $j->getMerchant($location['merchant_id']); ?>
					<tr>
						<td class="location-cell"><?php echo $location['ID']; ?></td>
						<td class="location-cell"><a href="<?php echo JURL; ?>j_admin/edit-location.php?location_id=<?php echo $location['ID']; ?>"><?php echo $merchant['merchant_name']; ?></a></td>					
						<td class="location-cell"><?php echo $location['address']; ?></td>
						<td class="location-cell"><?php echo $location['address_two']; ?></td>
						<td class="location-cell"><?php echo $location['city']; ?></td>
						<td class="location-cell"><?php echo $location['state']; ?></td>
						<td class="location-cell"><?php echo $location['zip']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			
			<tfoot>
				<tr>
					<th class="id-cell">ID</th>
					<th>Merchant</th>
					<th>Address</th>
					<th>Address 2</th>
					<th>City</th>
					<th>State</th>
					<th>ZipCode</th>
				</tr>
			</tfoot>
		</table>
					
	</div>
<?php $ja->getAdminFooter($theme); ?>