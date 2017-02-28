<?php
	//Add Product
	require_once('../load.php');
	require_once('admin-load.php');
	$current_user = $j->checkLogin();
	$j->addProduct('j_admin/edit-product.php');
	
	//Set our theme
	$theme = 'default';
	
	//Create our form nonce
	$nonce = $j->j_nonce('add-product', time());
	
	//Grab all our categories
	$categories = $j->getCategories();
	
	//Grab our existing merchants array
	$merchants = $j->getMerchants();
?>

<?php $ja->getAdminHeader($theme); ?>

		<div id="main">		
			<?php if ( $_GET['add'] == 'true' ) : ?>
				<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
					You've successfully added a new product.
				</p>
			<?php endif; ?>
		
			<div id="product-add-wrapper">
				<h3>Add New Product</h3>
				<form id="product-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					<div id="product-left">
						<table class="entry-table">
							<tr>
								<td><p>Name</p><input class="input-text" type="text" name="product_name" /></td>
							</tr>
							<tr>
								<td><p>Description</p><textarea class="input-textarea" name="product_description"></textarea></td>
							</tr>
							<tr>
								<td><p>Image</p><input id="image-upload-input" class="input-text" type="text" name="product_image" /><a class="image-upload-button" href="<?php echo $ja->getAdminURL(); ?>/add-media.php">Upload Image</a></td>
							</tr>
							<input type="hidden" name="date" value="<?php echo time(); ?>" />
							<input type="hidden" name="nonce" value="<?php echo $nonce; ?>" />
						</table>
					</div>
					<div id="product-right">
						<div class="product-meta" id="publish">
							<input class="input-submit" type="submit" value="Create" /></td>
						</div>
						<div class="product-meta" id="category">
							<h3>Category</h3>
							<select class="input-select" name="product_category">
								<?php foreach ($categories as $category) : ?>
									<option value="<?php echo $category['category_slug']; ?>"><?php echo $category['category_name']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="product-meta" id="pricing">
							<h3>Merchant Pricing</h3>
							<table id="merchant-pricing">
								<?php foreach($merchants as $merchant) : ?>
									<tr>
										<td class="pricing-header"><?php echo $merchant['merchant_name']; ?></td>
										<td class="pricing-input-td"><input type="text" class="input-text pricing-input" name="merchant_pricing_<?php echo $merchant['ID']; ?>" /></td>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
					</div>
				</form>
			</div>								
		</div>
<?php $ja->getAdminFooter($theme); ?>