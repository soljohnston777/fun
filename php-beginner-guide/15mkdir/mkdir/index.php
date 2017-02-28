<!DOCTYPE HTML PUBLIC "-/W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Example</title>
	</head>
	<body style="width: 960px; margin: 25px auto 0;">
		<?php
			$cur = getcwd();
			
			$new = mkdir($cur . '/uploads', 0777);
			
			if ( $new ) {
				echo '<p>Directory created</p>';
			} else {
				echo '<p>Directory not created</p>';
			}
		?>
	</body>
</html>