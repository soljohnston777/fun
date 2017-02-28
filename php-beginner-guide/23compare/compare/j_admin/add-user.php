<?php
	require_once('../load.php');
	require_once('admin-load.php');
	$logged = $j->checkLogin();
	$j->register('j_admin/add-user.php');
	
	//Set our theme
	$theme = 'default';
?>

<?php $ja->getAdminHeader($theme); ?>

	<div id="main">
		<?php if ( $_GET['reg'] == 'true' ) : ?>
			<p style="background: #fef1b5; border: 1px solid #eedc82; padding: 7px 10px;">
				You've successfully added a new user.
			</p>
		<?php endif; ?>
		
		<h3>Add New User</h3>
		<form id="register-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div id="product-left">
				<table id="exiting-user" class="entry-table">
					<tr><td><p>Name</p><input class="input-text" type="text" name="name" /></td></tr>
					<tr><td><p>Username</p><input class="input-text" type="text" name="username" /></td></tr>
					<tr><td><p>Password</p><input class="input-text" type="password" name="password" /></td></tr>
					<tr><td><p>Email</p><input class="input-text" type="text" name="email" /></td></tr>
					<input type="hidden" name="date" value="<?php echo time(); ?>" />
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