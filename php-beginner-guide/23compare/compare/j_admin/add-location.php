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
?>

<?php $ja->getAdminHeader($theme); ?>

		<div id="main">		
			<?php if ( $_GET['add'] == 'true' ) : ?>
				<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
					You've successfully added a new location.
				</p>
			<?php endif; ?>
		
			<h3>Add New Location</h3>
			<form id="product-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div id="product-left">
					<table id="location-table" class="entry-table">
						<td><p>Merchant</p>
							<select class="input-text" name="merchant_id">
								<?php foreach ($merchants as $merchant) : ?>
									<option value="<?php echo $merchant['ID']; ?>"><?php echo $merchant['merchant_name']; ?></option>
								<?php endforeach; ?>
							</select>
						</td>
						<tr>
							<td><p>Address</p><input class="input-text" type="text" name="address" /></td>
						</tr>
						<tr>
							<td><p>Address2</p><input class="input-text" type="text" name="address_two" /></td>
						</tr>
						<tr>
							<td><p>City</p><input class="input-text" type="text" name="city" /></td>
						</tr>
						<tr>
							<td><p>State</p><input class="input-text" type="text" name="state" /></td>
						</tr>
						<tr><td><p>Zip Code</p><input class="input-text" type="text" name="zip" /></td></tr>
						<input type="hidden" name="date" value="<?php echo time(); ?>" />
						<input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
					</table>
				</div>
				<div id="product-right">
					<div class="product-meta" id="publish">
						<input class="input-submit" type="submit" value="Create" /></td>
					</div>
				</div>
			</form>
		</div>
<?php $ja->getAdminFooter($theme); ?>