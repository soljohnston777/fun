<?php
	require_once('../load.php');
	require_once('admin-load.php');
	$logged = $j->checkLogin();
	
	//Set our theme
	$theme = 'default';
	
	//Grab our authorization cookie array
	$cookie = $_COOKIE['joombologauth'];
	
	//Set our user and authID variables
	$user = $cookie['user'];
	$authID = $cookie['authID'];
	
	//Query the database for the selected user
	$table = 'j_users';
	$sql = "SELECT * FROM $table WHERE user_login = '" . $user . "'";
	$results = $jdb->select($sql);

	//Kill the script if the submitted username doesn't exit
	if (!$results) {
		die('Sorry, that username does not exist!');
	}

	//Fetch our results into an associative array
	$results = mysql_fetch_assoc( $results );
?>

<?php $ja->getAdminHeader($theme); ?>

		<div id="main">
			<h3>Dashboard</h3>
			<p><b>User Info</b></p>
			<table>
				<tr>
					<td>Name: </td>
					<td><?php echo $results['user_name']; ?></td>
				</tr>
				
				<tr>
					<td>Username: </td>
					<td><?php echo $results['user_login']; ?></td>
				</tr>
				
				<tr>
					<td>Email: </td>
					<td><?php echo $results['user_email']; ?></td>
				</tr>
				
				<tr>
					<td>Registered: </td>
					<td><?php echo date('l, F jS, Y', $results['user_registered']); ?></td>
				</tr>
			</table>			
		</div>
<?php $ja->getAdminFooter($theme); ?>