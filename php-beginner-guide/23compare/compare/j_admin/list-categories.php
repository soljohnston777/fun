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
	$categories = $j->getCategories();
?>

<?php $ja->getAdminHeader($theme); ?>
	<div id="main">
		<h3>Categories <a class="new-button" id="existing-categories-new-button" href="<?php echo JURL; ?>j_admin/add-category.php">Add New Category</a></h3>
		<table id="existing-categories" class="display-table">
			<thead>
				<tr>
					<th class="id-cell">ID</th>
					<th>Name</th>
					<th>Slug</th>
					<th>Description</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($categories as $category) : ?>
				<tr>
					<td class="category-cell"><?php echo $category['ID']; ?></td>
					<td class="category-cell"><a href="<?php echo JURL; ?>j_admin/edit-category.php?category_id=<?php echo $category['ID']; ?>"><?php echo $category['category_name']; ?></a></td>					
					<td class="category-cell"><?php echo $category['category_slug']; ?></td>
					<td class="category-cell"><?php echo $category['category_description']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			
			<tfoot>
				<tr>
					<th class="id-cell">ID</th>
					<th>Name</th>
					<th>Slug</th>
					<th>Description</th>
				</tr>
			</tfoot>
		</table>
					
	</div>
<?php $ja->getAdminFooter($theme); ?>