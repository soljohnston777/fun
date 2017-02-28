<!DOCTYPE HTML PUBLIC "-/W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Example</title>
	</head>
	<body>
		<?php 
			$f = file_get_contents('http://php.net/quickref.php');
			
			if ( $f ) {
				echo $f;
			} else {
				echo '<p>Sorry, your server does not allow remote file inclusion. Go here for a list of all PHP functions: <a href="http://php.net/quickref.php">http://php.net/quickref.php</a></p>';
			}
		?>
	</body>
</html>