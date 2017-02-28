<?php
	require_once('load.php');
	
	if ( !empty ( $_POST ) ) {
		$j->register('login.php');
	}
?>
<html>
	<head>
		<title>Registration</title>
		<style type="text/css">
			body { background: #c7c7c7;}
		</style>
	</head>

	<body>
		<div style="width: 960px; background: #fff; border: 1px solid #e4e4e4; padding: 20px; margin: 10px auto;">
			<h3>Register</h3>
			
			<form action="" method="post">
				<input type="hidden" name="date" value="<?php echo time(); ?>" />
				<table>
					<tr>
						<td>Name:</td>
						<td><input type="text" name="name" /></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><input type="text" name="username" /></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" name="email" /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Register" /></td>
					</tr>
				</table>
			</form>
			<p>Already a member? <a href="login.php">Login here</a></p>
		</div>
	</body>
</html>