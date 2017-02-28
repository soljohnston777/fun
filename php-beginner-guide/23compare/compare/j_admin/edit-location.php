<?php
	//Product Categories
	require_once('../load.php');
	require_once('admin-load.php');
	$current_user = $j->checkLogin();
	$j->addLocation('j_admin/edit-location.php');
	
	//Set our theme
	$theme = 'default';
	
	//Create our form nonce
	$nonce = $j->j_nonce('add-location', time());
	
	//Grab our existing merchants array
	$merchants = $j->getMerchants();
	
	//Grab our location data
	$edit_id = $_GET['location_id'];
	$location = $j->getLocation($edit_id);
?>

<?php $ja->getAdminHeader($theme); ?>

		<div id="main">		
			<?php if ( $_GET['add'] == 'true' ) : ?>
				<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
					You've successfully edited this location.
				</p>
			<?php endif; ?>
		
			<h3>Edit Location</h3>
			<form id="product-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div id="product-left">
					<table id="location-table" class="entry-table">
						<td><p>Merchant</p>
							<select class="input-text" name="merchant_id">
								<?php foreach ($merchants as $merchant) : ?>
									<?php if ( $merchant['ID'] == $location['merchant_id'] ) { $selected = 'selected'; } else { $selected = ''; } ?>
									<option value="<?php echo $merchant['ID']; ?>" <?php echo $selected; ?>><?php echo $merchant['merchant_name']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
						<tr>
							<td><p>Address</p><input class="input-text" type="text" name="address" value="<?php echo $location['address']; ?>" /></td>
						</tr>
						<tr>
							<td><p>Address2</p><input class="input-text" type="text" name="address_two" value="<?php echo $location['address_two']; ?>" /></td>
						</tr>
						<tr>
							<td><p>City</p><input class="input-text" type="text" name="city" value="<?php echo $location['city']; ?>" /></td>
						</tr>
						<tr>
							<td><p>State</p><input class="input-text" type="text" name="state" value="<?php echo $location['state']; ?>" /></td>
						</tr>
						<tr><td><p>Zip Code</p><input class="input-text" type="text" name="zip" value="<?php echo $location['zip']; ?>" /></td></tr>
						<input type="hidden" name="date" value="<?php echo time(); ?>" />
						<input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
						<input type="hidden" name="id" value="<?php echo $location['ID']; ?>" />
						<input type="hidden" name="type" value="edit" />
					</table>
				</div>
				<div id="product-right">
					<div class="product-meta" id="publish">
						<input class="input-submit" type="submit" value="Update" /></td>
					</div>
				</div>
			</form>
		</div>
<?php $ja->getAdminFooter($theme); ?>