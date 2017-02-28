<!DOCTYPE HTML PUBLIC "-/W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Example</title>
	</head>
	<body style="width: 960px; margin: 25px auto 0;">
		<?php 
			$test = 2; 
		
			if ( $test == 2 ) {
				echo '<p>Test equals 2</p>';
			} else {
				echo '<p>Test does not equal 2</p>';
			}
			
			switch ($test) {
				case 0:
					echo "Test equals 0";
					break;
				case 1:
					echo "Test equals 1";
					break;
				case 2:
					echo "Test equals 2";
					break;
			}		
		?>
	</body>
</html>