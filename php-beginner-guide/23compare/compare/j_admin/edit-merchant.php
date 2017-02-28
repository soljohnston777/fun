<?php
	//Product Categories
	require_once('../load.php');
	require_once('admin-load.php');
	$current_user = $j->checkLogin();
	$j->addMerchant('j_admin/edit-merchant.php');
	
	//Set our theme
	$theme = 'default';
	
	//Create our form nonce
	$nonce = $j->j_nonce('add-merchant', time());

	//Get our merchant data
	$edit_id = $_GET['merchant_id'];
	$merchant = $j->getMerchant($edit_id);
?>

<?php $ja->getAdminHeader($theme); ?>

		<div id="main">		
			<?php if ( $_GET['add'] == 'true' ) : ?>
				<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
					You've successfully edited this merchant.
				</p>
			<?php endif; ?>
		
			<h3>Edit Merchant</h3>
			<form id="product-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div id="product-left">
					<table class="entry-table">
						<tr>
							<td><p>Name</p><input class="input-text" type="text" name="merchant_name" value="<?php echo $merchant['merchant_name']; ?>" /></td>
						</tr>
						<tr>
							<td><p>Contact</p><input class="input-text" type="text" name="merchant_contact" value="<?php echo $merchant['merchant_contact']; ?>" /></td>
						</tr>
						<tr>
							<td><p>Phone Number</p><input class="input-text" type="text" name="merchant_phone" value="<?php echo $merchant['merchant_phone']; ?>" /></td>
						</tr>
						<tr>
							<td><p>Image</p><input id="image-upload-input" class="input-text" type="text" name="merchant_image" value="<?php echo $merchant['merchant_image']; ?>" /><a class="image-upload-button" href="<?php echo $ja->getAdminURL(); ?>/add-media.php">Upload Image</a></td>
						</tr>
						<input type="hidden" name="date" value="<?php echo time(); ?>" />
						<input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
						<input type="hidden" name="id" value="<?php echo $merchant['ID']; ?>" />
						<input type="hidden" name="type" value="edit" />
					</table>
				</div>
				<div id="product-right">
					<div class="product-meta" id="publish">
						<input class="input-submit" type="submit" value="Update" /></td>
					</div>
					<div class="product-meta" id="featured-image">
						<h3>Featured Image</h3>
						<img src="<?php echo $merchant['merchant_image']; ?>" alt="<?php echo $merchant['merchant_name']; ?>" />
					</div>
				</div>
			</form>
		</div>
<?php $ja->getAdminFooter($theme); ?>