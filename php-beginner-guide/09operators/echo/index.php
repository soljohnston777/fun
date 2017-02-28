<!DOCTYPE HTML PUBLIC "-/W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Example</title>
	</head>
	<body style="width: 960px; margin: 25px auto 0;">
		<?php echo '<p>Hi, I am a PHP script!</p>'; ?>
		<?php
			//Strings
			$single_quote = '<p>Single quote string</p>';
			$double_quote = "<p>This is not a $single_quote. This is a Double quote string</p>";
			$contentate = '<p>This is contentation.</p>' . $single_quote;
			
			echo $single_quote;
			echo $double_quote;
			echo $contentate;
		?>
	</body>
</html>