<!DOCTYPE HTML PUBLIC "-/W3C//DTD HTML 4.01 Transitional//EN" http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Example</title>
	</head>
	<body style="width: 960px; margin: 25px auto 0;">
		<?php 
			$arr = array (
							"name" => "John Morris",
							"age" => "29",
							"state" => "texas",
							"website" => "http://www.learnphp.co"
					);
					
			?><pre><?php print_r($arr); ?></pre>
			<pre><?php var_dump($arr); ?></pre>
			<?php
			
			echo '<p>' . $arr['name'] . '</p>';
			
			for ( $count = 0; $count <= 10; $count++ ) {
				echo $count . '<br />';
			}
			
			$multi_arr = array (
							array(
								"name" => "John Morris",
								"age" => "29",
								"state" => "texas",
								"website" => "http://www.learnphp.co"
							),
							array(
								"name" => "John Doe",
								"age" => "30",
								"state" => "iowa",
								"website" => "http://www.learnphp.co"
							)
					);
					
				foreach ( $multi_arr as $item ) {
					echo '<p>Name: ' . $item['name'] . '<br />Age: ' . $item['age'] . '<br />' . $item['state'] . '<br />' . $item['website'] . '</p>';
				}
				
				$i = 0;
				
				while ( $i <= 10 ) {
					echo $i . '<br />';
					
					$i++;
				}
				
		?>
	</body>
</html>