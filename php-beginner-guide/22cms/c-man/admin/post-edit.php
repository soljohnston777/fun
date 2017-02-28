
<?php
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	if ( !empty ( $_POST ) ) {
		require_once('../includes/class-insert.php');
		
		if ( $insert->post($_POST) ) {
			echo '<p>Data inserted successfully!</p>';
		}
	}
?>
<html>
	<head>
		<title>Insert Post</title>
	</head>
	<body>
		<form method="post">
			<p>
				<input type="text" name="post_title" />
			</p>
			<p>
				<textarea name="post_content"></textarea>
			</p>
			<p>
				<label for="post_category">Cat 1</label>
				<input type="checkbox" name="post_category[first]" value="cat1" />
				<br />
				<label for="post_category">Cat 2</label>
				<input type="checkbox" name="post_category[second]" value="cat2" />
			</p>
			<p>
				<input type="submit" value="Submit" />
			</p>
		</form>
	</body>
</html>