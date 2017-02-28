<!DOCTYPE HTML PUBLIC "-/W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Example</title>
	</head>
	<body style="width: 960px; margin: 25px auto 0;">
		<?php 
			$test = 2; 
			$testtwo = 3;
		
			if ( $test == 2 ) {
				echo '<p>Test equals 2</p>';
			} 

			if ( $test > 2 ) {
				echo '<p>Test greater than 2</p>';
			}
			
			if ( $test < 2 ) {
				echo '<p>Test less than 2</p>';
			}
			
			if ( $test >= 2 ) {
				echo '<p>Test greater than or equal to 2</p>';
			}
			
			if ( $test <= 2 ) {
				echo '<p>Test less than or equal to 2</p>';
			}
			
			if ( $test == 2 && $testtwo >= 2 ) {
				echo '<p>Test equals 2 and Test Two is greater than or equal to 2</p>';
			}
			
			if ( $test == 2 || $testtwo == 3 ) {
				echo '<p>Test equals 2 or Test Two equals 3</p>';
			}
		?>
	</body>
</html>