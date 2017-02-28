<!DOCTYPE HTML PUBLIC "-/W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Example</title>
	</head>
	<body style="width: 960px; margin: 25px auto 0;">
		<?php echo '<p>Hi, I am a PHP script!</p>'; ?>
		<p>I am an HMLT-embedabble server-side scripting language that allows you to create dyanmic pages and scripts.</p>
		<?php echo '<p>I pre-process PHP code on the server, so all a web browser sees is the output of my processing, kind of like this.</p>'; ?>
		<p>Arguably, my strongest and most widely used capability is to interact with a database. I allow you to easily store user-submitted data into a database using a simple HTML form like this one:</p>
		
		<?php if ( empty ( $_POST['fname'] ) ) : ?>
			<form method="post" action="">
				<input type="text" name="fname" />
				<input type="submit" value="Send It!" />
			</form>
		<?php else : ?>
			<?php echo $_POST['fname']; ?>
		<?php endif; ?>
		
		<p>I hope you enjoy the course!</p>
	</body>
</html>