<?php
	//Product Categories
	require_once('../load.php');
	require_once('admin-load.php');
	$current_user = $j->checkLogin();
	$j->addCategory('j_admin/edit-category.php');
	
	//Set our theme
	$theme = 'default';
	
	//Create our form nonce
	$nonce = $j->j_nonce('add-category', time());
?>

<?php $ja->getAdminHeader($theme); ?>

		<div id="main">		
			<?php if ( $_GET['add'] == 'true' ) : ?>
				<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
					You've successfully added a new category.
				</p>
			<?php endif; ?>
		
			<h3>Add New Category</h3>
			<form id="product-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<div id="product-left">
					<table class="entry-table">
						<tr>
							<td><p>Name</p><input class="input-text" type="text" name="category_name" /></td>
						</tr>
						<tr>
							<td><p>Slug <span class="optional">(optional)</span></p><input class="input-text" type="text" name="category_slug" /></td>
						</tr>
						<tr>
							<td><p>Description</p><textarea class="input-textarea" name="category_description"></textarea></td>
						</tr>
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