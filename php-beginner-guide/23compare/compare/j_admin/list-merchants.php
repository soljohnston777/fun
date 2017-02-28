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
	$merchants = $j->getMerchants();
?>

<?php $ja->getAdminHeader($theme); ?>
	<div id="main">
		<h3>Merchants <a class="new-button" id="existing-merchants-new-button" href="<?php echo JURL; ?>j_admin/add-merchant.php">Add New Merchant</a></h3>
		<table id="existing-merchants" class="display-table">
			<thead>
				<tr>
					<th class="id-cell">ID</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Phone</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($merchants as $merchant) : ?>
				<tr>
					<td class="merchant-cell"><?php echo $merchant['ID']; ?></td>
					<td class="merchant-cell"><a href="<?php echo JURL; ?>j_admin/edit-merchant.php?merchant_id=<?php echo $merchant['ID']; ?>"><?php echo $merchant['merchant_name']; ?></a></td>			
					<td class="merchant-cell"><?php echo $merchant['merchant_contact']; ?></td>
					<td class="merchant-cell"><?php echo $merchant['merchant_phone']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			
			<tfoot>
				<tr>
					<th class="id-cell">ID</th>
					<th>Name</th>
					<th>Contact</th>
					<th>Phone</th>
				</tr>
			</tfoot>
		</table>
					
	</div>
<?php $ja->getAdminFooter($theme); ?>