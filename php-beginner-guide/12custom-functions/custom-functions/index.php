<?php
	function my_function($name, $age) {
		$results = '<p>Name: ' . $name . '</p>';
		$results .= '<p>Age: ' . $age . '</p>';
		
		return $results;
	}
	
	$profile = my_function('John Morris', 30);
	
	echo $profile;
?>