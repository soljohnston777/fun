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
			
			echo $single_quote;
			echo $double_quote;
			
			//Arrays
			$assoc_array = array (
					"foo" => "bar",
					'single' => 'quotes',
					"key" => "value"
				);
				
			$index_array = array (
					"one",
					"two",
					"thre"
				);
				
			echo '<pre>';
			print_r($assoc_array);
			print_r($index_array);
			echo '</pre>';
			
			//Objects
			class foo {
				function do_foo() {
					echo "Doing foo.";
				}
			}
			
			$bar = new foo;
			$bar->do_foo();
			
			//Booleans
			$stuff = true;
			
			if ( $stuff ) {
				echo '<p>We got stuff!</p>';
			} else {
				echo '<p>Sorry, no stuff :(</p>';
			}
			
			//Integers
			$int = 3;
			$not_int ='3';
			
			if ( is_int ( $int ) ) {
				echo "<p>It's an integer.</p>";
			} else {
				echo "<p>Sorry, not integer</p>";
			}
			
			if ( is_int ( $not_int ) ) {
				echo "<p>It's an integer.</p>";
			} else {
				echo "<p>Sorry, not integer</p>";
			}
			
		?>
	</body>
</html>