<!DOCTYPE HTML PUBLIC "-/W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Example</title>
	</head>
	<body style="width: 960px; margin: 25px auto 0;">
		<?php
			if ( !empty ( $_GET ) ) {
				$get = $_GET['p'];
				
				echo $get;
			}
			
			if ( !empty ( $_POST ) ) {
				print_r($_POST);
			}
		?>
		<form method="get">
			<input type="text" name="textinput1" />
			<input type="text" name="textinput2" />
			<input type="submit" value="Submit" />
		</form>
	</body>
</html>