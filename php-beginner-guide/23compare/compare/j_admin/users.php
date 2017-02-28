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
	$users = $j->getUsers();
?>

<?php $ja->getAdminHeader($theme); ?>
	<div id="main">
		<h3>Users <a class="new-button" id="existing-users-new-button" href="<?php echo JURL; ?>j_admin/add-user.php">Add New User</a></h3>
		<table id="existing-users" class="display-table">
			<thead>
				<tr>
					<th class="id-cell">ID</th>
					<th>Name</th>
					<th>Login</th>
					<th>Email</th>
					<th>Date Registered</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach ($users as $user) : ?>
					<tr>
						<td class="user-cell"><?php echo $user['ID']; ?></td>
						<td class="user-cell"><a href="<?php echo JURL; ?>j_admin/edit-user.php?user_id=<?php echo $user['ID']; ?>"><?php echo $user['user_name']; ?></a></td>					
						<td class="user-cell"><?php echo $user['user_login']; ?></td>
						<td class="user-cell"><?php echo $user['user_email']; ?></td>
						<td class="user-cell"><?php echo date('m/d/Y', $user['user_registered']); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
			
			<tfoot>
				<tr>
					<th class="id-cell">ID</th>
					<th>Name</th>
					<th>Login</th>
					<th>Email</th>
					<th>Date Registered</th>
				</tr>
			</tfoot>
		</table>
					
	</div>
<?php $ja->getAdminFooter($theme); ?>