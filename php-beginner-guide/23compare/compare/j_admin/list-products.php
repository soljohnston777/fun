<?php
	//Edit Product
	require_once('../load.php');
	require_once('admin-load.php');
	$current_user = $j->checkLogin();
	
	//Set our theme
	$theme = 'default';
	
	//Create our form nonce
	$nonce = $j->j_nonce('add-product', time());
	
	//Get our products array
	$products = $j->getProducts();
?>

<?php $ja->getAdminHeader($theme); ?>
	<div id="main">
		<h3>Products <a class="new-button" id="existing-products-new-button" href="<?php echo JURL; ?>/j_admin/add-product.php">Add New Product</a></h3>
		<table id="existing-products" class="display-table">
			<thead>
				<tr>
					<th class="id-cell">ID</th>
					<th>Name</th>
					<th>Category</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($products as $product) : ?>
				<tr>
					<td class="product-cell"><?php echo $product['ID']; ?></td>
					<td class="product-cell"><a href="<?php echo JURL; ?>j_admin/edit-product.php?product_id=<?php echo $product['ID']; ?>"><?php echo $product['product_name']; ?></a></td>
					
					<?php
						//Grab our existing products array
						$table = 'j_categories';
						$sql = "SELECT category_name FROM $table WHERE category_slug = '" . $product['product_category'] . "'"; 
						$productCat = $jdb->select($sql);
						$productCat = mysql_fetch_assoc( $productCat );
					?>
					
					<td class="product-cell"><?php echo $productCat['category_name']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			
			<tfoot>
				<tr>
					<th class="id-cell">ID</th>
					<th>Name</th>
					<th>Category</th>
				</tr>
			</tfoot>
		</table>
					
	</div>
<?php $ja->getAdminFooter($theme); ?>